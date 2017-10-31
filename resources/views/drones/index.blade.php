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
            {!! Form::hidden('userId',Auth::user()->id) !!}
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
                    {!! Form::select('sub_drone_type_id',$selectTaskPriorities,"",['class' => 'form-control validate[required]' ,'id' => 'sub_drone_type_id']) !!}
                    @if ($errors->has('sub_drone_type_id')) <p class="help-block red">*{{ $errors->first('sub_drone_type_id') }}</p> @endif
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
           // alert( this.value);
            var id = this.value;
            $.ajax({
                url:'droneSubType/'+ id,
                success: function(response){
                    alert(response)
                }
            });

            var selectText  = $(this).find("option:selected").text();
            if(selectText == 'Case' )
            {
                $('.searchCase').removeClass('hidden');
                $("#case_id").removeAttr('disabled');

            }
            else {

                $('.searchCase').addClass('hidden');
                $("#case_id").attr('disabled','disabled');
            }

        })

        $("#department").tokenInput("{!! url('/api/v1/userDepartment')!!}",{tokenLimit:1});
    </script>
    @endsection
"ajax": "{!! url('/getTasks')!!}",