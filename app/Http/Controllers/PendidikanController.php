<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = 'pendidikan';
            // $data = User::select('*');
            return Datatables::of(Pendidikan::select('*'))
        // ->addIndexColumn()
                     ->addColumn('action', function ($object) use ($model) {
                        $text = "";
                        $text.= '<a href="'.route($model.'.edit', [$model => $object]).'" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                        <path d="M16 5l3 3"></path>
                     </svg> Edit</a>';
                        $text.= "<form class='form-horizontal' style='display: inline;' method='POST' action='".route($model.'.destroy', [$model => $object])."'><input type='hidden' name='_token' value='".csrf_token()."'> <input type='hidden' name='_method' value='DELETE'><button class='btn btn-sm btn-danger' type='submit'><i class='fas fa-trash'></i> Hapus</button></form><form>";
                        return $text;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       
       return view('page.pendidikan.view');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('page.pendidikan.create');
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
            'nama_pendidikan' => 'required|max:255'
        ]);
    
        // Buat instance model Pendidikan dan isi dengan data dari form
        $pendidikan = new Pendidikan;
        $pendidikan->nama_pendidikan = $validatedData['nama_pendidikan'];
    
        // Buat slug acak sepanjang 16 karakter
        $slug = Str::random(16);
        $pendidikan->slug = $slug;
    
        // Simpan ke database
        $pendidikan->save();
    
        // Redirect ke halaman yang diinginkan
        return redirect()->route('pendidikan.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pendidikan = Pendidikan::select('*')->findOrFail($id);
        return view('page.pendidikan.edit', [
            'pendidikan' => $pendidikan,
        ]);
       
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_pendidikan' => 'required|max:255'
        ]);
    
        // Cari model Pendidikan berdasarkan id
        $pendidikan = Pendidikan::findOrFail($id);
    
        // Isi model dengan data dari form
        $pendidikan->nama_pendidikan = $validatedData['nama_pendidikan'];
    
       // Buat slug acak sepanjang 16 karakter
       $slug = Str::random(16);
       $pendidikan->slug = $slug;
    
        // Simpan ke database
        $pendidikan->save();
    
        // Redirect ke halaman yang diinginkan
        return redirect()->route('pendidikan.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari model Pendidikan berdasarkan id
        $pendidikan = Pendidikan::findOrFail($id);
    
        // Hapus model dari database
        $pendidikan->delete();
    
        // Redirect ke halaman yang diinginkan
        return redirect()->route('pendidikan.index');
    }
}
