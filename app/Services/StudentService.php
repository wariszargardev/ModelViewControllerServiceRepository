<?php

namespace App\Services;

use App\Http\Resources\StudentResource;
use App\Repositories\StudentRepository;
use InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function studentsList(){
        return $this->studentRepository->studentLists();
    }

    public function saveStudent($request){
        $validator = Validator::make($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->studentRepository->saveStudent($request);
    }

    public function getStudent($id){

        $student = $this->studentRepository->getStudent($id);
        if($student){
            return new StudentResource($student);
        }
        else{
            throw new InvalidArgumentException("No record found with this " . $id);
        }
    }

    public function updateStudent($input , $id){
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $student = $this->studentRepository->getStudent($id);
        if($student){
            return $this->studentRepository->updateStudent($input, $student);
        }
        else{
            throw new InvalidArgumentException("Record not found with Id " .$id);
        }
    }

    public function deleteById($id){
        $student = $this->studentRepository->getStudent($id);
        if($student){
            return $this->studentRepository->deleteStudent($id);
        }
        else{
            throw new InvalidArgumentException("No record found with this " . $id);
        }
    }
}
