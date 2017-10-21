@extends('master')
@section('content')
    <div class="block-area" id="basic">
        <ol class="breadcrumb hidden-xs">
            <li class="active">Drone Request Form</li>
        </ol>
        <h4 class="page-title">REQUEST FORM</h4>

        <br>
        <div class="tile p-15" style="margin:0 auto;">
            <form class="form-horizontal" id="droneForm"  v-on:submit="validateForm">

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongDroneType }">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Drone Type Required</label>
                        <div class="col-sm-6">
                            <input type="text" name="droneType" class="form-control" id="droneType"  v-model="droneType">
                            <p class="help-block"  v-cloak v-if="submition && wrongDroneType">@{{droneTypeFB}}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongServiceType }">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Service Required</label>
                        <div class="col-sm-6">
                            <input type="text" name="serviceType" class="form-control" id="serviceType"  v-model="serviceType">
                            <p class="help-block"  v-cloak v-if="submition && wrongServiceType">@{{serviceTypeFB}}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongDepartment }">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Department</label>
                        <div class="col-sm-6">
                            <input type="text" name="department" class="form-control" id="department"  v-model="department">
                            <p class="help-block" v-cloak  v-if="submition && wrongDepartment">@{{departmentFB}}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongComment}">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Comments</label>
                        <div class="col-sm-6">
                            <textarea type="text"  name="comment " class="form-control" id="comment" v-model="comment"></textarea>
                            <p class="help-block" v-cloak   v-if="submition && wrongComment">@{{commentFB}}</p>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" class="btn btn-default">Request</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
@section('footer')
@stop