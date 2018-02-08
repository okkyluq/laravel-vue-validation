<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use App\Mahasiswa;

class mahasiswaController extends Controller
{
    public function getDataMahasiswa()
    {
    	$data = DB::table('mahasiswa')->paginate(5);
    	return response()->json($data);
    }

    public function store(Request $request)
    {
    	
    	$this->validate($request, [
    		'nim'=> 'required|numeric|unique:mahasiswa',
    		'nama'=> 'required|unique:mahasiswa',
    		'tempat_lahir'=> 'required'
    	]);

    	$data = DB::table('mahasiswa')->insert([
    		'nim'=> $request->nim,
    		'nama'=> $request->nama,
    		'tempat_lahir'=> $request->tempat_lahir
    	]);

    	return response()->json($data);


    }
}
