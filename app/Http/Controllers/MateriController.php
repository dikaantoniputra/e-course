<?php

namespace App\Http\Controllers;

use App\Models\FileMateri;
use App\Models\User;
use App\Models\Materi;
use App\Models\Pelajaran;
use App\Models\Pendidikan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = 'materi';
            // $data = User::select('*');
            return Datatables::of(Materi::with(['pelajaran']))

                // ->addIndexColumn()
                ->addColumn('action', function ($object) use ($model) {
                    // $text = "";
                    // $text .= '<a href="' . route($model . '.edit', [$model => $object]) . '" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    //     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    //     <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                    //     <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                    //     <path d="M16 5l3 3"></path>
                    //  </svg> Edit</a>';
                    // $text .= "<form class='form-horizontal' style='display: inline;' method='POST' action='" . route($model . '.destroy', [$model => $object]) . "'><input type='hidden' name='_token' value='" . csrf_token() . "'> <input type='hidden' name='_method' value='DELETE'><button class='btn btn-sm btn-danger' type='submit'><i class='fas fa-trash'></i> Hapus</button></form><form>";
                    // return $text;
                })
                // ->rawColumns(['action'])
                ->make(true);
        }

        return view('page.materi.view');
    }

    public function tentor(Request $request)
    {
        if ($request->ajax()) {
            $model = 'materi';
            $user = $request->user();
            $tentor = $user->id;
            // $data = User::select('*');
            return Datatables::of(
                Materi::with(['pelajaran'])
                    ->where('user_id', $tentor)
            )

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

        return view('page.materi.tentor');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $auth_user = Auth::user();
        $pelajaran = Pelajaran::where('user_id', $auth_user->id)->get();
        return view('page.materi.create', compact('pelajaran'));
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
            'pelajaran_id' => 'required',
            'materi' => 'required|max:255',
            'file_materi.*' => 'file|max:2048', // Add validation rule for each file
        ]);

        // Buat instance model Materi dan isi dengan data dari form
        $materi = new Materi;
        $materi->pelajaran_id = $validatedData['pelajaran_id'];
        $materi->user_id = Auth::id();
        $materi->materi = $validatedData['materi'];
        $materi->slug = Str::random(16);
        $materi->save();

        // Handle file uploads
        if ($request->hasFile('file_materi')) {
            foreach ($request->file('file_materi') as $file) {
                $nama_file = $file->getClientOriginalName();
                $path = $file->store('file_materi');

                $fileMateri = new FileMateri;
                $fileMateri->materi_id = $materi->id;
                $fileMateri->nama_file = $nama_file;
                $fileMateri->lokasi_file = $path;
                $fileMateri->save();
            }
        }

        if (Auth::user()->role === 'tentor') {
            return redirect()->route('materi.tentor');
        } else {
            return redirect()->route('materi.index');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth_user = Auth::user();
        $materi = Materi::select('*')->findOrFail($id);
        $pelajaran = Pelajaran::where('user_id', $auth_user->id)->get();
        $fileMateri = FileMateri::where('materi_id', $materi->id)->get();

        return view('page.materi.edit', compact('pelajaran', 'materi', 'fileMateri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'pelajaran_id' => 'required',
            'materi' => 'required|max:255',
            // 'file_materi.*' => 'file|max:2048', // Add validation rule for each file
        ]);

        // Cari materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Update data materi dengan data baru dari form
        $materi->pelajaran_id = $validatedData['pelajaran_id'];
        $materi->materi = $validatedData['materi'];
        $materi->save();

        // Handle file uploads
        if ($request->hasFile('file_materi')) {
            foreach ($request->file('file_materi') as $file) {
                $nama_file = $file->getClientOriginalName();
                $path = $file->store('file_materi');

                $fileMateri = new FileMateri;
                $fileMateri->materi_id = $materi->id;
                $fileMateri->nama_file = $nama_file;
                $fileMateri->lokasi_file = $path;
                $fileMateri->save();
            }
        }

        // Redirect ke halaman yang diinginkan
        return redirect()->route('materi.tentor');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Hapus file-file terkait dengan materi
        foreach ($materi->fileMateris as $fileMateri) {
            // Hapus file dari penyimpanan
            Storage::delete($fileMateri->lokasi_file);

            // Hapus entri file dari database
            $fileMateri->delete();
        }

        // Hapus materi dari database
        $materi->delete();

        // Redirect ke halaman yang diinginkan
        return redirect()->route('materi.index');
    }


    public function download($filename)
    {
        // Cek apakah file ada di penyimpanan
        if (Storage::exists($filename)) {
            $path = public_path('app/' . $filename);
            return response()->download($path);
        }

        // Jika file tidak ditemukan, tampilkan error atau redirect ke halaman yang sesuai
        abort(404, 'File not found');
    }

    public function delete($id)
    {
        // Temukan pengalaman kerja berdasarkan ID
        $workExperience = FileMateri::findOrFail($id);

        // Lakukan proses penghapusan
        $workExperience->delete();

        // Redirect atau lakukan tindakan lain setelah penghapusan berhasil
        return redirect()->back()->with('success', 'Pengalaman kerja telah dihapus.');
    }
}
