<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = User::latest()->paginate('10');
        return view('user.index', [
            "data_user" => $data_user,
            "title" => "Home",
            "sitemap" => 'User',
        ])->with ('i', (request()->input('page',1)-1)*10);
        //
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create",[
            "title" => 'Data User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_validasi= $request->validate([
            "name"              => "required",
            "email"             => "required|email",
            "password"          => "required",
            "confirm-password"  =>  "required|same:password",
        ]);

        
        $data_validasi['password'] = Hash::make($data_validasi['password']);
        $user = User::create($data_validasi);
        if (!is_null($user)) {
            return redirect('login')->with("success", "Success! Registration completed");
        } else {
            return back()->with("error", "Alert! Failed to register");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id );
        return view('user.show', [
            "user" => $user,
            "title" => "Data Pengguna",
            "sitemap" => "Lihat Data Pengguna"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',[
            "user" => $user,
            "title"=>"Edit Data Pengguna",
            "sitemap"=>"Profile"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_validasi= $request->validate([
            "name"              => "required",
            "email"             => "required|email",
            "password"          => "same: confirm-password",
        ]);

        $data_validasi['password'] = Hash::make($data_validasi['password']);
        $user = User::find($data_validasi);
        $user ->update($data_validasi);
        
        if (!is_null($user)) {
            return redirect('login')->with("success", "Success! Update completed");
        } else {
            return back()->with("error", "Alert! Failed to register");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('success','Data berhasil dihapus');
    }
}
