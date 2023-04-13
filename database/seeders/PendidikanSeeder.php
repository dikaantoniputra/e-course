<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = (object)[
            [
                "nama_pendidikan" => "SD"
            ],
            [
                "nama_pendidikan" => "SMP"
            ],
            [
                "nama_pendidikan" => "SMA"
            ],
        ];

        foreach ($seeds as $seed) {
            DB::beginTransaction();
            try {
                $pendidikan = new Pendidikan;
                $pendidikan->slug = Str::random(16);
                $pendidikan->nama_pendidikan = $seed['nama_pendidikan'];
                $pendidikan->save();
                DB::commit();
            } catch (\Exception $ex) {
                echo $ex->getMessage();
                DB::rollBack();
            }
        }
    }
}
