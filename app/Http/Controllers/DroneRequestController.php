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
            ->paginate(10);

        return $droneRequests;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $newDroneRequest = new DroneRequest();
        $newDroneRequest->created_by = $request['created_by'];
        $newDroneRequest->drone_type_id = $request['drone_type_id'];
        $newDroneRequest->sub_drone_type_id = $request['sub_drone_type_id'];
        $newDroneRequest->drone_case_status = 1;
        $newDroneRequest->comments = $request['comments'];
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

    public function show($id)
    {
        $droneRequest = DroneRequest::with('DroneType')
            ->with('DroneSubType')
            ->with('DroneCaseStatus')
            ->with('Department')
            ->with('RejectReason')
            ->where('id',$id)
            ->get();

        $droneRequestActivity = DroneRequestActivity::with('DroneRequest')
            ->with('User')
            ->where('drone_request_id',$id)
            ->get();

        return compact('droneRequest','droneRequestActivity');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
