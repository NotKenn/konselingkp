<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use App\Models\tblKasus;

use App\Models\Students;

use Barryvdh\DomPDF\Facade\Pdf;

class kasusController extends Controller
{
    public function index(): View
    {
        $kasus = tblKasus::all();

        return view('kasus.index', compact('kasus'));
    }
    public function create()
    {
        $kasus = tblKasus::all();
        $students = Students::all();

        return view('kasus.create', compact('kasus', 'students'));
    }
    public function store()
    {
        $attributes = request()->validate([
            'NISN'              =>'required',
            'tglKasus'          =>'required',
            'penjelasan'        =>'required',
            'penanganan'        =>'required',
            'kelas'             =>'required',
            'penanganKasus'     =>'required',
            'rencanaTindakLanjut'=>'required',
            'status'            =>'required'
        ]);

        tblKasus::create($attributes);

        return redirect()->route('kasus.index');
    }
    public function edit(string $id)
    {
        $kasus = tblKasus::findOrFail($id);
        $students = Students::all();

        return view('kasus.edit', compact('kasus', 'students'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'NISN'              =>'required',
            'tglKasus'          =>'required',
            'penjelasan'        =>'required',
            'penanganan'        =>'required',
            'kelas'             =>'required',
            'penanganKasus'     =>'required',
            'rencanaTindakLanjut'=>'required',
            'status'            =>'required'
        ]);

        //get post by ID
        $kasus = tblKasus::findOrFail($id);

            //update post without image
            $kasus->update([
                'NISN'              =>$request->NISN,
                'tglKasus'          =>$request->tglKasus,
                'penjelasan'        =>$request->penjelasan,
                'penanganan'        =>$request->penanganan,
                'kelas'             =>$request->kelas,
                'penanganKasus'     =>$request->penanganKasus,
                'rencanaTindakLanjut'=>$request->rencanaTindakLanjut,
                'status'            =>$request->status
        ]);
        //redirect to index
        return redirect()->route('kasus.index');
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $kasus = tblKasus::findOrFail($id);

        //delete post
        $kasus->delete();

        //redirect to index
        return redirect()->route('kasus.index');
    }
    public function cetak_pdf()
    {
        $kasus = tblKasus::all();

        $pdf = Pdf::loadview('kasus.printPdf',['kasus'=>$kasus])->setpaper('A4', 'landscape');
        return $pdf->stream();
    }
}
