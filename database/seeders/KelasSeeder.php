<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
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
                "pendidikan_id" => "1",
                "nama_kelas" => "1"
            ],
            [
                "pendidikan_id" => "1",
                "nama_kelas" => "2"
            ],
            [
                "pendidikan_id" => "1",
                "nama_kelas" => "3"
            ],
            [
                "pendidikan_id" => "1",
                "nama_kelas" => "4"
            ],
            [
                "pendidikan_id" => "1",
                "nama_kelas" => "5"
            ],
            [
                "pendidikan_id" => "1",
                "nama_kelas" => "6"
            ],
            [
                "pendidikan_id" => "2",
                "nama_kelas" => "7"
            ],
            [
                "pendidikan_id" => "2",
                "nama_kelas" => "8"
            ],
            [
                "pendidikan_id" => "2",
                "nama_kelas" => "9"
            ],
            [
                "pendidikan_id" => "3",
                "nama_kelas" => "10"
            ],
            [
                "pendidikan_id" => "3",
                "nama_kelas" => "11"
            ],
            [
                "pendidikan_id" => "3",
                "nama_kelas" => "12"
            ],
        ];

        foreach ($seeds as $seed) {
            DB::beginTransaction();
            try {
                $kelas = new Kelase;
                $kelas->slug = Str::random(16);
                $kelas->nama_kelas = $seed['nama_kelas'];
                $kelas->pendidikan_id = $seed['pendidikan_id'];
                $kelas->save();
                DB::commit();
            } catch (\Exception $ex) {
                echo $ex->getMessage();
                DB::rollBack();
            }
        }
    }
}
