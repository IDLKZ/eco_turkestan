<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::create([
           'title_ru' => 'Туркестан',
           'title_kz' => 'Түркістан',
           'bg_color' => '#ff9b9b',
           'geocode' => '[{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[68.174973,43.348526],[68.269386,43.348526],[68.310928,43.367497],[68.432465,43.281829],[68.408432,43.249329],[68.285179,43.211807],[68.184586,43.226568],[68.15506,43.241076],[68.133774,43.273831],[68.14785,43.318059],[68.174973,43.348526]]]}}]'
        ]);
    }
}
