<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tentor;
use Illuminate\Support\Str;

class TentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = file_get_contents('database/seeders/json/Tentor.json');
        $seeds = json_decode($seeds);

        foreach ($seeds as $seed) {
            DB::beginTransaction();
            try {
                $tentor = new Tentor;
                $tentor->slug = Str::random(16);
                $tentor->user_id = $seed->user_id;
                $tentor->pendidikan_id = $seed->pendidikan_id;
                $tentor->save();
                DB::commit();
            } catch (\Exception $ex) {
                //throw $th;
                echo $ex->getMessage();
                DB::rollBack();
            }
        }
    }
}
