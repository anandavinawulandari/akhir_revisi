<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\DB;
use Crypt;

class RegisterController extends Controller
{
 
    public function register() {
        return view('auth.register');
      }
      public function store(Request $request){        

        $validatedData = $request->validate([
          'name' => 'required|max:100',
          'email' => 'required|email:dns|unique:users',
          'password' => 'required|min:5|max:255',
          'level' => 'required|max:100',
          'deskripsipassword' => 'required|max:100',
          'nis' => 'required|unique:users',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        return redirect('/auth')->with('sucess','Data Berhasil Tersimpan');
    }
      public function opsi(){
        $data = [
            'title' => 'Register',
            'nav' => 'register',
            'dataUser' => DB::table('users')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.password',
                'users.deskripsipassword',
                'users.level',
            )
                // ->groupBy('alternatif.kode_alternatif')
                // ->orderBy('kode_alternatif')
                ->get(),
            ];
        return view('auth.opsi', $data);
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('auth.edit', compact('data'));
    }
    public function update(Request $request, $id){

        $data= User::find($id);
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->password = $request->password;
        $data->level    = $request->level;
        $data->deskripsipassword = $request->deskripsipassword;
        $data->nis      = $request->nis;
        $data->kode_hasil      = $request->kode_hasil;
        $data->update();
        return redirect('/auth')->with('sucess','Data Berhasil Diubah');
    }

    // public function show($id)
    // {
    //     $data           = User::find($id);
    //     $nilai_rangking = DB::select("SELECT nilai_rangking FROM hasil WHERE kode_hasil = '$data->nilai_rangking'")[0];

        
    //     // dd($nilai);
    //     return view('auth.index4', compact('data', 'nilai_rangking'));
    // }

}
