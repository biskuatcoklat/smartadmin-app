<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EmploymentController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search'))
        {
            $pegawai = Employment::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }
        else
        {
            $pegawai = Employment::paginate(10);
        }

        return response()->json([
            'employments'=>$pegawai
        ]);
        return view('pegawai.index',compact('pegawai'));
    }
    public function createpegawai()
    {
        return view('pegawai.tambahpegawai');
    }
    public function store(Request $request)
    {
        $pegawai = Employment::create($request->all());
        if($request->hasFile('foto'))
        {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $pegawai->foto= $request->file('foto')->getClientOriginalName();
            $pegawai->save();
        }
        return response()->json([
            'employments'=>$pegawai
        ]);
        return redirect('/karyawan')->with('success','Data Berhasil Di Simpan');
    }
    public function edit($id)
    {
        $pegawai = Employment::find($id);
        return response()->json([
            'employments'=>$pegawai
        ]);
        return view('pegawai.editdata',compact('pegawai'));
    }
    public function update(Request $request, $id)
    {
        $pegawai = Employment::find($id);
        $pegawai->update($request->all());
        return response()->json([
            'employments'=>$pegawai
        ]);
        return redirect('/karyawan')->with('success','Data Berhasil Di Update');
    }
    public function destroy($id)
    {
        $pegawai = Employment::find($id);
        $pegawai->delete();
        return response()->json([
            'message'=>'pegawai hapus'
        ],204);
        return redirect('/karyawan')->with('success','Data Berhasil hapus');
    }
    public function exportpdf()
    {
        $pegawai= Employment::all();
        view()->share('pegawai',$pegawai);
        $pdf= PDF::loadview('pegawai.datapegawai-pdf');
        return $pdf->download('datapegawai.pdf');
    }
}
