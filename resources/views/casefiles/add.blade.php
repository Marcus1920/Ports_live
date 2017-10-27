{!! Form::open(['url' => 'addCaseFile', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"addCaseFileForm",'files' => 'true', 'enctype'=>"multipart/form-data" ]) !!}
    {!! Form::hidden('uid',Auth::user()->id,['id' => 'uid']) !!}
    {!! Form::hidden('caseID',NULL,['id' => 'caseID']) !!}
    <input type="hidden" name="caseID" value="{{ $case->id }}">

    <div class="form-group">
        {!! Form::label('Attach File', 'Attach File', array('class' => 'col-md-2 control-label')) !!}
        <div class="fileupload fileupload-new row" data-provides="fileupload">
            <div class="input-group col-md-6">
                <div class="uneditable-input form-control">
                    <i class="fa fa-file m-r-5 fileupload-exists"></i>
                    <span class="fileupload-preview"></span>
                </div>
                <div class="input-group-btn">
                    <span class="btn btn-file btn-alt btn-sm">
                    <span class="fileupload-new">Select file</span>
                    <span class="fileupload-exists">Change</span>
                    <input type="file" name="caseFile[]" id="caseFile" multiple/>
                </span>
                </div>

                <a href="#" class="btn btn-sm btn-gr-gray fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
        </div>
    </div>
     <div class="form-group">
        {!! Form::label('Your Note', 'Your Note', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-10">
            <textarea rows="5" id="fileNote" name="fileNote" class="sms form-control" maxlength="500"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" id='submitAddCaseFileForm' class="btn btn-sm">Attach File</button>
        </div>
    </div>

{!! Form::close() !!}