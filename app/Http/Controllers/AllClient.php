<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllClient extends Controller
{
    public function show_main_form(Request $request)
    {
        session()->forget('previous_url');
        session(['previous_url' => url()->current()]);
        $clients = DB::table('client')->select('*')->paginate(10);
        $all_clients = DB::table('client')->select('*')->get();
        $choices_client = $request->query('choices_client');
        if ($choices_client) {
            $one_clients = DB::table("client")->where("FCS", "=", $choices_client)->first();
            return view("client.all-client", compact("one_clients", "all_clients"));
        }
        return view("client.all-client", compact("clients", "all_clients"));
    }

    public function clients_automobile($client_id)
    {
        $automobiles = DB::table("automobile")
            ->join("client", "automobile.client_id", "=", "client.id")
            ->where("client.id", "=", $client_id)
            ->select("automobile.*", "client.FCS")->get();
        return view("client.clients-automobile", compact("automobiles"));
    }
}
