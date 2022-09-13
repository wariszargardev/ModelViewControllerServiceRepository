<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentPDFController extends Controller
{
    public function list()
    {
        $students = Student::all();

        return view('pdf.student_list',compact('students'));
    }

    public function createListPDF()
    {
        $students = Student::whereBetween('id', [1, 100])->get();

        view()->share('students',$students);

        $pdf = PDF::loadView('pdf.student-pdf-list')
            ->setPaper('a4','potrait')
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setWarnings(false);

        //return $pdf->stream(); // OPEN
        return $pdf->download(); // DOWNLOAD
    }

}
