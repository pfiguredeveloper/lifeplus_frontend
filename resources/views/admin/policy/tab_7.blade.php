<div class="tab-pane" id="7">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add & Contact Details</h4>
                    </div>

                    <div class="panel-body">
                        <?php
                        $cId        = Auth::user()->c_id;
                        $clientData = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$cId} limit 1");
                        $cEmail  = (!empty($clientData[0]) && $clientData[0]->c_email) ? $clientData[0]->c_email : '';
                        $cMobile = (!empty($clientData[0]) && $clientData[0]->c_mobile) ? $clientData[0]->c_mobile : '';
                        $cCityId = (!empty($clientData[0]) && $clientData[0]->c_city_id) ? $clientData[0]->c_city_id : '';
                        $cPin    = (!empty($clientData[0]) && $clientData[0]->c_pin) ? $clientData[0]->c_pin : '';
                        $cAdd1   = (!empty($clientData[0]) && $clientData[0]->c_agt_ad1) ? $clientData[0]->c_agt_ad1 : '';
                        $cAdd2   = (!empty($clientData[0]) && $clientData[0]->c_agt_ad2) ? $clientData[0]->c_agt_ad2 : '';
                        $cAdd3   = (!empty($clientData[0]) && $clientData[0]->c_agt_ad3) ? $clientData[0]->c_agt_ad3 : '';
                        ?>
                        <!-- Email Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Email</label>
                                    {!! Form::text('email', $cEmail, ['class' => 'form-control','readonly']) !!}
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <label>Mobile</label>
                                    {!! Form::text('mobile', $cMobile, ['class' => 'form-control','readonly']) !!}
                                    @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- City Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('c_city_id') ? ' has-error' : '' }}">
                                    <label>City</label>
                                    {!! Form::select('c_city_id', [''=>'']+$city, $cCityId, ['class' => 'form-control', 'style' => 'width: 100%','readonly']) !!}
                                    @if ($errors->has('c_city_id'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('c_city_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Pin Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
                                    <label>Pin</label>
                                    {!! Form::text('pin', $cPin, ['class' => 'form-control','readonly']) !!}
                                    @if ($errors->has('pin'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('pin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Maddress Field -->
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('maddress') ? ' has-error' : '' }}">
                                    <label>Mailing Address</label>
                                    {!! Form::textarea('maddress', $cAdd1.' '.$cAdd2.' '.$cAdd3, ['class' => 'form-control','rows'=>5,'cols'=>50,'readonly']) !!}
                                    @if ($errors->has('maddress'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('maddress') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Pin Field -->
                        <!-- <div class="col-sm-3">
                            <button class="btn bg-orange" type="button" style="margin-top: 25px;">Edit</button>
                        </div> -->

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>