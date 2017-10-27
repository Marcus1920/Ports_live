@extends('master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('home') }}">Home</a></li>
        <li class="active">Create Case</li>
    </ol>
    <h4 class="page-title">CREATE CASE </h4>
    &nbsp;
<div id="caseNotesNotification"> </div>

    <div class="container-fluid">
    <div class="row">
        {!! Form::open(['url' => 'createCaseAgent', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"CreateCaseAgentForm" ,'files' => 'true']) !!}
        {!! Form::hidden('hseHolderId',NULL,['id' => 'hseHolderId']) !!}
        {!! Form::hidden('gpsAddressLat',NULL,['id' => 'gpsAddressLat','class' => 'latitude']) !!}
        {!! Form::hidden('gpsAddressLong',NULL,['id' => 'gpsAddressLong','class' => 'longitude']) !!}
        <div class="col-md-4">

            <h4 class="page-title"><center>Details</center> </h4>
            &nbsp;
            {{--<div class="form-group">
                {!! Form::label('Search Client', 'Search', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('hsecellphone',NULL,['class' => 'form-control input-sm','id' => 'hsecellphone']) !!}
                    <div id = "hse_error_search"></div>
                </div>
            </div>--}}


            <div class="form-group">
                {!! Form::label('Cell Number', 'Cell Number', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('cellphone',"{$user['cellphone']}",['class' => 'form-control input-sm','id' => 'cellphone','disabled']) !!}
                    <div id = "hse_error_cellphone"></div>

                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Client Name', 'Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('name',"{$user['name']}",['class' => 'form-control input-sm','id' => 'name','disabled']) !!}
                    <div id = "hse_error_name"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Client Surname', 'Surname', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('surname',"{$user['surname']}",['class' => 'form-control input-sm','id' => 'surname','disabled']) !!}
                    <div id = "hse_error_surname"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Company', 'Company', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('company',"{$user['company']}",['class' => 'form-control input-sm','id' => 'company','disabled']) !!}
                    <div id = "hse_error_company"></div>
                </div>
            </div>
						<br>
            <h4 class="page-title"><center>Incident Location</center> </h4>
            &nbsp;



            <div class="form-group">
                {!! Form::label('Enter Address', 'Enter Address', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('autocomplete',NULL,['class' => 'form-control input-sm','id' => 'autocomplete', "onfocus"=>"geolocate()"]) !!}
                    <div id="hse_error_email"></div>
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Street Number', 'Street Number', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('street_number',NULL,['class' => 'street_number form-control input-sm','id' => 'street_number']) !!}

                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Route', 'Street', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('route',NULL,['class' => 'route form-control input-sm','id' => 'route']) !!}

                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Locality', 'City', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('locality',NULL,['class' => 'locality form-control input-sm','id' => 'locality']) !!}

                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Area', 'Province', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('administrative_area_level_1',NULL,['class' => 'administrative_area_level_1 form-control input-sm','id' => 'administrative_area_level_1']) !!}

                </div>
            </div>



            <div class="form-group">
                {!! Form::label('Postal Code', 'Postal Code', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('postal_code',NULL,['class' => 'postal_code form-control input-sm','id' => 'postal_code']) !!}

                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Country', 'Country', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::text('country',NULL,['class' => 'country form-control input-sm','id' => 'country']) !!}

                </div>
            </div>



        </div>
        <div class="col-md-4">
            <h4 class="page-title"><center>References</center></h4>
            &nbsp;

            <div class="form-group">
                {!! Form::label('Client Reference Number', 'Reference Number', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    {!! Form::text('client_reference_number',NULL,['class' => 'form-control input-sm','id' => 'client_reference_number']) !!}
                    <div id = "hse_error_client_reference_number"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('SAPS Station', 'SAPS Station', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    {!! Form::text('saps_station',NULL,['class' => 'form-control input-sm','id' => 'saps_station']) !!}
                    <div id = "hse_error_saps_station"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('SAPS CAS Ref No', 'SAPS CAS Ref No', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    {!! Form::text('saps_case_number',NULL,['class' => 'form-control input-sm','id' => 'saps_case_number']) !!}
                    <div id = "hse_error_saps_case_number"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Rate Value', 'Rate Value', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    {!! Form::text('rate_value',NULL,['class' => 'form-control input-sm','id' => 'rate_value']) !!}
                    <div id = "hse_error_client_reference_number"></div>
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('Investigation Officer', 'Investigation Officer', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    <div class="input-group">
                        {!! Form::select('officers',$selectOfficers,0,['class' => 'form-control input-sm' ,'name' => 'officers','id' => 'officers']) !!}
                        <div class="input-group-addon" id="add_officer" title="Add New" style="cursor:pointer;">
                            <span class="glyphicon glyphicon-plus"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group hidden" id="txtOfficer">
                {!! Form::label('Investigation Officer', 'Investigation Officer', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    {!! Form::text('investigation_officer',NULL,['class' => 'form-control input-sm','id' => 'investigation_officer']) !!}
                    <div id = "hse_error_saps_investigation_officer"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Investigation Cellphone', 'Investigation Cellphone', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    {!! Form::text('investigation_cell',NULL,['class' => 'form-control input-sm','id' => 'investigation_cell','disabled']) !!}
                    <div id = "hse_error_saps_investigation_cellphone"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Investigation Email', 'Investigation Email', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    {!! Form::text('investigation_email',NULL,['class' => 'form-control input-sm','id' => 'investigation_email','disabled']) !!}
                    <div id = "hse_error_saps_investigation_email"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Investigation Note', 'Investigation Note', array('class' => 'col-md-4 control-label')) !!}
                <div class="col-md-7">
                    {!! Form::textarea('investigation_note',NULL,['class' => 'form-control input-sm','id' => 'investigation_note' , 'rows'=> '5']) !!}
                    <div id = "hse_error_saps_investigation_note"></div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <h4 class="page-title"><center>Description</center></h4>
            &nbsp;
            <div class="form-group">
                {!! Form::label('Case Type', 'Case Type', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::select('case_type',$selectCasesTypes,0,['class' => 'form-control input-sm' ,'name' => 'case_type[]','id' => 'case_type']) !!}
                    <div id = "hse_error_type"></div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Case Sub Type', 'Case Sub Type', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    {!! Form::select('case_sub_type',[],0,['class' => 'form-control input-sm' ,'name' => 'case_sub_type[]','id' => 'case_sub_type']) !!}
                    <div id = "hse_error_sub_type"></div>
                </div>
            </div>

            {{--<div class="form-group" id="case_sub_type_addition">--}}
            {{--<div class="col-md-3"></div>--}}
            {{--<div class="col-md-6"><a id="add_case_type" class="btn btn-sm">Add Case Type</a></div>--}}
            {{--</div>--}}

            <div id="case_types_div"></div>




            <div class="form-group">
                {!! Form::label('Problem Description', 'Problem Description', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-8">
                    <textarea rows="5" id="description" name="description" class="form-control" maxlength="500"></textarea>
                    <div id = "hse_error_description"></div>
                </div>

            </div>
<br>
            <div class="form-group">
                {!! Form::label('Attach File', 'Attach File', array('class' => 'col-md-3 control-label')) !!}
                <div class="fileupload fileupload-new row" data-provides="fileupload">
                    <div class="input-group col-md-8">
                        <div class="uneditable-input form-control">
                            <i class="fa fa-file m-r-5 fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <br>
                        <div class="input-group-btn">
                    <span class="btn btn-file btn-alt btn-sm">
                    <span class="fileupload-new">Select file</span>
                    <span class="fileupload-exists">Change</span>
                        {!!  Form::file('caseFile' , null , ['id' => 'caseFile','class' => 'form-control']) !!}
                </span>
                        </div>

                        <a href="#" class="btn btn-sm btn-gr-gray fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div>

            <br>
            <div class="form-group">
                <div class="col-md-3"></div>
                <div class="col-md-8">
                    <button type="submit" id='submitCreateCaseAgentForm' class="btn btn-sm">Create Case</button>

                </div>
            </div>

        </div>
        <hr class="whiter m-t-20" />
    </div>
</div>



@endsection