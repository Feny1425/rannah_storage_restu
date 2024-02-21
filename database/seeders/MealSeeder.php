<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* You may want to seed Item, and MealItem here as well, for example:
        $rice = Item::create([
            "name"=> "أرز",
            "name_en"=> "rice",
            "unit"=> "كيلو",
            "unit_en"=> "kilo",
            "type" => "food"
        ]);
        $mindi = Meal::create([
            "name"=> "مندي",
            "name_en"=> "mindi",
            "unit"=> "نص حبة",
            "unit_en"=> "half chicken",
            "batch_size"=> "1",
            "expiry_duration"=> "24"
        ]);
        MealItem::create([
            "meal_id" => $mindi->id,
            "item_id" => $rice->id,
            "quantity" => "1"
        ]);
        */
        Meal::createMany([
            [
                "name" => "مندي",
                "name_en" => "mindi",
                "unit" => "نص حبة",
                "unit_en" => "half chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مندي",
                "name_en" => "mindi",
                "unit" => "حبة",
                "unit_en" => "full chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "كوزي",
                "name_en" => "kwzy",
                "unit" => "نص حبة",
                "unit_en" => "half chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "كوزي",
                "name_en" => "kwzy",
                "unit" => "حبة",
                "unit_en" => "full chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مديني",
                "name_en" => "madini",
                "unit" => "نص حبة",
                "unit_en" => "half chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مديني",
                "name_en" => "madini",
                "unit" => "حبة",
                "unit_en" => "full chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مظبي",
                "name_en" => "muzabi",
                "unit" => "نص حبة",
                "unit_en" => "half chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مظبي",
                "name_en" => "muzabiy",
                "unit" => "حبة",
                "unit_en" => "full chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مضغوط",
                "name_en" => "himdia",
                "unit" => "نص حبة",
                "unit_en" => "half chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مضغوط",
                "name_en" => "saeida",
                "unit" => "حبة",
                "unit_en" => "full chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "كابلي",
                "name_en" => "kabli",
                "unit" => "نص حبة",
                "unit_en" => "half chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "كابلي",
                "name_en" => "kabli",
                "unit" => "حبة",
                "unit_en" => "full chicken",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "كابلي لحم",
                "name_en" => "kabli meat",
                "unit" => "نفر",
                "unit_en" => "nafar",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "حمص لحم",
                "name_en" => "humus meat",
                "unit" => "نفر",
                "unit_en" => "nafar",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مندي لحم",
                "name_en" => "mindi meat",
                "unit" => "نفر",
                "unit_en" => "nafar",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "سمبوسة",
                "name_en" => "sambusa",
                "unit" => "حبة",
                "unit_en" => "piece",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "طرمبة",
                "name_en" => "tarmbaa",
                "unit" => "حبة",
                "unit_en" => "piece",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "كنافة",
                "name_en" => "kanafa",
                "unit" => "حبة",
                "unit_en" => "piece",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "بيبسي  صغير",
                "name_en" => "small pipsi",
                "unit" => "حبة",
                "unit_en" => "can",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "ميرندا حمضيات صغير",
                "name_en" => "small miranda",
                "unit" => "حبة",
                "unit_en" => "can",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "سفن اب صغير",
                "name_en" => "small 7UP",
                "unit" => "حبة",
                "unit_en" => "can",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "ديو صغير",
                "name_en" => "small mountain dew",
                "unit" => "حبة",
                "unit_en" => "can",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مياه صغيرة",
                "name_en" => "small water bottle",
                "unit" => "حبة",
                "unit_en" => "bottle",
                "batch_size" => "40",
                "expiry_duration" => "24"
            ],
            [
                "name" => "مياه كبيرة",
                "name_en" => "large water bottle",
                "unit" => "حبة",
                "unit_en" => "bottle",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "بيبسي 2.25لتر",
                "name_en" => "pipsi 2.25 litr",
                "unit" => "جالون",
                "unit_en" => "gallon",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "سفن اب 2.25 لتر",
                "name_en" => "7UP 2.25 litr",
                "unit" => "جالون",
                "unit_en" => "gallon",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "ديو2.25لتر",
                "name_en" => "mountain dew 2.25 litr",
                "unit" => "جالون",
                "unit_en" => "gallon",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "ميرندا حمضيات 2.25 لتر",
                "name_en" => "miranda 2.25 litr",
                "unit" => "جالون",
                "unit_en" => "gallon",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "سلطة حارة",
                "name_en" => "Hot salad",
                "unit" => "حبة",
                "unit_en" => "piece",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ],
            [
                "name" => "سلطة طحينة",
                "name_en" => "Tahina salad",
                "unit" => "حبة",
                "unit_en" => "piece",
                "batch_size" => "1",
                "expiry_duration" => "24"
            ]
        ]);
    }
}
