<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailJadwal;
use App\Models\Jadwal;

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

    public function user()
    {
        $user = Auth::user(); // Get the currently logged-in user
        if ($user->role === 'admin') {
            $transaksi = Transaksi::all(); // Retrieve all transactions
        } elseif ($user->role === 'siswa') {
            $transaksi = Transaksi::where('user_id', $user->id)->get(); // Retrieve transactions based on user_id
        }

        return view('page.transaksi', compact('transaksi'));
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
            'bukti_pembayaran' => 'file|max:2048', // Add validation rule for each file
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
            $file = $request->file('bukti_pembayaran');
<<<<<<< HEAD
            $path = $request->file('bukti_pembayaran')->store('public/bukti');
            $transaksi->bukti_pembayaran = 'storage/' . substr($path, 7);
        
=======
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('bukti_pembayaran');

            $transaksi->bukti_pembayaran = $filePath;
>>>>>>> a768a0363307dec504b441262b6451a2f8d32e6f
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


    public function update(Request $request, $id)
    {
        // Validate the request data if needed

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status_transaksi = $request->input('status_transaksi');
        $transaksi->save();
        $detail_jadwal = new DetailJadwal;
        $jadwal = Jadwal::where('pelajaran_id', $transaksi->pelajaran->id)->first();
        $detail_jadwal->jadwal_id = $jadwal->id;
        $detail_jadwal->user_id = $transaksi->user->id;
        $detail_jadwal->save();

        return redirect()->back()->with('success', 'Transaction status updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Perform any necessary validations or checks before deleting the transaction

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaction deleted successfully');
    }
}
