<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DroneRequest;
use App\Department;
use Auth;

class DronesController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        return view('drones.droneRequest');
    }
    public function store(Request $request)
    {
        $newDroneRequest = new DroneRequest();
        $newDroneRequest->created_by = Auth::user()->id;
        $newDroneRequest->drone_type_id = $request['drone_type_id'];
        $newDroneRequest->sub_drone_type_id = $request['sub_drone_type_id'];
        $newDroneRequest->drone_case_status = 1;
        $newDroneRequest->comments = $request['comment'];
        $newDroneRequest->department = $request['department'];
        $newDroneRequest->reject_reason = 4;
        $newDroneRequest->reject_other_reason = "None";
        $newDroneRequest->save();

        return "Drone request created";
    }

    public function searchDepartment(Request $request)
    {

        $error = ['error' => 'No results found, please try with different keywords.'];

        if($request->has('q'))
        {
            $posts = Department::search($request->get('q'))->get();
            return $posts->count() ? $posts : $error;
        }
        return $error;
    }

    public function userDepartment()
    {

        $searchString           = \Input::get('q');
        $userDepartment         = \DB::table('departments')
            ->whereRaw(
                "CONCAT(`departments`.`id`, ' ', `departments`.`name`) LIKE '%{$searchString}%'")
            ->select(
                array

                (
                    'departments.id as id',
                    'departments.name as name',
                )
            )

            ->get();

        $data = array();

        foreach ($userDepartment as $department) {

            $data[] = array(


                "name"   => "Department ID: {$department->id} >  Name: {$department->name}",
                "id"     => "{$department->id}"
            );
        }

        return $data;

    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }

}
