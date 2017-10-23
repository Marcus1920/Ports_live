@extends('master')
@section('content')

        {{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, maximum-scale=1.0">--}}
    {{--<meta name="author" content="Gabriel Cueto <@Mushr00m_Dev - http://laesporadelhongo.com/>" />--}}
    {{--<title>Case Management System</title>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body>--}}
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Case management system</div>
        <div class="panel-body">
            <form class="form" id="form" method="POST" v-on:submit="validateForm">
                <div class="form-group" v-bind:class="{ 'has-error': submition }">
                    <label for="casenum" class="form-control-label">Case Number</label>
                    <input id="casenum"
                           class="form-control"
                           name="casenum"
                           v-model="casenum">
                    <span class="help-block" v-if="submition && wrongcasenumber">@{{caseNo}}.</span>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongservicerequest}">
                    <label for="servicereq" class="form-control-label">Service Request:Quay wall inspection</label>
                    <input type="" id="servicereq" class="form-control" name="servicereq" v-model="servicereq">
                    <span class="help-block" v-if="submition && wrongservicerequest">@{{serviceRe}}</span>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition}">
                    <label for="createb" class="form-control-label">Created By</label>
                    <input type="createb" id="createb" class="form-control" name="createb" v-model="createb">
                    <span class="help-block" v-if="submition &&  ">@{{creatBy}}</span>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition}">
                    <label for="dept" class="form-control-label">Department Request service</label>
                    <input type="dept" id="dept" class="form-control" name="dept" v-model="dept">
                    <span class="help-block" v-if="submition && wrongDepartment ">@{{Deptment}}</span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': submition}">
                    <label for="search" class="form-control-label">Search</label>
                    <input type="search" id="sch" class="form-control" name="search" v-model="search">
                    <span class="help-block" v-if="submition && wrongSearch ">@{{search}}</span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': submition}">
                    <label for="navigation" class="form-control-label">Navigation pane</label>
                    <select name="navigation" id="nav" class="form-control" >
                        <option>Navigation pane</option>
                        <option>Home</option>
                        <option>All cases</option>
                        <option>my cases</option>
                        <option>cases awaiting review</option>
                        <option></option>
                    </select>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition}"></div>

                <div>
                    {{--<a id='acceptCaseClass' class="btn btn-xs btn-alt" style="margin-top: 20%;" onClick="acceptCase()">Accept Case</a>--}}

                    <button class="btn btn-primary">Approve</button>
                    <button class="btn btn-primary">Reject</button>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongcaseStatus}">
                    <label for="caseStatus" class="form-control-label">Case Status</label>
                    <input type="caseStatus"
                           id="caseStatus"
                           class="form-control"
                           name="caseStatus"
                           v-model="caseStatus">
                    <span class="help-block" v-if="submition  && wrongCaseStatus">@{{caseStat}}</span>
                </div>

                {{--<div class="form-group" v-bind:class="{ 'has-error': submition}">--}}
                    {{--<label class="datetime" class="form-control-label">Date and time case logged</label>--}}
                    {{--<input type="stat"--}}
                           {{--id="stat"--}}
                           {{--class="form-control"--}}
                           {{--name="stat"--}}
                           {{--v-model="stat">--}}
                    {{--<span class="help-block" v-if="submition ">This field is required.</span>--}}
                {{--</div>--}}

                <div class="form-group">
                    <label for="Date" class="col-md-2 control-label">Date and Time Logged</label>
                    <div class="col-md-10">

                        <div class="input-icon datetime-pick date-only">
                            <input data-format="yyyy-MM-dd" type="text" id='commencement_date' name ='commencement_date' class="form-control input-sm"  style="color:#FFFFFF"/>
                            <span class="add-on">
                            <i class="sa-plus"></i>
                            </span>
                        </div>
                        <div id = "hse_error_due_date"></div>

                    </div>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition}">
                    <label for="rejection" class="form-control-label">Rejection reason</label>
                    <select name="select" id="navg" class="form-control" >
                        <option>Duplication</option>
                        <option>Home</option>
                        <option>All cases</option>
                        <option>my cases</option>
                        <option>cases awaiting review</option>
                        <option>other</option>
                    </select>
                    <span class="help-block">@{{reject}}</span>
                </div>



               <div class="form-group" v-bind:class="{'has-error':submition}">
                {{--{!! Form::label('Description', 'Description', array('class' => 'col-md-3 control-label')) !!}--}}
                   <label for="comt" class="form-control-label">Comments</label>
                <div class="col-md-6">
                    <textarea rows="5" id="textarea" name="caseComment" class="form-control" maxlength="500" title="short"></textarea>
                </div>
        </div>
                <div class="form-group">
                <button class="btn btn-primary">comments</button>
                </div>

            </form>
        </div>
        </div>
    </div>
</div>
</div>

{{--<script src="https://unpkg.com/vue@2.4.2"></script>--}}
{{--<script src="main.js"></script> <!-- We will code this later -->--}}
{{--</body>--}}
{{--</html>--}}
@endsection