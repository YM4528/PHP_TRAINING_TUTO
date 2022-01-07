<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServicesInterface;

class StudentController extends Controller
{
    private $studentInterface;

    public function __construct(StudentServicesInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    public function showStudentList()
    {
        $students = $this->studentInterface->getAllStudents();
        return view('studentList')->with(['students' => $students]);
    }

    public function showStudentForm()
    {
        $majors = $this->studentInterface->getMajors();
        return view('newStudent')->with(['majors' => $majors]);
    }

    public function submitStudentForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'major' => 'required',
            'city' => 'required'
        ]);

        $this->studentInterface->addStudent($request);
        return redirect()->route('studentList')->with(['successMessage' => 'The new student is added successfully!']);
    }

    public function showStudentEditForm($id)
    {
        $majors = $this->studentInterface->getMajors();
        $student = $this->studentInterface->getStudentById($id);
        return view('editStudentForm')->with(['student' => $student, 'majors' => $majors]);
    }

    public function submitStudentEditForm($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'major' => 'required',
            'city' => 'required'
        ]);

        $this->studentInterface->editStudentById($request, $id);
        return redirect()->route('studentList')->with(['successMessage' => 'The student data is updated successfully!']);
    }

    public function deleteStudent($id)
    {
        $this->studentInterface->deleteStudentById($id);
        return redirect()->route('studentList')->with(['deleteMessage' => 'The student record is deleted successfully!']);
    }

    public function export()
    {
        return $this->studentInterface->export();
    }

    public function showImportForm()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        $this->studentInterface->import($request);
        return redirect()->route('studentList');
    }

    public function showSearchForm()
    {
        return view('search');
    }

    public function submitSearchForm(Request $request)
    {
        if ($request->name != '' || $request->start != '' || $request->end != '') {
            $students = $this->studentInterface->searchStudents($request);
            return view('searchList')->with(['students' => $students]);
        }
        return back()->with(['nullMessage' => '*Fill at least one input to search*']);
    }
}
