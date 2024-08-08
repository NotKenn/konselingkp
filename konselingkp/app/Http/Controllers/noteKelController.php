<?php

namespace App\Http\Controllers;
use App\Models\noteKelompok;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf;


class noteKelController extends Controller
{
    public function index(): View
    {
        $notesK = noteKelompok::all();
        $users = User::all();

        return view('noteKel.index', compact('notesK', 'users'));
    }
    public function create()
    {
        $users = User::all();
        $notesK = noteKelompok::all();

        return view('noteKel.create', compact('users', 'notesK'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'user_id'                   => 'required',
            'targetKonselingKelompok'   => 'required',
            'tglRencanaPelaksanaan'     => 'required',
            'materi'                    => 'required',
            'tglRealisasiPelaksanaan'   => 'required',
            'evaluasiProses'            => 'required',
            'evaluasiAkhir'             => 'required',
            'status'                    => 'required',
            'descHambatan'              => 'required',
            'descAltSolusi'             => 'required',
            'descRTL'                   => 'required'
        ]);

        $notesK = noteKelompok::create($attributes);

        return redirect('noteKel');
    }
    public function edit(string $id): View
    {
        //get post by ID
        $notesK = noteKelompok::findOrFail($id);

        //render view with post
        return view('noteKel.edit', compact('notesK'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'user_id'                   => 'required',
            'targetKonselingKelompok'   => 'required',
            'tglRencanaPelaksanaan'     => 'required',
            'materi'                    => 'required',
            'tglRealisasiPelaksanaan'   => 'required',
            'evaluasiProses'            => 'required',
            'evaluasiAkhir'             => 'required',
            'status'                    => 'required',
            'descHambatan'              => 'required',
            'descAltSolusi'             => 'required',
            'descRTL'                   => 'required'
        ]);

        //get post by ID
        $notes = noteKelompok::findOrFail($id);

            //update post without image
            $notes->update([
                'user_id'                   => $request->user_id,
                'targetKonselingKelompok'   => $request->targetKonselingKelompok,
                'tglRencanaPelaksanaan'     => $request->tglRencanaPelaksanaan,
                'materi'                    => $request->materi,
                'tglRealisasiPelaksanaan'   => $request->tglRealisasiPelaksanaan,
                'evaluasiProses'            => $request->evaluasiProses,
                'evaluasiAkhir'             => $request->evaluasiAkhir,
                'status'                    => $request->status,
                'descHambatan'              => $request->descHambatan,
                'descAltSolusi'             => $request->descAltSolusi,
                'descRTL'                   => $request->descRTL
        ]);
        //redirect to index
        return redirect()->route('noteKel.index');
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $note = noteKelompok::findOrFail($id);

        //delete post
        $note->delete();

        //redirect to index
        return redirect()->route('noteKel.index');
    }
    public function cetak_pdf()
    {
        $noteK = noteKelompok::all();

        $pdf = Pdf::loadview('notekel.printPdf',['noteK'=>$noteK])->setpaper('A4', 'landscape');
        return $pdf->stream();
    }
}
