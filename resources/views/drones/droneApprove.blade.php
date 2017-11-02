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

                    <button type="button" class="btn  btn-danger" id="rejectId">Reject</button>
                </div>

                </div>

            <div class="form-group reason hidden">
                <div class="col-md-6">
                    <div class="col-md-2 " style="margin-top:10px;">
                        <select name="rejectReason" id="rejectReason" class="form-control input-sm"  >
                            {{--<option value="">{{$selectDroneRejectReason[0]}}</option>--}}
                            <option value="1">Select /Reason</option>
                            <option value="2">Duplicate request</option>
                            <option value="3">Drone not available</option>
                            <option value="4">other</option>

                        </select>

                    </div>

                </div>

            </div>

            <div class="form-group">
            </div>
            <div class="form-group">

                <div class="col-md-2">
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
            <br/>

            {{--<div class="form-group submit hidden">--}}
                {{--<div class="col-md-10">--}}
                    {{--<button type="submit" type="button" class="btn btn-sm" id="submitId" disabled>Submit</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        </form>
    </div>
@endsection
@section('footer')
    <script>


        $('#rejectId').on('click',function() {
            alert('are you sure you want to reject? if yes press ok');

            $('.reason').removeClass('hidden');
            $('.submit').removeClass('hidden');
//            $("#submitId").removeAttr('disabled');
            $("#rejectReason").attr('');
        })

    </script>
@endsection

