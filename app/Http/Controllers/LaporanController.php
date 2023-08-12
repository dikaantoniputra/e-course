<?php

namespace App\Http\Controllers;

use App\Models\Orderan;
use App\Models\Transaksi;
use App\Models\BuktiPembayaran;

use App\Models\Kurir;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderUpdated;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently logged-in user
    
        if ($user->role === 'admin') {
            $transaksi = Transaksi::where('status_transaksi', 'success')->get(); // Retrieve all successful transactions
        } elseif ($user->role === 'siswa') {
            $transaksi = Transaksi::where('user_id', $user->id)->where('status_transaksi', 'success')->get(); // Retrieve successful transactions based on user_id
        }
    
        return view('page.laporan.view', compact('transaksi'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderan  $orderan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderan  $orderan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderan  $orderan
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
     {
        
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderan  $orderan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }


  
    
}
