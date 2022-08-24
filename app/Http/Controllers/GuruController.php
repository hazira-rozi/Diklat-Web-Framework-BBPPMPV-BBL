<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_guru = Guru::latest()->paginate('10');
        return view('guru.index', [
            "data_guru" => $data_guru,
            "title" => "Home", "sitemap" => 'Guru'
        ])->with ('i', (request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create', ["title"=>"Add Guru", "sitemap"=>'Guru']);
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
            "nip"   => 'required',
            "nama"  => 'required'
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index',["title"=>"Data Guru", 
                                                "sitemap"=>"Guru"])->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id);
        return view('guru.show', [
            "guru" => $guru,
            "title"=>"Data Guru",
            "sitemap"=>"Lihat Data Guru"
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
        $guru = Guru::find($id);
        return view('guru.edit',[
            "guru" => $guru,
            "title"=>"Edit Data Guru",
            "sitemap"=>"Edit Data Guru"
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
            "nip"   => 'required',
            "nama"  => 'required'
        ]);
        $guru = Guru::find($id);
        $guru->update($request->all());
        return redirect()->route('guru.index',["title"=>"Data Guru", 
                                                "sitemap"=>"Guru"])->with('success','Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        return redirect()->route('guru.index',["title"=>"Data Guru", 
        "sitemap"=>"Guru"])->with('success','Data berhasil dihapus');
    }
}
