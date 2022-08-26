<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;



//add
use App\Models\Tingkat;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

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
        ])->with('i', (request()->input('page', 1) - 1) * 10);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //add
        $tingkat_siswa = Tingkat::all();

        return view('siswa.create', [
            "title" => "Add Siswa", "sitemap" => 'Siswa',
            //add 
            "tingkat_siswa" => $tingkat_siswa
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
        $data_validasi=$request->validate([
            "nis"   => 'required',
            "nama"  => 'required',

            //tambahkan code untuk tingkat id dan gambar
            "tingkat_id" => 'required',
            "gambar"     => 'image'

        ]);

        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }
        
            $data_validasi['gambar']=$request->file('gambar')->store('images-siswa');
        
        Siswa::create($data_validasi); //memanggil model yang akan dimanipulasi

        return redirect()->route('siswa.index', [
            "title" => "Data Siswa",
            "sitemap" => "Siswa"
        ])->with('success', 'Data berhasil ditambahkan');
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
            "title" => "Data Siswa",
            "sitemap" => "Lihat Data Siswa"
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
        //tambah code 
        $tingkat_siswa = Tingkat::all();
        return view('siswa.edit', [
            "siswa" => $siswa,
            "title" => "Edit Data Siswa",
            "sitemap" => "Edit Data Siswa",
            "tingkat_siswa" => $tingkat_siswa
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
        $data_validasi=$request->validate([
            "nis"   => 'required',
            "nama"  => 'required',
            //tambahkan
            "tingkat_id" => 'required',
            "gambar" => 'required'
        ]);

        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $data_validasi['gambar'] = $request->file('gambar')->store('images-siswa');
        $siswa = Siswa::find($id);
        $siswa->update($data_validasi);
        return redirect()->route('siswa.index', [
            "title" => "Data Siswa",
            "sitemap" =>"Siswa"
        ])->with('success', 'Data berhasil diperbaharui');
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

        //menghapus gambar yang terkait dengan siswa
        Storage::delete($siswa->gambar);

        $siswa->delete();

        return redirect()->route('siswa.index', [
            "title" => "Data Siswa",
            "sitemap" => "Siswa"
        ])->with('success', 'Data berhasil dihapus');
    }
}
