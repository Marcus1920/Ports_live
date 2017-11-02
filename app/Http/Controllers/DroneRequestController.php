<?php

namespace App\Http\Controllers;

use App\DroneType;
use Illuminate\Http\Request;
use App\DroneRequest;
use App\DroneRequestActivity;


use App\User;
use App\Position;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use PhpParser\Node\Expr\Array_;


use  Response ;
use Redirect;
use App\Http\Requests\DroneRequestForm;

class DroneRequestController extends Controller
{

    public function index()
    {
        $droneRequests = DroneRequest::with('User')
            ->with('DroneType')
            ->with('DroneSubType')
            ->with('DroneCaseStatus')
            ->with('Department')
            ->with('RejectReason')
            ->get();

//        $droneRequests = \DB::table('drone_requests')
//            ->join('drone_types', 'drone_requests.drone_type_id', '=', 'drone_types.id')
//            ->join('drone_sub_types', 'drone_requests.sub_drone_type_id', '=', 'drone_sub_types.id')
//            ->join('users', 'drone_requests.created_by', '=', 'users.id')
//            ->join('drone_approval_statuses', 'drone_requests.drone_case_status', '=', 'drone_approval_statuses.id')
//            ->join('departments', 'drone_requests.department', '=', 'departments.id')
//            ->join('drone_reject_reasons', 'drone_requests.reject_reason', '=', 'drone_reject_reasons.id')
//            ->select(\DB::raw
//            (
//                "
//                    drone_requests.id,
//                    drone_requests.created_at,
//                    drone_types.name as DroneType,
//                    drone_sub_types.name as DroneSubType,
//                    drone_requests.comments,
//                    users.name as CreatedBy,
//                    drone_approval_statuses.name as CaseStatus,
//                    departments.name as Department,
//                    drone_reject_reasons.reason as RejectReason
//                "
//            )
//            )
//            ->orderBy('created_at','DESC')
//            ->get();

        //->paginate(10);


        return $droneRequests;
    }

    public function create()
    {
        // $DroneRequests = $this->index();
        //var_dump($DroneRequests);
        //  return view('drones.droneApprove' ,['DroneRequests'=> $DroneRequests]);
        //return view('drones.droneApprove');
    }

    public function store(DroneRequestForm $request)
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


        $droneRequestActivity = new DroneRequestActivity();
        $droneRequestActivity->drone_request_id = $newDroneRequest->id;
        $droneRequestActivity->user = $request['created_by'];
        $droneRequestActivity->activity = "requested a drone";
        $droneRequestActivity->save();



        $userRole = User::find($request['created_by']);
        $position = Position::find($userRole->position);

        if($position->name == "SHE Representative")
        {
            $responderPosition = Position::where('name','Environmental Manager')->first();
            $droneRequestResponder = User::where('position',$responderPosition->id)->get();

            $data = array(
                'name'    => $droneRequestResponder[0]['name'],

            );

            \Mail::send('emails.Drones.DronesRequestCreate',$data,function($message) use ($droneRequestResponder)
            {
                $email = $droneRequestResponder[0]['email'];
                $message->from('info@siyaleader.net', 'Siyaleader');
                $message->to($email)->subject('testing notification');
            });

            return "Drone request created";
        }
        else if($position->name == "Engineering officer")
        {
            return "Engineering officer";
        }
        else if($position->name == "Vessel Traffic Controller")
        {
            return "vessel traffic controller";
        }
        else if($position->name == "Joint Operations Centre Monitor")
        {
            return "joint operations centre monitor";
        }
//        return $position->name;

        return "Drone request created";

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
        //return response()->json[($dronRequestActivity)];
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

    public function requestDrones($id)
    {

        $droneRequest  = DroneRequest::find($id)
            ->with('DroneType')
            ->with('DroneSubType')
            ->with('DroneCaseStatus')
            ->with('Department')
            ->with('RejectReason')
            ->with('User')
            ->first();

//        return $droneRequest->id;

       


      return view('drones.index');


       return view('drones.droneApprove',compact('droneRequest','droneRequestActivity'));
        // return view(compact('droneRequest','droneRequestActivity'));
       // return compact('droneRequest','droneRequestActivity');

    }


    public function edit($id)
    {

    }

    public function secondApprovalForm()

    {
        return view('drones.secondApproval');

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

        public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
