<?php

namespace App\Http\Controllers;

use App\kategoriobat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session::get('login')){
            return redirect('login')->with('alert', 'kamu harus login dahulu');
        }else{
            $data = kategoriobat::all();
            return view('kategori', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function input(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required|min:2',
        ]);

        $data = new kategoriobat();
        $data->kategori = $request->kategori;
        $data->save();
        return redirect('kategori')->with('alert','Kategori Obat Berhasil di Tambahkan');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!session::get('login')){
            return redirect('login')->with('alert', 'kamu harus login dahulu');
        }else{
            $data = kategoriobat::where("id","=","$id")->first();

            return view('editkategori')->with('data', $data);
        }
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
        $data = kategoriobat::find($id);

        $data->kategori = $request->kategori;
        $data->save();

        return redirect('kategori')->with('alert','Kategori Obat Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = kategoriobat::find($id);
        $data->delete();

        return redirect('kategori')->with('alert','Kategori Obat Berhasil di Hapus');
    }
}
