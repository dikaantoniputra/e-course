<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajaranTerbaru = Pelajaran::orderBy('created_at', 'desc')->take(4)->get();
        return view('index', ['pelajaranTerbaru' => $pelajaranTerbaru]);
    }

    public function about()
    {
       
        return view('about');
    }

    public function faqs()
    {
       
        return view('faqs');
    }

    public function contact()
    {
       
        return view('contact');
    }
    
    public function allpelajaran(Request $request)
    {
    
        $title = $request->input('title');
       
        $jobs = Job::query();

    
        if ($title) {
            $jobs->where('title', 'like', '%' . $title . '%');
        }
    
    
    
        $jobs = $jobs->paginate(8);
        $currentPage = $jobs->currentPage();
    
        return view('allpelajaran', [
            'companies' => $companies,
            'jobs' => $jobs,
            'currentPage' => $currentPage
        ]);
    }
    
}
