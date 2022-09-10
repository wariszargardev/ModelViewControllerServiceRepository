<?php

namespace App\Http\Controllers\Api\Course;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService= $courseService;
    }

    public function index(){
        $data = $this->courseService->allCourses();
        return successResponse($data, 'Courses list');
    }

    public function show($id){
        try{
            $data = $this->courseService->getCourse($id);
            return successResponse($data, 'Courses details');
        }
        catch (\Exception $exception){
            return errorMessage($exception->getMessage());
        }
    }

    public function store(Request $request){
        try{
            $data = $this->courseService->saveCourse($request->all());
            return successResponse($data, 'Courses created successfully');
        }
        catch (\Exception $exception){
            return errorMessage($exception->getMessage());
        }
    }

    public function updateCourse(Request $request, $id){
        try{
            $data = $this->courseService->updateCourse($request->all(), $id);
            return successResponse($data, 'Courses update successfully');
        }
        catch (\Exception $exception){
            return errorMessage($exception->getMessage());
        }
    }


    public function deleteCourse($id){
        try{
            $this->courseService->deleteCourse($id);
            return successResponse([], 'Courses delete');
        }
        catch (\Exception $exception){
            return errorMessage($exception->getMessage());
        }
    }
}
