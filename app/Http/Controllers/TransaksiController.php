<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mendapatkan tanggal hari ini
        $tanggalHariIni = Carbon::now()->toDateString();
    
        // Validasi input
        $validatedData = $request->validate([
            'pelajaran_id' => 'required',
            'bukti_pembayaran.*' => 'file|max:2048', // Add validation rule for each file
        ]);
    
        // Mendapatkan pengguna yang sedang login
        $user = auth()->user();
    
        // Buat instance model Transaksi dan isi dengan data dari form
        $transaksi = new Transaksi;
        $transaksi->pelajaran_id = $validatedData['pelajaran_id'];
        $transaksi->user_id = $user->id;
        $transaksi->slug = Str::random(16);
        $transaksi->tanggal_pembelian = $tanggalHariIni;
        $transaksi->tanggal_pembayaran = $tanggalHariIni;
    
        if ($request->hasFile('bukti_pembayaran')) {
            $files = $request->file('bukti_pembayaran');
            $filePaths = [];
    
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('bukti_pembayaran');
                $filePaths[] = $filePath;
            }
    
            $transaksi->bukti_pembayaran = $filePaths;
        }
    
        // Simpan ke database
        $transaksi->save();
    
        // Redirect ke halaman yang diinginkan
        return redirect()->route('allpelajaran');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
