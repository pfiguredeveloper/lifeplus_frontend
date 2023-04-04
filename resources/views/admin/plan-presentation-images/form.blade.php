<div class="main-layout">

<div id="exTab2"> 

    <div class="panel-body">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Plan Presentation Image Information Details</h4>
                </div>
                
                <div class="panel-body">
                    <div class="add-new-include" id="add-new-include" style="margin-left: 15px;">
                        <div class="row include-class">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('PlanID') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Plan Name</label>
                                    <div class="col-sm-9">
                                        <div class="input-group-data">
                                        {!! Form::select('PlanID', $plan, !empty($imageData['PlanID']) ? $imageData['PlanID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"plan_id"]) !!}
                                        </div>
                                        @if ($errors->has('PlanID'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('PlanID') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('Image') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Plan Presentation Image</label>
                                    <div class="col-sm-9">
                                        {!! Form::file('Image', ['class' => '', 'id'=> 'Image', 'onChange'=>'AjaxUploadImage(this)','style'=>'margin-top: 6px;']) !!}

                                        <?php
                                        if (!empty($imageData['Image'])) {
                                        ?>
                                        <input type="hidden" name="image" value="{{$imageData['Image']}}">
                                        <br><img id="DisplayImage" src="{{ url($imageData['Image']) }}" name="img" id="img" width="400" style="padding-bottom:5px" >
                                        <?php
                                        } else {
                                            echo '<br><img id="DisplayImage" src="" width="400" height="135" style="display: none;"/>';
                                            echo '<div id="DisplayDiv" style="display:block;"></div>';
                                        } ?>

                                        @if ($errors->has('Image'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('Image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Title</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('Title', !empty($imageData['Title']) ? $imageData['Title'] : null, ['class' => 'form-control']) !!}
                                        @if ($errors->has('Title'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('Title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

	function AjaxUploadImage(obj,id) {
        var file = obj.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            $('#previewing'+URL).attr('src', 'noimage.png');
            alert("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        } else {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(obj.files[0]);
        }
    }

    function imageIsLoaded(e,url,url1) {
        if(url!=undefined) {
            var x=document.getElementById('image_name').value = url1;
            $('#DisplayImage').css("display", "block");
            $('#DisplayDiv').css("display", "none");
            $('#DisplayImage').attr('src', url);
            $('#DisplayImage').attr('width', '400');
            $('#DisplayImage').attr('height', '135');
        } else {
            $('#DisplayImage').css("display", "block");
            $('#DisplayDiv').css("display", "none");
            $('#DisplayImage').attr('src', e.target.result);
            $('#DisplayImage').attr('width', '400');
            $('#DisplayImage').attr('height', '135');
        }
    };
</script>