<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DroneRequest;
use App\DroneRequestActivity;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use  Response ;
use Redirect;
use App\Http\Requests\DroneRequestForm;
class DroneRequestController extends Controller
{

    public function index()
    {
        //Eloquent
      /*  $droneRequests = DroneRequest::with('User')
            ->with('DroneType')
            ->with('DroneSubType')
            ->with('DroneCaseStatus')
            ->with('Department')
            ->with('RejectReason')
            ->get();
			*/

             $droneRequests = \DB::table('drone_requests')
            ->join('drone_types', 'drone_requests.drone_type_id', '=', 'drone_types.id')
            ->join('drone_sub_types', 'drone_requests.sub_drone_type_id', '=', 'drone_sub_types.id')
            ->join('users', 'drone_requests.created_by', '=', 'users.id')
            ->join('drone_approval_statuses', 'drone_requests.drone_case_status', '=', 'drone_approval_statuses.id')
            ->join('departments', 'drone_requests.department', '=', 'departments.id')
            ->join('drone_reject_reasons', 'drone_requests.reject_reason', '=', 'drone_reject_reasons.id')
            ->select(\DB::raw
            (
                "
                    drone_requests.id,
                    drone_requests.created_at,
                    drone_types.name as DroneType,
                    drone_sub_types.name as DroneSubType,
                    drone_requests.comments,
                    users.name as CreatedBy,
                    drone_approval_statuses.name as CaseStatus,
                    departments.name as Department,
                    drone_reject_reasons.reason as RejectReason
                "
            )
            )
            
            ->paginate(1);
            return Response::json($droneRequests,200);

      //  return Response()->json($droneRequests)  ;
    }

    public function create()
    {

    }

    public function store(DroneRequestForm $request)
    {
        $newDroneRequest = new DroneRequest();
        $newDroneRequest->created_by = $request['created_by'];
        $newDroneRequest->drone_type_id = $request['drone_type_id'];
        $newDroneRequest->sub_drone_type_id = $request['sub_drone_type_id'];
        $newDroneRequest->drone_case_status = 1;
        $newDroneRequest->comments = $request['comment'];
        $newDroneRequest->department = $request['department'];
        $newDroneRequest->reject_reason = 4;
        $newDroneRequest->reject_other_reason = "None";
        $newDroneRequest->save();

        \Session::flash('success', 'A drone request   has been sent, you will get a response soon!');
        return Redirect::back();
    }

    public function FirstApprove($id, Request $request)
    {
        $dronRequest = DroneRequest::where('id',$id)
            ->update(['drone_case_status'=> 2,
                'updated_at'=>\Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString()]);

        $dronRequestActivity = new DroneRequestActivity();
        $dronRequestActivity->drone_request_id = $id;
        $dronRequestActivity->user = $request['user'];
        $dronRequestActivity->activity = "first approved drone request";
        $dronRequestActivity->save();

        return $dronRequestActivity;
    }

    public function Approve($id, Request $request)
    {
        $dronRequest = DroneRequest::where('id',$id)
            ->update(['drone_case_status'=> 3,
                'updated_at'=>\Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString()]);

        $dronRequestActivity = new DroneRequestActivity();
        $dronRequestActivity->drone_request_id = $id;
        $dronRequestActivity->user = $request['user'];
        $dronRequestActivity->activity = "final approved drone request";
        $dronRequestActivity->save();

        return "Successfully Approved";
    }

    public function Reject($id, Request $request)
    {
        $dronRequest = DroneRequest::where('id',$id)
            ->update(['drone_case_status'=> 4,
                'updated_at'=>\Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString()]);

        $dronRequestActivity = new DroneRequestActivity();
        $dronRequestActivity->drone_request_id = $id;
        $dronRequestActivity->user = $request['user'];
        $dronRequestActivity->activity = "rejected drone request";
        $dronRequestActivity->save();

        return "Successfully Rejected drone request";
    }

    public function requestDrones()
    {

       


      return view('drones.index');

    }


    public function userDepartment()
    {

        $searchString = \Input::get('q');
        $userDepartment = \DB::table('departments')
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


                "name" => "Department ID: {$department->id} >  Name: {$department->name}",
                "id" => "{$department->id}"
            );
        }

        return $data;
    }


    public function secondApprovalForm()
    {
        return view('drones.secondApproval');
            }

        public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
