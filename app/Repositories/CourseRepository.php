<?php

namespace App\Repositories;

use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseRepository extends AbstractRepository
{
    protected $model;
    public function __construct(Course $course)
    {
        $this->model = $course;
    }

    public function allCourses(){
        $data = $this->model->all();
        return CourseResource::collection($data);
    }

    public function saveCourse($request){
        $this->model->name = $request['name'];
        $this->model->capacity = $request['capacity'];
        $this->model->save();
        return $this->model;
    }

    public function updateCourse($request, $id){
        $this->model = $this->model->find($id);
        $this->model->name = $request['name'];
        $this->model->capacity = $request['capacity'];
        $this->model->save();
        return $this->model;
    }

    public function getCourse($id){
        return $this->model->find($id);
    }

    public function deleteCourse($id){
        return $this->model->find($id)->delete();
    }
}
