<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $jadwal = Jadwal::with(['pelajaran', 'user'])->get();
        // dd($jadwal);
        $auth_user = Auth::user();
        if ($request->ajax()) {
            $model = 'jadwal';
            if ($auth_user->role == 'admin') {
                # code...
                return DataTables::of(Jadwal::with(['pelajaran', 'user']))
                    ->addColumn('action', function ($object) use ($model) {
                        $text = "";
                        $text .= '<a href="' . route($model . '.edit', [$model => $object->slug]) . '" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                    <path d="M16 5l3 3"></pat>
                 </svg> Edit</a>';
                        $text .= " <form class='form-horizontal' style='display: inline;' method='POST' action='" . route($model . '.destroy', [$model => $object->slug]) . "'><input type='hidden' name='_token' value='" . csrf_token() . "'> <input type='hidden' name='_method' value='DELETE'><button class='btn btn-sm btn-danger' type='submit'><i class='fas fa-trash'></i> Hapus</button></form><form>";
                        return $text;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            } elseif ($auth_user->role == 'siswa') {
                # code...
                $jadwal = Jadwal::with(['pelajaran', 'user'])->whereHas('pelajaran.transaksi', function ($query) use ($auth_user) {
                    return  $query->where('status_transaksi', 'success')
                        ->where('user_id', $auth_user->id);
                });
                return DataTables::of($jadwal)
                    ->addColumn('action', function ($object) use ($model) {
                        $text = "";
                        $text .= '<button class="btn btn-success btn-detail" data-bs-toggle="modal" data-bs-target="#detailModalCenter">Detail</button>';
                        // $text .= " <form class='form-horizontal' style='display: inline;' method='POST' action='" . route($model . '.destroy', [$model => $object->slug]) . "'><input type='hidden' name='_token' value='" . csrf_token() . "'> <input type='hidden' name='_method' value='DELETE'><button class='btn btn-sm btn-danger' type='submit'><i class='fas fa-trash'></i> Hapus</button></form><form>";
                        return $text;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            } elseif ($auth_user->role == 'tentor') {
                $jadwal = Jadwal::with(['pelajaran', 'user'])->where('user_id', $auth_user->id);
                return DataTables::of($jadwal)
                    ->addColumn('action', function ($object) use ($model) {
                        $text = "";
                        $text .= '<button class="btn btn-success btn-detail" data-bs-toggle="modal" data-bs-target="#detailModalCenter">Detail</button>';
                        // $text .= " <form class='form-horizontal' style='display: inline;' method='POST' action='" . route($model . '.destroy', [$model => $object->slug]) . "'><input type='hidden' name='_token' value='" . csrf_token() . "'> <input type='hidden' name='_method' value='DELETE'><button class='btn btn-sm btn-danger' type='submit'><i class='fas fa-trash'></i> Hapus</button></form><form>";
                        return $text;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
        // dd(Jadwal::with(['pelajaran', 'user'])->whereHas('pelajaran.transaksi', function ($query) use ($auth_user) {
        //     return  $query->where('status_transaksi', 'success')
        //         ->where('user_id', $auth_user->id);
        // })->get());
        return view('page.jadwal.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelajaran = Pelajaran::all();
        $tentor = User::with(['tentor'])->where('role', 'tentor')->get();
        $days = (object)["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        // dd($tentor);

        return view('page.jadwal.create', compact('pelajaran', 'tentor', 'days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pelajaran_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
        ]);
        $pelajaran = DB::table('pelajarans')
            ->where('id', $validatedData["pelajaran_id"])->first();
        $jadwal = new Jadwal;
        $jadwal->slug = Str::random(16);
        $jadwal->pelajaran_id = $validatedData["pelajaran_id"];
        $jadwal->user_id = $pelajaran->user_id;
        $jadwal->hari = $validatedData["hari"];
        $jadwal->jam_mulai = $validatedData["jam_mulai"];
        $jadwal->jam_akhir = $validatedData["jam_akhir"];
        $jadwal->save();

        return redirect()->route('jadwal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pelajaran = Pelajaran::all();
        $tentor = User::with(['tentor'])->where('role', 'tentor')->get();
        $days = (object)["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        $jadwal = Jadwal::where('slug', $slug)->first();
        // dd($jadwal);

        return view('page.jadwal.edit', compact('pelajaran', 'tentor', 'days', 'jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $validatedData = $request->validate([
            'pelajaran_id' => 'required',
            'user_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
        ]);

        $jadwal = Jadwal::where('slug', $slug)->first();
        $jadwal->pelajaran_id = $validatedData["pelajaran_id"];
        $jadwal->user_id = $validatedData["user_id"];
        $jadwal->hari = $validatedData["hari"];
        $jadwal->jam_mulai = $validatedData["jam_mulai"];
        $jadwal->jam_akhir = $validatedData["jam_akhir"];
        $jadwal->save();

        return redirect()->route('jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // Cari model Pendidikan berdasarkan id
        $jadwal = Jadwal::where('slug', $slug);

        // Hapus model dari database
        $jadwal->delete();

        // Redirect ke halaman yang diinginkan
        return redirect()->route('jadwal.index');
    }

    public function detailSiswa(Request $request)
    {
        $slug = $request->slug;
        $query = "SELECT DISTINCT d.name 
        FROM detail_jadwals as a
        JOIN jadwals as b on a.jadwal_id = b.id
        JOIN pelajarans as c on b.pelajaran_id = c.id
        JOIN users as d on a.user_id = d.id
        JOIN siswas as e on d.id = e.user_id
        JOIN transaksis as f on c.id = f.pelajaran_id
        WHERE f.status_transaksi = 'success' and b.slug = '" . $slug . "'
        ";
        $detail_jadwal = DB::select($query);
        return DataTables::of($detail_jadwal)->make(true);
        // dd($detail_jadwal);
    }
}
