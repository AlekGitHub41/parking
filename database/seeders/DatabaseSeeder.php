<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Automobile;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $clients=[
            [
                'FCS' => "Ефремов Игорь Ярославович",
                "gender" => "Мужчина",
                "telephone" => "+7 (985) 573-30-62",
                "address" => "085283, Архангельская область, город Коломна, пл. Будапештсткая, 69"
            ],
            [
                'FCS' => "Белоусов Павел Максимович",
                "gender" => "Мужчина",
                "telephone" => "+7 (960) 940-24-51",
                "address" => "719785, Вологодская область, город Мытищи, спуск Сталина, 41"
            ],
        ];
        $automobiles=[
            [
                'brand' => "BMW",
                "model" => "M3",
                "color" => "Черный",
                "number_rf" => "A001AA 77rus",
                "is_active" => 1,
                "client_id" => 1
            ],
            [
                'brand' => "Nissan",
                "model" => "Skyline",
                "color" => "Черный",
                "number_rf" => "E794KX 50rus",
                "is_active" => 0,
                "client_id" => 1
            ],
            [
                'brand' => "Shevrole",
                "model" => "Camaro",
                "color" => "Желтый",
                "number_rf" => "B707 777rus",
                "is_active" => 1,
                "client_id" => 2
            ],
            [
                'brand' => "Mitsubishi",
                "model" => "Lancer X",
                "color" => "Черный",
                "number_rf" => "A941AA 150rus",
                "is_active" => 0,
                "client_id" => 2
            ],
        ];
        foreach($clients as $client)
        {
            Client::create($client);
        }
        foreach($automobiles as $automobile)
        {
            Automobile::create($automobile);
        }
    }
}
