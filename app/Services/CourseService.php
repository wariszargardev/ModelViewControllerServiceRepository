<?php

namespace App\Services;

use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CourseService
{
    private $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository= $courseRepository;
    }

    public function allCourses(){
        return $this->courseRepository->allCourses();
    }

    public function getCourse($id){
        $course =  $this->courseRepository->getCourse($id);
        if($course){
            return $course;
        }
        else{
            throw new InvalidArgumentException("No record found");
        }
    }

    public function deleteCourse($id){
        $course =  $this->courseRepository->getCourse($id);
        if($course){
            $this->courseRepository->deleteCourse($id);
            return [];
        }
        else{
            throw new InvalidArgumentException("No record found");
        }
    }

    public function saveCourse($request){
        $data = null;
        $validator = Validator::make($request, [
            'name' => 'required|string',
            'capacity' => 'required|integer',
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        else{
            DB::beginTransaction();

            try{
                $data = $this->courseRepository->saveCourse($request);
            }
            catch (\Exception $exception){
                Log::info($exception->getMessage());

                DB::rollBack();

                throw new InvalidArgumentException($exception->getMessage());
            }

            DB::commit();

            return new CourseResource($data);
        }
    }

    public function updateCourse($request, $id){
        $data = null;
        $validator = Validator::make($request, [
            'name' => 'required|string',
            'capacity' => 'required|integer',
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        else{
            DB::beginTransaction();

            try{
                $data = $this->courseRepository->updateCourse($request, $id);
            }
            catch (\Exception $exception){
                Log::info($exception->getMessage());

                DB::rollBack();

                throw new InvalidArgumentException($exception->getMessage());
            }

            DB::commit();

            return new CourseResource($data);
        }
    }
}
