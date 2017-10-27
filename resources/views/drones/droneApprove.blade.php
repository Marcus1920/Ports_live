@extends('master')
@section('content')
    <div class="container" id="droneForm"> <form class="form-horizontal">
        <div class="row">

            <div  class="col-md-4" >
                <h3 class="h3"> Case  Number : </h3>

                <h3 class="h3"> Created By   :    </h3>
            </div>


            <div class="col-md-8">
                <h3>  Service  Request : Aquatic Drone   </h3>
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
                        <p class="help-block" v-cloack v-if="submition && wrongApprove">@{{approveFB }}</p>

                    </div>
                </div>

                <div class="col-md-6" style="margin-top:10px;">
                    <div class="col-sm-offset-6 col-sm-6">
                    <button
                            class="btn  btn-danger">Reject</button>
                        <p class="help-block" v-cloack v-if="submition && wrongReject">@{{rejectFB}}</p>
                    </div>
                </div>
            </div>

            {{--<div class="form-group">--}}

            {{--<div class="col-md-6">--}}
            {{--<div  class="col-md-2 from-group" >--}}
                {{--<label for="inputEmail3" class="col-sm-6 control-label">Rejection Reason</label>--}}
               {{--<div class="col-sm-6">--}}
                {{--<select v-model="rejectReason"  v-cloak v-if="form-control" id="rejectReason" name="rejectReason">--}}
                    {{--@foreach($droneRequests as $droneRequest)--}}
                        {{--<option value="{{$droneRequests->id}}">{{$RejectReason->name}}</option>--}}
                        {{--@endforeach--}}
                {{--</select>--}}
                   {{--<p class="help-block" >@{{rejectReasonFB}}</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group" v-bind:class="{ 'has-error': submition && wrongServiceType }">--}}
                <div class="col-md-6">
                    <label for="inputEmail3" class="col-sm-6 control-label">Service Required</label>
                    <div class="col-sm-6">
                        {{--<input type="text" name="serviceType" class="form-control" id="serviceType"  v-model="serviceType">--}}
                        <select v-model="secondOption"  v-cloak  v-if="droneType" name="serviceType" class="form-control" id="secondOption">
                            <!--   <option value="0" selected = "disabled">Select Service</option> -->
                            <option   v-for="service in secondOption" :value="service.id">@{{service.name}}</option>
                        </select>
                        <p class="help-block"  v-cloak v-if="submition && wrongServiceType">@{{serviceTypeFB}}</p>
                    </div>
                </div>
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
    <script src="js/scripts.js"></script>
    </body>
@stop
@section('footer')
@stop
{{--<script src="/js/main.js">--}}
    {{--export default{--}}
        {{--data()--}}
        {{--{--}}
            {{--return{--}}
                {{--approveFB:'',--}}
                {{--rejectFB:'',--}}
                {{--comment:'',--}}
                {{--rejectionReason:['Duplicated Request'],--}}
                {{--approve:'true'--}}
            {{--},--}}
                {{--methods:--}}
              {{--{--}}
                  {{--FirstApprove()--}}
                  {{--{--}}

                  {{--}--}}
               {{--},--}}

        {{--}--}}




        {{--}--}}
    {{--};--}}
{{--</script>--}}
