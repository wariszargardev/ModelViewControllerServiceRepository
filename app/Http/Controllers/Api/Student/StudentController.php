<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Exception;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $postService)
    {
        $this->studentService = $postService;
    }

    public function index(){
        $students = $this->studentService->studentsList();
        return successResponse($students, "Student lists");
    }

    public function store(Request $request){
        try {
            $data = $this->studentService->saveStudent($request->all());
        }
        catch (Exception $exception){
            return errorMessage($exception->getMessage());
        }
        return successResponse($data, 'Student save');
    }

    public function getStudent($id){
        try {
            return $this->studentService->getStudent($id);
        }
        catch (Exception $exception){
            return errorMessage($exception->getMessage());
        }
    }

    public function updateStudent(Request $request, $id){
        try {
            $student = $this->studentService->updateStudent($request->all(), $id);
            return successResponse($student);
        }
        catch (Exception $exception){
            return errorMessage($exception->getMessage());
        }
    }

    public function deleteStudent($id){
        try {
            $this->studentService->deleteById($id);
        }
        catch (Exception $exception){
            return errorMessage($exception->getMessage());
        }

        return successResponse([],'Record deleted with Id ' . $id);
    }

}
