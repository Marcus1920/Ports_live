@extends('master')
@section('content')
    <div class="block-area" id="basic">
        <ol class="breadcrumb hidden-xs">
            <li class="active">Drone Request Form</li>
        </ol>
        <h4 class="page-title">REQUEST FORM</h4>

        <br>
        <div class="tile p-15" style="margin:0 auto;" >
            <form class="form-horizontal" id="droneForm"  action="/api/v1/drone" v-on:submit="validateForm"  method="post">

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongDepartment }">
                    <div class="col-md-6">
                        <label for="department" class="col-sm-6 control-label">Search Department</label>
                        <div class="col-sm-6">

                            <input type="text" name="department" class="form-control" id="department" v-model="department">
                            {{--<div class="input-group" :class="[form-control]">--}}
                            <p class="help-block" v-cloak  v-if="submition && wrongDepartment">@{{departmentFB}}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongDroneType }">
                    <div class="col-md-6">
                        <label for="drone_type_id" class="col-sm-6 control-label">Drone Type Required</label>
                        <div class="col-sm-6">
                            <select @change="updateDroneType($event.target.value)"  name="drone_type_id" v-cloak class="form-control" id="droneTypeData"  v-model="drone_type_id">
                                @foreach($droneTypes as $droneType)
                                    <option  :value="{{$droneType->id}}">{{$droneType->name}}</option>
                                @endforeach
                            </select>
                            <p class="help-block"  v-cloak v-if="submition && wrongDroneType">@{{droneTypeFB}}</p>

                        </div>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongServiceType }">
                    <div class="col-md-6">
                        <label for="sub_drone_type_id" class="col-sm-6 control-label">Service Required</label>
                        <div class="col-sm-6">
                            {{--<input type="text" name="serviceType" class="form-control" id="serviceType"  v-model="serviceType">--}}
                            <select  v-cloak  v-if="droneTypeData" name="sub_drone_type_id" class="form-control" id="serviceTypeData"  v-model="sub_drone_type_id">
                              <!--   <option value="0" selected = "disabled">Select Service</option> -->
                                <option   v-for="service in serviceTypeData" :value="service.id">@{{service.name}}</option>
                            </select>
                            <p class="help-block"  v-cloak v-if="submition && wrongServiceType">@{{serviceTypeFB}}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group" v-bind:class="{ 'has-error': submition && wrongComment}">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Comments</label>
                        <div class="col-sm-6">
                            <textarea type="text"  name="comment" class="form-control" v-model="comment"></textarea>
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
