<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Employee::where('name','LIKE','%'.$request->search.'%')->Paginate(5);
        }else{
            $data = Employee::Paginate(5);
        }
        return view('pegawai',compact('data'));
    }

    public function tambah(){
        return view('tambah');
    }

    public function insert(Request $request){
        //dd($request->all());
        $data = Employee::create($request->all());

        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','Data Berhasil Ditambahkan');
    }

    public function tampil($id){
        $data = Employee::find($id);
        return view('tampil',compact('data'));
    }

    public function edit(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Edit');
    }

    public function hapus($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Dihapus');
    }

}
