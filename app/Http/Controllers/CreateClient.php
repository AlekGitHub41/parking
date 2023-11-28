<?php

namespace App\Http\Controllers;

use App\Models\Automobile;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CreateClient extends Controller
{
    public function show_form_client()
    {
        return view("create.create-client");
    }

    public function create_client(Request $request)
    {
        $client_data = [
            "FCS" => ["required", "string"],
            "telephone" => ["required", "string", "unique:client"],
            "address" => ["string"],
            "gender" => ["required", "in:Мужчина,Женщина"],
        ];
        $data = $request->except(['_token']);
        $validator = Validator::make($data, $client_data);

        if ($validator->fails()) {
            return back()->withErrors([
                'FCS' => 'Минимум 3 символа, и только строковое значение',
                "any" => "Некорректные данные",
                "telephone" => "Значение должно быть уникальным",
            ]);
        }
        DB::table("client")->insert($data);

        return redirect("/");
    }
}
