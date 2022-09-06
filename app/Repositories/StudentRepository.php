<?php

namespace App\Repositories;

use App\Http\Resources\StudentResource;
use App\Models\Student;

class StudentRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Student $student)
    {
        $this->model= $student;
    }

    public function studentLists(){
        return StudentResource::collection($this->model->all());
    }

    public function saveStudent($data){
        $this->model->name = $data['name'];
        $this->model->email = $data['email'];
        $this->model->save();
        return new StudentResource($this->model);
    }

    public function getStudent($id){
        return $this->model->find($id);
    }

    public function updateStudent($input, $student){
        $student->name = $input['name'];
        $student->email = $input['email'];
        $student->save();
        return new StudentResource($student);
    }

    public function deleteStudent($id){
        $student = $this->model->find($id);
        return $student->delete();
    }
}
