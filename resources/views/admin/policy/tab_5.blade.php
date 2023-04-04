<div class="tab-pane" id="5">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Other/Info Details</h4>
                    </div>

                    <div class="panel-body">
                        <!-- Oreportno Field -->
                        <div class="col-sm-4 col-lg-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('SPL_REPORT') ? ' has-error' : '' }}">
                                    <label>Special Report No</label>
                                    {!! Form::textarea('SPL_REPORT', null, ['class' => 'form-control','rows'=>5]) !!}
                                    @if ($errors->has('SPL_REPORT'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('SPL_REPORT') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Oremartk Field -->
                        <div class="col-sm-4 col-lg-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('REMARKS') ? ' has-error' : '' }}">
                                    <label>Remark</label>
                                    {!! Form::textarea('REMARKS', null, ['class' => 'form-control','rows'=>5]) !!}
                                    @if ($errors->has('REMARKS'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('REMARKS') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Onote Field -->
                        <div class="col-sm-4 col-lg-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('NOTE') ? ' has-error' : '' }}">
                                    <label>Note</label>
                                    {!! Form::textarea('NOTE', null, ['class' => 'form-control','rows'=>5]) !!}
                                    @if ($errors->has('NOTE'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('NOTE') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Orefperson Field -->
                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('REFCODE') ? ' has-error' : '' }}">
                                    <label>Ref. Person</label>
                                    <div class="input-group-data">
                                        {!! Form::select('REFCODE', [''=>'']+$partyname, !empty($policy['REFCODE']) ? $policy['REFCODE'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"name3_sel"]) !!}
                                        <span class="input-group-addon party-model-form" data-party-type="name3" data-table="party" data-toggle="modal" data-target="#examplePartyModalLong"><i class="fa fa-plus"></i></span>
                                    </div>
                                    @if ($errors->has('REFCODE'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('REFCODE') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Osignature Field -->
                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('SIGN') ? ' has-error' : '' }}">
                                    <label>Signature</label>
                                    {!! Form::file('SIGN', ['class' => '', 'id'=> 'SIGN', 'onChange'=>'AjaxUploadImage(this)']) !!}

                                    <?php
                                    if (!empty($policy['SIGN']) && $policy['SIGN'] != "") {
                                    ?>
                                    <input type="hidden" name="SIGN" value="{{$policy['SIGN']}}">
                                    <br><img id="DisplayImage" src="{{ url($policy['SIGN']) }}" name="SIGN" id="img" width="150" style="padding-bottom:5px" >
                                    <?php
                                    }else{
                                        echo '<br><img id="DisplayImage" src="" width="150" style="display: none;"/>';
                                    } ?>

                                    @if ($errors->has('SIGN'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('SIGN') }}</strong>
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