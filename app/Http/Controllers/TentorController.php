<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tentor;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Pendidikan;
use Illuminate\Support\Str;

class TentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = 'tentor';
            // $data = User::select('*');
            return Datatables::of(Tentor::with('user', 'pendidikan'))
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

        return view('page.tentor.view');
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->id);

        if ($user->status === 0) {
            $user->status = 1;
            $user->save();
        } else {
            $user->status = 0;
            $user->save();
        }

        return response()->json([], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pendidikan = Pendidikan::all();
        return view('page.tentor.create', compact('pendidikan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:225',
            'address' => 'required',
            'phone' => 'required|unique:users,phone',
            'pendidikan' => 'required',
            'username' => 'required|max:50|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        $user = new User;
        $user->slug = Str::random(16);
        $user->name = $validate['name'];
        $user->address = $validate['address'];
        $user->phone = $validate['phone'];
        $user->username = $validate['username'];
        $user->email = $validate['email'];
        $user->password = bcrypt($validate['password']);
        $user->role = 'tentor';
        $user->status = 0;
        $user->save();

        $tentor = new Tentor;
        $tentor->slug = Str::random(16);
        $tentor->user_id = $user->id;
        $tentor->pendidikan_id = $validate['pendidikan'];
        $tentor->save();

        return redirect(route('tentor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tentor  $tentor
     * @return \Illuminate\Http\Response
     */
    public function show(Tentor $tentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tentor  $tentor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tentor = tentor::with('user', 'pendidikan')
            ->where('id', $id)->first();
        $pendidikan = Pendidikan::all();

        return view('page.tentor.edit', compact('pendidikan', 'tentor'));
    }

    public function checkUpdateUser($tentor, $field, $request)
    {
        $user = User::where($field, $request)
            ->where($field, '<>', $tentor->user->$field)->count();

        return $user;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tentor  $tentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|max:225',
            'address' => 'required',
            'phone' => 'required',
            'pendidikan' => 'required',
            'username' => 'required|max:50',
            'email' => 'required',
        ]);

        $tentor = Tentor::with('user')->where('id', $id)->first();
        $field = ['phone', 'username', 'email'];
        foreach ($field as $f) {
            $user = $this->checkUpdateUser($tentor, $f, $validate[$f]);
            if ($user > 0) {
                $message = ($f == 'phone') ? "Nomor telepon telah dipakai pengguna lain" : ucfirst($f) . " telah dipakai pengguna lain";
                return back()->with("message", $message);
            }
        }

        $user = User::where('id', $tentor->user_id)->first();
        $user->name = $validate['name'];
        $user->address = $validate['address'];
        $user->phone = $validate['phone'];
        $user->username = $validate['username'];
        $user->email = $validate['email'];
        if ($request['password']) {
            $user->password = bcrypt($request['password']);
        }
        $user->save();

        $tentor->pendidikan_id = $validate['pendidikan'];
        $tentor->save();

        return redirect(route('tentor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tentor  $tentor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tentor = Tentor::with('user')->where('id', $id)->first();
        $user = User::where('id', $tentor->user_id)->first();
        $user->delete();

        return redirect(route('tentor.index'));
    }
}
