<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;
use App\Models\noteKelompok;
use App\Models\noteIndividu;
use App\Models\tblKasus;
use App\Models\tblPrestasi;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\RedirectResponse;

class StudentsController extends Controller
{
    public function index(): View
    {
        $students = Students::OrderBy('Nama', 'asc')->paginate(15);

        return view('students.index', compact('students'));
    }

    public function createStepOne(Request $request): View
    {
        $student = $request->session()->get('students');

        return view('students.create-step-one',compact('student'));
    }
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'NISN'                  => 'required',
            'Nama'                  => 'required',
            'tempatLahir'           => 'required',
            'tglLahir'              => 'required',
            'noHP'                  => 'required',
            'Alamat'                => 'required',
            'statusKeaktifanSiswa'  => 'required'
        ]);

        if(empty($request->session()->get('student'))){
            $student = new Students();
            $student->fill($validatedData);
            $request->session()->put('student', $student);
        }else{
            $student = $request->session()->get('student');
            $student->fill($validatedData);
            $request->session()->put('student', $student);
        }
        return redirect()->route('students.create-step-two');
    }
    public function createStepTwo(Request $request)
    {
        $student = $request->session()->get('student');

        return view('students.create-step-two',compact('student'));
    }
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'namaAyah'              => 'required',
            'noHPAyah'              => 'required',
            'pekerjaanAyah'         => 'required',
            'alamatAyah'            => 'required',
            'isAyahAlive'           => 'required',
            'namaIbu'               => 'required',
            'noHPIbu'               => 'required',
            'pekerjaanIbu'          => 'required',
            'alamatIbu'             => 'required',
            'isIbuAlive'            => 'required',
            'statusMaritalOrtu'     => 'required',
            'isTinggalBersamaOrtu'  => 'required'
        ]);

        if(empty($request->session()->get('student'))){
            $student = new Students();
            $student->fill($validatedData);
            $request->session()->put('student', $student);
        }else{
            $student = $request->session()->get('student');
            $student->fill($validatedData);
            $request->session()->put('student', $student);
        }

        return redirect()->route('students.create-step-three');
    }
    public function createStepThree(Request $request)
    {
        $student = $request->session()->get('student');

        return view('students.create-step-three',compact('student'));
    }
    public function postCreateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'namaWali'      => 'required',
            'noHPWali'      => 'required',
            'pekerjaanWali' => 'required',
            'alamatWali'    => 'required'
        ]);

        if(empty($request->session()->get('student'))){
            $student = new Students();
            $student->fill($validatedData);
            $request->session()->put('student', $student);
        }else{
            $student = $request->session()->get('student');
            $student->fill($validatedData);
            $request->session()->put('student', $student);
        }

        return redirect()->route('students.create-step-final');
    }
    public function createStepFinal(Request $request)
    {
        $student = $request->session()->get('student');

        return view('students.create-step-final',compact('student'));
    }

    public function postCreateStepFinal(Request $request)
    {
        $student = $request->session()->get('student');
        $student->save();

        $request->session()->forget('student');

        return redirect()->route('students.index');
    }
    public function editStepOne(Request $request, $id)
    {
        $student =  Students::findOrFail($id);

        return view('students.edit-step-one',compact('student'));
    }
    public function postEditStepOne(Request $request, $id)
    {

        $student = Students::findOrFail($id);

        $validatedData = $request->validate([
            'NISN'                  => 'required',
            'Nama'                  => 'required',
            'tempatLahir'           => 'required',
            'tglLahir'              => 'required',
            'noHP'                  => 'required',
            'Alamat'                => 'required',
            'statusKeaktifanSiswa'  => 'required'
        ]);

        $student->update($validatedData);


        return redirect()->route('students.edit-step-two', $id);
    }
    public function editStepTwo(Request $request, $id)
    {
        $student =  Students::findOrFail($id);

        return view('students.edit-step-two', compact('student'));
    }
    public function postEditStepTwo(Request $request, $id)
    {
        $student = Students::findOrFail($id);

        $validatedData = $request->validate([
            'namaAyah'              => 'required',
            'noHPAyah'              => 'required',
            'pekerjaanAyah'         => 'required',
            'alamatAyah'            => 'required',
            'isAyahAlive'           => 'required',
            'namaIbu'               => 'required',
            'noHPIbu'               => 'required',
            'pekerjaanIbu'          => 'required',
            'alamatIbu'             => 'required',
            'isIbuAlive'            => 'required',
            'statusMaritalOrtu'     => 'required',
            'isTinggalBersamaOrtu'  => 'required'
        ]);

        $student->update($validatedData);


        return redirect()->route('students.edit-step-three', $id);
    }
    public function editStepThree(Request $request, $id)
    {
        $student =  Students::findOrFail($id);

        return view('students.edit-step-three', compact('student'));
    }
    public function postEditStepThree(Request $request, $id)
    {
        $student = Students::findOrFail($id);

        $validatedData = $request->validate([
            'namaWali'      => 'required',
            'noHPWali'      => 'required',
            'pekerjaanWali' => 'required',
            'alamatWali'    => 'required'
        ]);

        $student->update($validatedData);


        return redirect()->route('students.edit-step-final', $id);
    }
    public function editStepFinal(Request $request, $id)
    {
        $student = Students::findOrFail($id);

        return view('students.edit-step-final',compact('student'));
    }

    public function postEditStepFinal(Request $request, $id)
    {
        $student = Students::findOrFail($id);
        $student->update();

        $request->session()->forget('student');

        return redirect()->route('students.index');
    }
    public function destroy($id): RedirectResponse
    {

        //get post by ID
        $student = Students::findOrFail($id);

        //delete post
        $student->delete();

        //redirect to index
        return redirect()->route('students.index');
    }
    public function detail(string $id): ViewView
    {
        $student = Students::findOrFail($id);
        $noteI = noteIndividu::get()->where('students_id', $student->NISN);
        $kasus = tblKasus::get()->where('NISN', $student->NISN);
        $prestasi = tblPrestasi::get()->where('NISN', $student->NISN);

        return view('students.detail', compact('student','noteI', 'kasus', 'prestasi'));
    }
    public function cetak_pdf($id)
    {
        $students = Students::findOrFail($id);
        $noteI = noteIndividu::get()->where('students_id', $students->NISN);
        $kasus = tblKasus::get()->where('NISN', $students->NISN);
        $prestasi = tblPrestasi::get()->where('NISN', $students->NISN);

        $pdf = Pdf::loadview('students.printPDF',['students'=>$students,'noteI'=>$noteI,'prestasi'=>$prestasi,'kasus'=>$kasus])
        ->setpaper('A4', 'landscape')
        ->set_options(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        return $pdf->stream();
    }
    public function cetak_pdfAll()
    {
        $students = Students::all();

        $pdf = Pdf::loadview('students.printAll',['students'=>$students])
        ->setpaper('A4', 'landscape')
        ->set_option('isRemoteEnabled', TRUE);
        return $pdf->stream();
    }
    public function importStudents()
    {
        return view('students.import');
    }
    public function cetakKasus($id)
    {
        $students = Students::findOrFail($id);
        $noteI = noteIndividu::get()->where('students_id', $students->NISN);
        $kasus = tblKasus::get()->where('NISN', $students->NISN);
        $prestasi = tblPrestasi::get()->where('NISN', $students->NISN);

        $pdf = Pdf::loadview('students.printK',['students'=>$students,'noteI'=>$noteI,'prestasi'=>$prestasi,'kasus'=>$kasus])
        ->setpaper('A4', 'landscape')
        ->set_options(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        return $pdf->stream();
    }
    public function cetakPres($id)
    {
        $students = Students::findOrFail($id);
        $noteI = noteIndividu::get()->where('students_id', $students->NISN);
        $kasus = tblKasus::get()->where('NISN', $students->NISN);
        $prestasi = tblPrestasi::get()->where('NISN', $students->NISN);

        $pdf = Pdf::loadview('students.printP',['students'=>$students,'noteI'=>$noteI,'prestasi'=>$prestasi,'kasus'=>$kasus])
        ->setpaper('A4', 'landscape')
        ->set_options(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        return $pdf->stream();
    }
    public function uploadStudents(Request $request)
    {
        // blm siap
        Excel::import(new StudentsImport, $request->importExcel);
        
        return redirect('/students')->with('success', 'All good!');
    }

}
