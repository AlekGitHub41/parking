<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CreateAutomobile extends Controller
{
    public function show_form_automobile()
    {
        $client =  DB::table('client')->select('*')->get();
        return view("create.create-automobile", ["client" => $client]);
    }
    public function create_automobile(Request $request)
    {
        $automobile_data = [
            "brand" => ["required", "string"],
            "model" => ["required", "string"],
            "color" => ["required", "string"],
            "number_rf" => ["required", "string", "unique:automobile"],
            "client_id" => ["required", "string"],
        ];
        $data = $request->except(['_token']);
        $validator = Validator::make($data, $automobile_data);
        $data["is_active"] = $request->has('is_active');
        if ($validator->fails()) {
            return back()->withErrors([
                "any" => "Некорректные данные",
                "number_rf" => "Возможно номер занят",
            ]);
        }
        DB::table("automobile")->insert($data);

        return redirect("/");
    }
}
