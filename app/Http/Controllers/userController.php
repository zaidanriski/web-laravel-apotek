<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
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
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data = User::where('username',$username)->first();
        if(count($data) > 0 ){
            if(Hash::check($password,$data->password)){
                Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('level',$data->level);
                Session::put('login',TRUE);
                return redirect('/');
            }else{
                return redirect('login')->with('alert','Password Salah');
            }
        }else{
            return redirect('login')->with('alert','NIP/Password Salah');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        if(!session::get('login')){
            return redirect('login')->with('alert', 'kamu harus login dahulu');
        }else{
            $data = User::all();
            return view('dataUser', compact('data'));
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function input(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'username' => 'required|min:5',
            'password' => 'required|min:5',
            'level' => 'required|min:3',
        ]);

        $data = new User();
        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->level = $request->level;
        $data->save();
        return redirect('user')->with('alert','User Berhasil di Tambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where("id","=","$id")->first();
        $level = User::pluck('level');

        return view('editUser', compact($level))->with('data', $data);
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
        $data = User::find($id);

        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->level = $request->level;
        $data->save();

        return redirect('user')->with('alert','User Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect('user')->with('alert','User Berhasil di Hapus');
    }

     public function logout()
    {
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
}
