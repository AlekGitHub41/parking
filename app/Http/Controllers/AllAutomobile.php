<?php

namespace App\Http\Controllers;

use App\Models\Automobile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllAutomobile extends Controller
{
    public function show_main_form(Request $request)
    {
        session()->forget('previous_url');
        session(['previous_url' => url()->current()]);
        $selected_automobile=$request->query("selected_automobile");
        if ($selected_automobile) {
            $automobiles = DB::table("automobile")->where("id","=",$selected_automobile)->first();
            return view("all-automobile", compact("automobiles"));
        }
        $automobiles = DB::table("automobile")->select("*")->paginate(10);
        return view("all-automobile", compact("automobiles"));
    }
}
