<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelajaran;
use App\Models\Pendidikan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $auth_user = Auth::user();
        if ($request->ajax()) {
            $model = 'pelajaran';
            // $data = User::select('*');
            if ($auth_user->role == 'admin') {
                return Datatables::of(Pelajaran::with(['pendidikan', 'user']))
                    // ->addIndexColumn()
                    ->addColumn('action', function ($object) use ($model) {
                        $text = "";
                        $text .= '<a href="' . route($model . '.edit', [$model => $object]) . '" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                        <path d="M16 5l3 3"></path>
                     </svg> Edit</a>';
                        $text .= "<form class='form-horizontal' style='display: inline;' method='POST' action='" . route($model . '.destroy', [$model => $object]) . "'><input type='hidden' name='_token' value='" . csrf_token() . "'> <input type='hidden' name='_method' value='DELETE'><button class='btn btn-sm btn-danger' type='submit'><i class='fas fa-trash'></i> Hapus</button></form><form>";
                        return $text;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            } elseif ($auth_user->role == 'tentor') {
                return Datatables::of(Pelajaran::with(['pendidikan', 'user'])->where('user_id', $auth_user->id)->get())
                    // ->addIndexColumn()
                    ->addColumn('action', function ($object) use ($model) {
                        $text = "";
                        $text .= '<a href="' . route($model . '.edit', [$model => $object]) . '" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                        <path d="M16 5l3 3"></path>
                     </svg> Edit</a>';
                        $text .= "<form class='form-horizontal' style='display: inline;' method='POST' action='" . route($model . '.destroy', [$model => $object]) . "'><input type='hidden' name='_token' value='" . csrf_token() . "'> <input type='hidden' name='_method' value='DELETE'><button class='btn btn-sm btn-danger' type='submit'><i class='fas fa-trash'></i> Hapus</button></form><form>";
                        return $text;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        return view('page.pelajaran.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pendidikan = Pendidikan::all();
        $user = User::with('tentor')->where('role', 'tentor')->get();
        // dd($user->tentor->id);
        return view('page.pelajaran.create', compact('pendidikan', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'pendidikan_id' => 'required',
            'user_id' => 'required',
            'nama_pelajaran' => 'required|max:255',
            'harga_pelajaran' => 'required|max:255',
        ]);

        // Buat instance model Kelas dan isi dengan data dari form
        $pelajaran = new Pelajaran;
        $pelajaran->pendidikan_id = $validatedData['pendidikan_id'];
        $pelajaran->user_id = $validatedData['user_id'];
        $pelajaran->nama_pelajaran = $validatedData['nama_pelajaran'];
        $pelajaran->harga_pelajaran = $validatedData['harga_pelajaran'];

        // Buat slug acak sepanjang 16 karakter
        $slug = Str::random(16);
        $pelajaran->slug = $slug;

        // Simpan ke database
        $pelajaran->save();

        // Redirect ke halaman yang diinginkan
        return redirect()->route('pelajaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelajaran $pelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pelajaran = Pelajaran::select('*')->findOrFail($id);
        $pendidikan = Pendidikan::all();
        $user = User::with('tentor')->where('role', 'tentor')->get();
        return view('page.pelajaran.edit', compact('pendidikan', 'pelajaran', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'pendidikan_id' => 'required',
            'user_id' => 'required',
            'nama_pelajaran' => 'required|max:255',
            'harga_pelajaran' => 'required|max:255',
        ]);

        // Buat instance model Kelas dan isi dengan data dari form
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->pendidikan_id = $validatedData['pendidikan_id'];
        $pelajaran->user_id = $validatedData['user_id'];
        $pelajaran->nama_pelajaran = $validatedData['nama_pelajaran'];
        $pelajaran->harga_pelajaran = $validatedData['harga_pelajaran'];

        // Buat slug acak sepanjang 16 karakter
        $slug = Str::random(16);
        $pelajaran->slug = $slug;

        // Simpan ke database
        $pelajaran->save();

        // Redirect ke halaman yang diinginkan
        return redirect()->route('pelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari model Pendidikan berdasarkan id
        $pelajaran = Pelajaran::findOrFail($id);

        // Hapus model dari database
        $pelajaran->delete();

        // Redirect ke halaman yang diinginkan
        return redirect()->route('pelajaran.index');
    }
}
