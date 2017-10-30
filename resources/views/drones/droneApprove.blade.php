@extends('master')
@section('content')
    <div class="container" >
        <form class="form-horizontal" id="droneApproval">
        <div class="row">

            <div  class="col-md-4" >
                <h3 class="h3"> Case  Number : </h3>

                <h3 class="h3"> Created By   :    </h3>
            </div>


            <div class="col-md-8">
                <h3>  Service  Request : Aquatic Drone </h3>
            </div>
        </div>

        {{--<div class="form-group">--}}
        {{--<div class="row">--}}

            {{--<div  class="col-md-4">--}}
                {{--<a href = "#" class = "list-group-item active">--}}
                    {{--Navigation--}}
                {{--</a>--}}

                {{--<a href = "#" class = "list-group-item">Home</a>--}}
                {{--<a href = "#" class = "list-group-item">All Cases</a>--}}
                {{--<a href = "#" class = "list-group-item">My  Cases</a>--}}
                {{--<a href = "#" class = "list-group-item">Cases Awaiting  Review</a>--}}

            {{--</div>--}}
        {{--</div>--}}
            {{--</div>--}}

            <div class="form-group">

                <div class="col-md-6" style="margin-top:20px;">
                    <div class="col-sm-offset-6 col-sm-6">
                    <button
                            class="btn btn-primary">Approve
                    </button>
                        {{--<p class="help-block" v-cloack v-if="submition && wrongApprove">@{{approveFB }}</p>--}}
                        <p id="approve" v-model="approve">@{{approveFB}}</p>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top:10px;">
                    <div class="col-sm-offset-6 col-sm-6">
                    <button
                            class="btn  btn-danger">Reject</button>
                        <p id="approve" v-model="approve">@{{rejectFB}}</p>

                    </div>
                </div>
            </div>

            {{--<div class="form-group">--}}
                {{--{!! Form::label('Reject Reason','Reject Reason', array('class'=>'col-md-3  control-label'))  !!}--}}
                {{--<div class="col-md-6">--}}
                    {{--{!! Form::select('rejectReason',$DroneRequests,2,['class' => 'form-control input-sm','id'=>'RejectReason','name'=>'RejectReason'])!!}--}}
                {{--</div>--}}
                {{--<p class="help-block">@{{rejectReasonFB}}</p>--}}
            {{--</div>--}}
            <div class="form-group">
                <select name="RejectReason" class="form-control">
                    @foreach($DroneRequests as $DroneRequest)
                        <option value="{{$DroneRequest->id}}"{{$DroneRequest->name}}></option>
                        @endforeach
                    <p id="RejectReason" v-model="RejectReason">@{{rejectReasonFB}}</p>
                </select>

            </div>
            <div class="form-group">

            <div class="col-md-2">
               Search <input type="search" class="form-control">`
                <h3> Case Status  : Active </h3>
                <h3> Date   : 12-03-2029 </h3>
                <h3> Case Duration   : 12-03-2029 </h3>
            </div>
            </div>
        <div class="form-group" >
        <div class="row">

            <div class="col-md-6">
                <label for="comment">Comment</label>
                <textarea id="comment" rows="5" class="form-control" v-model="comment" >@{{comment}}</textarea>
            </div>

        </div>
        </div>
        </form>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    {{--<script src="js/scripts.js"></script>--}}
@stop
@section('footer')
@stop
