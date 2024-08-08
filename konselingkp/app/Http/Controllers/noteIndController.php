<?php

namespace App\Http\Controllers;

use App\Models\noteIndividu as ModelsNoteIndividu;

use App\Models\Students;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf;


class noteIndController extends Controller
{
    public function index(): View
    {
        $notes = ModelsNoteIndividu::all();
        $users = User::all();
        $students = Students::all();

        return view('noteInd.index', compact('notes', 'users', 'students'));
    }
    public function showStep1()
    {
        $students = Students::all(); // Mengambil semua data siswa
        return view('noteInd.step1', compact('students'));
    }
    public function showStep2(Request $request)
    {
        $notes = ModelsNoteIndividu::all();
        $studentId = $request->input('students_id');
        $student = Students::get()->where('NISN', $studentId);
        $previousNotes = ModelsNoteIndividu::where('students_id', $studentId)->orderBy('tglKonseling', 'desc')->get();
        
        return view('noteind.step2', compact('notes', 'student', 'previousNotes', 'studentId'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'user_id'               => 'required',
            'students_id'           => 'required',
            'konselingSebelumnya'   => 'required',
            'isNew'                 => 'required',
            'jenisKonseling'        => 'required',
            'tglKonseling'          => 'required',
            'deskripsiUmum'         => 'required',
            'deskripsiMasalah'      => 'required',
            'tindakan'              => 'required',
            'catatan'               => 'required',
            'rencanaTindakLanjut'   => 'required',
            'tglRTL'                => 'required',
            'status'                => 'required'
        ]);

        ModelsNoteIndividu::create($attributes);

        return redirect()->route('noteInd.index');
    }
    public function editStep1($id)
    {
        $note = ModelsNoteIndividu::findOrFail($id);
        $students = Students::all();
        return view('noteInd.editStep1', compact('note', 'students'));
    }
    public function editStep2(Request $request, $id)
    {
        $note = ModelsNoteIndividu::findOrFail($id);
        $studentId = $request->input('students_id');
        $student = Students::get()->where('NISN', $studentId);
        $previousNotes = ModelsNoteIndividu::where('students_id', $studentId)->orderBy('tglKonseling', 'desc')->get();
        
        return view('noteInd.editStep2', compact('student', 'previousNotes', 'note','studentId'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $attributes = $request->validate([
            'user_id'               => 'required',
            'students_id'           => 'required',
            'konselingSebelumnya'   => 'required',
            'isNew'                 => 'required',
            'jenisKonseling'        => 'required',
            'tglKonseling'          => 'required',
            'deskripsiUmum'         => 'required',
            'deskripsiMasalah'      => 'required',
            'tindakan'              => 'required',
            'catatan'               => 'required',
            'rencanaTindakLanjut'   => 'required',
            'tglRTL'                => 'required',
            'status'                => 'required'
        ]);

        //get post by ID
        $notes = ModelsNoteIndividu::findOrFail($id);

            //update post without image
            $notes->update($attributes);
        //redirect to index
        return redirect()->route('noteInd.index');
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $note = ModelsNoteIndividu::findOrFail($id);

        //delete post
        $note->delete();

        //redirect to index
        return redirect()->route('noteInd.index');
    }
    public function cetak_pdf()
    {
        $notes = ModelsNoteIndividu::all();
        $students = Students::all();

        $pdf = Pdf::loadview('noteInd.printNote',['notes'=>$notes, 'student'>$students])->setpaper('A4', 'Landscape');
        return $pdf->stream('Data-Notes-Individuals.pdf');
    }
    public function detailStep1()
    {
        $students = Students::all(); // Mengambil semua data siswa
        $users = User::all();
        return view('noteInd.detailstep1', compact('students', 'users'));
    }
    public function detailStep2(Request $request)
    {
        $notes = ModelsNoteIndividu::all();
        $studentId = $request->input('students_id');
        $users = User::all();
        $student = Students::get()->where('NISN', $studentId);
        $previousNotes = ModelsNoteIndividu::where('students_id', $studentId)->orderBy('tglKonseling', 'desc')->get();
        
        return view('noteind.detailstep2', compact('notes', 'student', 'previousNotes', 'studentId', 'users'));
    }
}
