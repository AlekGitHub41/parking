<?php

namespace App\Http\Controllers;

use App\Models\Automobile;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EditController;
use Illuminate\Support\Facades\Validator;

class ClientAndAutomobile extends Controller
{
    public function overwrite_session()
    {
        session()->forget('previous_url');
        session(['previous_url' => url()->previous()]);
    }

    public function show_main_form()
    {
        session()->forget('previous_url');
        session(['previous_url' => url()->current()]);
        $clients = DB::table('client as c')
            ->leftJoin('automobile as a', 'c.id', '=', 'a.client_id')
            ->select('c.FCS', 'c.id as client_id', 'a.brand', 'a.model', 'a.number_rf', 'a.id as automobile_id')
            ->paginate(10);
        return view('main', compact("clients"));
    }

    public function edit_client_get(Request $request, $client_id)
    {
        if ($request->isMethod('get')) {
            $this->overwrite_session();
            $client = DB::table("client")->where("id", "=", $client_id)->first();
            return view("edit.edit-client", compact("client"));
        } elseif ($request->isMethod('post')) {

            $client_data = [
                "FCS" => ["required", "string"],
                "telephone" => ["required", "string"],
                "address" => ["string"],
                "gender" => ["required", "in:Мужчина,Женщина"],
            ];
            $data = $request->except(['_token']);;
            $validator = Validator::make($data, $client_data);

            if ($validator->fails()) {
                return back()->withErrors([
                    'FCS' => 'Минимум 3 символа, и только строковое значение',
                    "any" => "Некорректные данные",
                    "telephone" => "Значение должно быть уникальным",
                ]);
            }
            DB::table("client")->where("id", "=", $client_id)->update($data);
            $previous_url = session('previous_url');
            session()->forget('previous_url');
            return redirect($previous_url);
        }
    }

    public function edit_automobile_get(Request $request, $automobile_id)
    {
        if ($request->isMethod('get')) {
            $this->overwrite_session();
            $automobile = DB::table("automobile")->where("id", "=", $automobile_id)->first();
            return view("edit.edit-automobile", compact("automobile"));
        } elseif ($request->isMethod('post')) {
            $automobile_data = [
                "brand" => ["required", "string"],
                "model" => ["required", "string"],
                "color" => ["required", "string"],
                "number_rf" => ["required", "string"],
            ];
            $data = $request->except(['_token']);;
            $validator = Validator::make($data, $automobile_data);

            if ($validator->fails()) {
                return back()->withErrors([
                    "any" => "Некорректные данные",
                    "number_rf" => "Возможно номер занят",
                ]);
            }
            $data["is_active"] = $request->has('is_active');
            DB::table("automobile")->where("id", "=", $automobile_id)->update($data);
            $previous_url = session('previous_url');
            session()->forget('previous_url');
            return redirect($previous_url);
        }
    }
}
