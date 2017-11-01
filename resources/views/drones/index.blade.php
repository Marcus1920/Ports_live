@extends('master')
@section('content')
    <div class="block-area" id="basic">
        <ol class="breadcrumb hidden-xs">
            <li class="active">Drone Request Form</li>
        </ol>
        <h4 class="page-title">REQUEST FORM</h4>
        <br>
        <div class="tile p-15" style="margin:0 auto;" >
            {!! Form::open(['url' => '/api/v1/drone', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"requestDroneForm" ]) !!}
            {!! Form::hidden('created_by',Auth::user()->id)!!}
            {{Auth::user()->id}}
            <div class="form-group">
                {!! Form::label('Search Department', 'Search Department', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::text('department',null,['class' => 'form-control validate[required]' ,'id' => 'department']) !!}
                    @if ($errors->has('department')) <p class="help-block red">*{{ $errors->first('department') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Select Drone', 'Select Drone', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {!! Form::select('drone_type_id',$selectDroneTypes,"",['class' => 'form-control validate[required]' , 'value '=>'$selectDroneTypes->id','id' => 'drone_type_id']) !!}
                    @if ($errors->has('drone_type_id')) <p class="help-block red">*{{ $errors->first('drone_type_id') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Select Drone Services', 'Select Drone Services', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    {{--{!! Form::select('sub_drone_type_id',Null,['class' => 'form-control validate[required]' ,'id' => 'sub_drone_type_id']) !!}--}}
                    {{--@if ($errors->has('sub_drone_type_id')) <p class="help-block red">*{{ $errors->first('sub_drone_type_id') }}</p> @endif--}}

                <select class="form-control" id="dsub_drone_type_i">
                        <option>Select Drone Service</option>


                </select>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Comment', 'Comment', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                    <textarea rows="5" id="comments" name="comments" class="form-control" maxlength="500" title="short"></textarea>
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
            var DroneServices = [];
            $.ajax({
                url:'droneSubType/'+ id,
                success: function(response){
                    var data  = JSON.stringify(response);
                   // return alert(data);
//                    for (var x=0; x < data.length; x++) {
////                        console.log(data[i]); //"aa", "bb"
//                         //alert(data[0][x]);
//                        DroneServices.push(data[x]);
//                    }
                   $.each(data,function(key,value)
                  {
                        //return alert(DroneServices.push(data[i]));
                         var id=  DroneServices.push(value);
                       return alert(DroneServices);
                  });

                    document.getElementById("dsub_drone_type_i").innerHTML="<option>Select Drone Service</option>";
                    for(var i= 0; i < DroneServices.length;i++)
                    {
                        document.getElementById("dsub_drone_type_i").innerHTML+="<option value="+DroneServices[i].id+">"+DroneServices[i].name+"</option>"
                    }

      //   return          alert(DroneServices[2]);
//                    return DroneServices;



//                    t.appendChild(DroneServices);
                    //alert(DroneServices);

//                    alert(DroneService);


//                    var $result   = $(DroneServices).find('#sub_drone_type_id').val();
//                    return DroneServices;
                }
            });

        })
        $("#department").tokenInput("{!! url('/api/v1/userDepartment')!!}",{tokenLimit:1});
    </script>
    @endsection