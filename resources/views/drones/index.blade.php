@extends('master')
@section('content')
    <div class="block-area" id="basic">
        <ol class="breadcrumb hidden-xs">
            <li class="active">Drone Request Form</li>
        </ol>
        <h4 class="page-title">REQUEST FORM</h4>
        <br>

        @if(Session::has('success'))
            <div class="alert alert-success alert-icon">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
                <i class="icon">&#61845;</i>
            </div>
        @endif
        <div class="tile p-15" style="margin:0 auto;" >
            {!! Form::open(['url' => '/api/v1/drone', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"requestDroneForm" ]) !!}
            {!! Form::hidden('created_by',Auth::user()->id)!!}
            <div class="form-group">
                {!! Form::label('Search Department', 'Search Department', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('department',null,['class' => 'form-control validate[required]' ,'id' => 'department', old('department')]) !!}
                    @if ($errors->has('department')) <p class="help-block red">*{{ $errors->first('department') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Select Drone', 'Select Drone', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::select('drone_type_id',$selectDroneTypes,"",['class' => 'form-control validate[required]','id' => 'drone_type_id', old('drone_type_id')]) !!}
                    @if ($errors->has('drone_type_id')) <p class="help-block red">*{{ $errors->first('drone_type_id') }}</p> @endif
                </div>

            </div>

            <div class="form-group">
                {!! Form::label('Select Drone Services', 'Select Drone Services', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {{--{!! Form::select('sub_drone_type_id',Null,['class' => 'form-control validate[required]' ,'id' => 'sub_drone_type_id']) !!}--}}
                    {{--@if ($errors->has('sub_drone_type_id')) <p class="help-block red">*{{ $errors->first('sub_drone_type_id') }}</p> @endif--}}

                <select class="form-control" id="sub_drone_type_id" name="sub_drone_type_id"  value ="old('sub_drone_type_id')">
                        <option selected disabled>Nothing selected</option>
                </select>
                    @if ($errors->has('sub_drone_type_id')) <p class="help-block red">*{{ $errors->first('sub_drone_type_id') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Comment', 'Comment', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <textarea rows="5" id="comment" name="comment" class="form-control" maxlength="500" title="short" value=" old('comment')"></textarea>
                    @if ($errors->has('comment')) <p class="help-block red">*{{ $errors->first('comment') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <div class="col-sm-offset-6 col-sm-6">
                        <button type="submit" class="btn btn-default">Request</button>
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}
    </div>

@stop
@section('footer')
    <script>
        $('#drone_type_id').on('change',function()
        {
            var id = this.value;
            $('#sub_drone_type_id').empty();
           // var DroneServices = [];
            $.get('droneSubType/'+ id,function(response){
                $('#sub_drone_type_id').append("<option  selected disabled>Select Drone service</option>");
                $.each(response,function(key,value)
                  {
                     // DroneServices.push(value);
                      $('#sub_drone_type_id').append("<option  value="+value.id+">"+value.name+"</option>");
                  });


//                    document.getElementById("sub_drone_type_id").innerHTML="<option selected disabled>Select Drone Service</option>";
//                    for(var i= 0; i < DroneServices.length;i++)
//                    {
//                        document.getElementById("sub_drone_type_id").innerHTML+="<option  id='options' onchange='getId();' value = "+DroneServices[i].id+">"+DroneServices[i].name+"</option>";
//                    }
//                    function getId() {
//                     var selectedval  = document.getElementById("options").value();
//                     console.log(selectedval);
//                    }
//
//                }
            });
        });

        $("#department").tokenInput("{!! url('/api/v1/userDepartment')!!}",{tokenLimit:1});
    </script>
    @endsection