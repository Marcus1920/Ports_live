@extends('master')
@section('content')
    <div class="block-area" id="basic">
        <ol class="breadcrumb hidden-xs">
            <li class="active">Drone Request Form</li>
        </ol>
        <h4 class="page-title">REQUEST FORM</h4>

        <br>
        <div class="tile p-15" style="margin:0 auto;">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Service Request</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Created by</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Case Number</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Case Status</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Search</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Drone Required</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="inputEmail3" class="col-sm-6 control-label">Service Type</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3">
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