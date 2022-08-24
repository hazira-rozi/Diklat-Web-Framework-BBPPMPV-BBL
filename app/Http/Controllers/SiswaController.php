<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_siswa = Siswa::latest()->paginate('10');
        return view('siswa.index', [
            "data_siswa" => $data_siswa,
            "title" => "Home",
            "sitemap" => 'Siswa',
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
        return view('siswa.create', ["title"=>"Add Siswa", "sitemap"=>'Siswa']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nis"   => 'required',
            "nama"  => 'required'
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index',["title"=>"Data Siswa", 
                                                "sitemap"=>"Siswa"])->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.show', [
            "siswa" => $siswa,
            "title"=>"Data Siswa",
            "sitemap"=>"Lihat Data Siswa"
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
        $siswa = Siswa::find($id);
        return view('siswa.edit',[
            "siswa" => $siswa,
            "title"=>"Edit Data Siswa",
            "sitemap"=>"Edit Data Siswa"
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
        $request->validate([
            "nis"   => 'required',
            "nama"  => 'required'
        ]);
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        return redirect()->route('siswa.index',["title"=>"Data Siswa", 
                                                "sitemap"=>"Siswa"])->with('success','Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('siswa.index',["title"=>"Data Siswa", 
        "sitemap"=>"Siswa"])->with('success','Data berhasil dihapus');
    }
}
