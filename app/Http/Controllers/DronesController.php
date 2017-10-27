<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DroneRequest;
use Auth;

class DronesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


    public function userDepartment()
    {

        $searchString           = \Input::get('q');
        $userDepartment          = \DB::table('departments')
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

                "id"     => "{$department->id}",
                "name"   => "Department ID: {$department->id} >  Name: {$department->name}",
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
