@extends('master')
@section('content')
    <div class="block-area container" id="droneApproval">
        <ol class="breadcrumb hidden-xs">
            <li><a href="{{ url('tasks') }}">TASK LIST</a></li>
            <li class="active"></li>
        </ol>
        <h4 class="page-title">Second Approval</h4>
        <br>
        <div class="row justify-content-center">
            {{--{!! Form::open(['url' => 'tasks', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"addTaskCaptureForm" ]) !!}--}}
                {{--<form class="form-horizontal" id="droneApproval">--}}

            <div  class="col-md-4 " style="margin-left: 200px;">
                <h3 class="block-title">CASE DETAILS</h3>
                        <h5 class="h3"> Case  Number   :</h5>
                        <h5 class="h3">Case Status     :</h5>
                        <h5 class="h3">Case logged Date:</h5>
                        <h5 class="h3">Case Duration   :</h5>
            </div>
                    <div  class="col-md-4">
                        <h3 class="block-title">DRONES DETAILS</h3>
                        <h5 class="h3"> Drone Type   : </h5>
                        <h5 class="h3">Drone Service Request  : </h5>
                        <h5 class="h3">Requested by : </h5>
                        <h5 class="h3">Department Requested Service:  </h5>
                    </div>
        </div>
        <br/>
        <div  class="col-md-4 " style="margin-left: 200px;">
        <h3 class="block-title">ACTION</h3>
        </div>
        <div class="row" style="margin-left: 500px;">

            {!! Form::open(['url' => 'tasks', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"addTaskCaptureForm" ]) !!}
            <div class="form-group">
                    <div class="col-md-6" style="margin-top:20px;">

                        <button type="button" class="btn btn-primary">Approve</button>
                        <button type="button" class="btn  btn-danger">Reject</button>
                    </div>
            </div>


            <div class="form-group">
                <div class="col-md-6">
                    <div class="col-md-3 " style="margin-top:10px;">
                        <select name="rejectReason" id="rejectReason" class="form-control input-sm">
                            <option value="">-reject reason-</option>
                        </select>

                    </div>

                </div>

            </div>
        <br/>

            <div class="form-group">
                <div class="col-md-10">
                    <button type="submit" type="button" class="btn btn-sm">Submit</button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
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

