@extends('master')

@section('content')
    <div class="container" id="droneApproval">
        <form class="form-horizontal" id="droneApproval">
            <div class="row">
                <div  class="col-sm-6 col-sm-6">
                    <h5 class="h3"> Case  Number : {{$droneRequest->id}}</h5>

                    <h5 class="h3"> Created By   : {{$droneRequest->User->name}} {{$droneRequest->User->surname}}</h5>


                    <h5 class="h3">  Service  Request : {{$droneRequest->DroneType->name}} </h5>

                    <h5 class="h3">  Drone sub type : {{$droneRequest->DroneSubType->name}} </h5>

                </div>
            </div>
            <div class="btn-group btn-group-justified">

                <div class="col-md-4" style="margin-top:20px;">
                    <button type="button" class="btn btn-primary">Approve</button>
                </div>

            </div>
                <div class="col-md-4" style="margin-top:20px;">
                        <button type
                                class="btn  btn-danger">Reject
                        </button>
                </div>
                <div class="form-group">
                    {{--{!! Form::label('RejectReason','RejectReason', array('class'=> 'col-md-3 control-label')) !!}--}}
                        <div class="col-md-6">
                            <div class="col-md-2 " style="margin-top:10px;">
                            <select name="rejectReason" id="rejectReason" class="form-control input-sm">
                            <option value="">{{$selectDroneRejectReason[0]}}</option>
                            </select>

                            </div>

                    </div>

                </div>
            {{--<div class="col-md-2 " style="margin-top:10px;">--}}
                {{--<select name="rejectReason" id="rejectReason" class="form-control input-sm">--}}
                    {{--<option value="">{{$selectDroneRejectReason[0]}}</option>--}}
                {{--</select>--}}

            {{--</div>--}}
            <div class="form-group">
            </div>
            <div class="form-group">

                <div class="col-md-2">
                    Search <input type="search" class="form-control">
                    <h3> Case Status  : {{$droneRequest->DroneCaseStatus->name}} </h3>
                    <h3> Date   : {{$droneRequest->created_at}} </h3>
                    <h3> Case Duration   : {{$droneRequest->created_at->diffForHumans()}}  </h3>
                </div>
            </div>
            <div class="form-group" >
                <div class="row">

                    <div class="col-md-6">
                        <label for="comment">Comment</label>
                        {{--{!! Form::label('Comment','Comment',array('class'=>'col-md-3 control-label'))!!}--}}
                        <textarea id="comment" rows="5" class="form-control" name="comment" ></textarea>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
@section('footer')
<script>
    $('#task_category_id').on('change',function(){

        var selectText  = $(this).find("option:selected").text();

        if(selectText == 'Case' ){

            $('.searchCase').removeClass('hidden');
            $("#case_id").removeAttr('disabled');

        } else {

            $('.searchCase').addClass('hidden');
            $("#case_id").attr('disabled','disabled');
        }

    })


    $("#task_user_id").tokenInput("{!! url('/getUsers')!!}",{tokenLimit:1});
    $("#case_id").tokenInput("{!! url('/getCases')!!}",{tokenLimit:1});

</script>
@endsection

