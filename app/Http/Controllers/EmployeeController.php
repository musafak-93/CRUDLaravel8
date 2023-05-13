<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::all();
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        //untuk testing
        // dd($request->all());
        Employee::create($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Tambahkan');
    }
}
