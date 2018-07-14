<?php

namespace App\Http\Controllers;

use App\Obat;
use App\jenisobat;
use App\kategoriobat;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class obatController extends Controller
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
            $data = DB::table('obats')
            ->join('jenisobats', 'obats.jenis_obat', '=', 'jenisobats.id')
            ->join('kategoriobats', 'obats.kategori', '=', 'kategoriobats.id')
            ->select('obats.*', 'jenisobats.jenis', 'kategoriobats.kategori')
            ->get();
        $kategori = kategoriobat::pluck('kategori', 'id');
        $jenis = jenisobat::pluck('jenis', 'id');

        return view('obat', compact('data', 'kategori', 'jenis'));
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
