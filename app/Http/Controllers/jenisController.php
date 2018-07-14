<?php

namespace App\Http\Controllers;

use App\jenisobat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class jenisController extends Controller
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
            $data = jenisobat::all();
            return view('jenis', compact('data'));
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
            'jenis' => 'required|min:2',
        ]);

        $data = new jenisobat();
        $data->jenis = $request->jenis;
        $data->save();
        return redirect('jenis')->with('alert','Jenis Obat Berhasil di Tambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!session::get('login')){
            return redirect('login')->with('alert', 'kamu harus login dahulu');
        }else{
            $data = jenisobat::where("id","=","$id")->first();

            return view('editjenis')->with('data', $data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = jenisobat::find($id);

        $data->jenis = $request->jenis;
        $data->save();

        return redirect('jenis')->with('alert','Jenis Obat Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = jenisobat::find($id);
        $data->delete();

        return redirect('jenis')->with('alert','Jenis Obat Berhasil di Hapus');
    }
}
