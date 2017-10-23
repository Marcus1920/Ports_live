<div class="tab-pane" id="private">

    <div class="" style="align-content: center">

        <table border=0>
            <tr>
                <td><button type="" class="btn btn-default"  id="emailsFromPrivate">
                       Email
                    </button></td>
                <td>&nbsp</td><td>&nbsp</td>
                <td><button type="" class="btn btn-default" id="remove_button">
                        Unfavourite
                    </button>

                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                </td><td>&nbsp</td><td>&nbsp</td>
                {{--<td><input type="text" style="background-color: transparent ; border-color: transparent; width: auto"></td>--}}
                <td><input type="text" class="form-control counter pull pull-right col-sm-10 "></td>
            </tr>

        </table>
        <br/>
    </div>
    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <table class="table" border=0>
                            <thead>
                            <tr>
                                <th width="10%">Select</th>
                                <th class="col-md- col-xs-5" width="100%">Full Name </th>
                            </tr>
                            </thead>
                        </table>
                    </h3>
                </div>
                <div class="panel-body" style="height:300px;overflow:auto;">

                    <table class="table table-hover table-bordered results" id="myPrivateTable" >
                        <tbody>
                        @foreach($contactBook as $privateContact)
                            <tr class="clickable-private">
                                <td>
                                    <input type="checkbox" name="row" value="{{$privateContact->user}}" class="removeContacts" id="id"></td>


                                <td>
                                    <a class="t-overflow" onclick="profilePrivate({{$privateContact->id ? $privateContact->id : -1}});">
                                        {{  "{$privateContact->first_name} {$privateContact->surname}" }}
																		</a><br/>
                                    {{--<small class="text-muted">{{$privateContact->position}}   {{$privateContact->id}}</small></td>--}}

                                {{--<small class="text-muted">{{$privateContact->position}}</small></td>--}}

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    {{count($contactBook)}}    Users

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="block-area" id="basic" style="background-color: rgba(0, 0, 0, 0.35);">
								{!! Form::open(['url' => 'updateAddressbook', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"profileForm"]) !!}
								{!! Form::text("id", null, array('id'=>"id",'class'=>"form-control")) !!}
                    <div class="col-md-4" style="">

                        <img alt="Bootstrap Image Preview" src="{{asset('/img/siyaleader_light_bg.png')}}" class="img-thumbnail" style="align-content: center">

                        <div class="col-md-1">
                            <label for="inputEmail3" class="col-sm-2 control-label" style="align-content: center">
                                POSITION
                            </label>
                        </div>
                    </div>
                    {{--<div class="col-md-2">--}}
                    {{--</div>--}}
                    <div class="col-md-8">
                        {{--<h3 class="block-title">PERSONAL DETAILS</h3>--}}
                        <div class="form-group col-md-18">

                            <label for="inputEmail3" class="col-sm-3 control-label" >
                                NAME
                            </label>
                            <div class="col-sm-9">
                                <input name="first_name" class="form-control" id="name" readonly value="{{ isset($privateContact) && is_object($privateContact->user) ? $privateContact->user->name : ''}}">
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputEmail3" class="col-sm-3 control-label">
                                SURNAME
                            </label>
                            <div class="col-sm-9" >
                                <input name="Surname" class="form-control" id="surname"  value="{{  isset($privateContact) && is_object($privateContact->user) ? $privateContact->user->surname : '' }}"readonly>
                            </div>
                        </div>
                        {{--<div class="form-group">

                            <label for="inputEmail3" class="col-sm-3 control-label">
                                BIRTHDAY
                            </label>
                            <div class="col-sm-9">
                                <input name="dob" class="form-control" id="dob_private"  value="{{  isset($privateContact) && is_object($privateContact->user) ? $privateContact->user->dob : ''}}" readonly>
                            </div>
                        </div>--}}
                        <hr class="whiter m-t-5" style="padding: 0.1em">
                        {{--<h3 class="block-title">CONTACT DETAILS</h3>--}}
                        <div class="form-group">


                            <label for="inputPassword3" class="col-sm-3 control-label">
                                EMAIL
                            </label>
                            <div class="col-sm-9">
                                <input name="email" class="form-control" id="email_address"  value="{{ isset($privateContact) && is_object($privateContact->user)  ? $privateContact->user->email : ''}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">
                                MOBILE
                            </label>
                            <div class="col-sm-9">
                                <input name="cellphone" class="form-control" id="cellphone" value="{{ isset($privateContact) && is_object($privateContact->user) ? $privateContact->user->cellphone : '' }}" readonly >
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="user_id" readonly>
                            </div>
                        </div>

                        <hr class="whiter m-t-5" style="padding: 0.1em">

                        <div class="form-group">
                            <label for="txtNotes" class="col-sm-3 control-label">
                                NOTES
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="txtNotes" name="notes" rows="3">{{ isset($privateContact) && is_object($privateContact->user) ? $privateContact->user->notes: '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                                <button  class="btn btn-default" onclick="getUserEmail();">
                                   Email
                                </button>
                                <button type="" class="btn btn-default" onclick="deleteuser()">
                                    Unfavourite
                                </button>
																<button type="submit" class="btn btn-default" onclick="">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>