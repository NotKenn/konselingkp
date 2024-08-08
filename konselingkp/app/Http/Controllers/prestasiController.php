<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

use Illuminate\View\View;

use App\Models\tblPrestasi;

use Illuminate\Http\RedirectResponse;

use Barryvdh\DomPDF\Facade\Pdf;

class prestasiController extends Controller
{
    public function index(): View
    {
        $prestasi = tblPrestasi::all();

        return view('prestasi.index', compact('prestasi'));
    }
    public function create()
    {
        $prestasi = tblPrestasi::all();
        $students = Students::all();

        return view('prestasi.create', compact('prestasi', 'students'));
    }
    public function store()
    {
        $attributes = request()->validate([
            'NISN'              =>'required',
            'kelas'             =>'required',
            'tglPrestasi'       =>'required',
            'namaPrestasi'      =>'required',
            'tingkatPrestasi'   =>'required',
            'peringkatPrestasi' =>'required'
        ]);

        tblPrestasi::create($attributes);

        return redirect()->route('prestasi.index');
    }
    public function edit(string $id)
    {
        $prestasi = tblPrestasi::findOrFail($id);
        $students = Students::all();

        return view('prestasi.edit', compact('prestasi', 'students'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'NISN'              =>'required',
            'kelas'             =>'required',
            'tglPrestasi'       =>'required',
            'namaPrestasi'      =>'required',
            'tingkatPrestasi'   =>'required',
            'peringkatPrestasi' =>'required'
        ]);

        //get post by ID
        $prestasi = tblPrestasi::findOrFail($id);

            //update post without image
            $prestasi->update([
                'NISN'              =>$request->NISN,
                'kelas'             =>$request->kelas,
                'tglPrestasi'       =>$request->tglPrestasi,
                'namaPrestasi'      =>$request->namaPrestasi,
                'tingkatPrestasi'   =>$request->tingkatPrestasi,
                'peringkatPrestasi' =>$request->peringkatPrestasi
        ]);
        //redirect to index
        return redirect()->route('prestasi.index');
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $prestasi = tblPrestasi::findOrFail($id);

        //delete post
        $prestasi->delete();

        //redirect to index
        return redirect()->route('prestasi.index');
    }
    public function cetak_pdf()
    {
        $prestasi = tblPrestasi::all();

        $pdf = Pdf::loadview('prestasi.printPdf',['prestasi'=>$prestasi])->setpaper('A4', 'landscape');
        return $pdf->stream();
    }
}
