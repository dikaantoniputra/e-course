<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = file_get_contents('database/seeders/json/Siswa.json');
        $seeds = json_decode($seeds);

        foreach ($seeds as $seed) {
            DB::beginTransaction();
            try {
                $siswa = new Siswa;
                $siswa->slug = Str::random(16);
                $siswa->user_id = $seed->user_id;
                $siswa->pendidikan_id = $seed->pendidikan_id;
                $siswa->kelas_id = $seed->kelas_id;
                $siswa->save();
                DB::commit();
            } catch (\Exception $ex) {
                //throw $th;
                echo $ex->getMessage();
                DB::rollBack();
            }
        }
    }
}
