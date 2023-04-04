<div class="tab-pane" id="3">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table" border="1" style="margin-bottom: 0px !important;">
                    <thead>
                        <tr>
                            <th>Relation</th>
                            <th>Current Age</th>
                            <th>Health</th>
                            <th>Death Age</th>
                            <th>Death Year</th>
                            <th>Death Cause</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {!! Form::text('frelation0', "FATHER", ['class' => 'form-control','readonly']) !!}
                            </td>

                            <td>
                                {!! Form::number('FCAGE', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('FHEALTH', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::number('FDAGE', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('FDYEAR', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('FDCAUSE', null, ['class' => 'form-control']) !!}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {!! Form::text('frelation0', "MOTHER", ['class' => 'form-control','readonly']) !!}
                            </td>

                            <td>
                                {!! Form::number('MCAGE', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('MHEALTH', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::number('MDAGE', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('MDYEAR', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('MDCAUSE', null, ['class' => 'form-control']) !!}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {!! Form::text('frelation0', "BROTHERS", ['class' => 'form-control','readonly']) !!}
                            </td>

                            <td>
                                {!! Form::text('BCAGE', null, ['class' => 'form-control','placeholder' => 'Add (,) seprate multiple brother age']) !!}
                            </td>

                            <td>
                                {!! Form::text('BHEALTH', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('BDAGE', null, ['class' => 'form-control','placeholder' => 'Add (,) seprate multiple brother age']) !!}
                            </td>

                            <td>
                                {!! Form::text('BDYEAR', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('BDCAUSE', null, ['class' => 'form-control']) !!}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {!! Form::text('frelation0', "SISTERS", ['class' => 'form-control','readonly']) !!}
                            </td>

                            <td>
                                {!! Form::text('SISCAGE', null, ['class' => 'form-control','placeholder' => 'Add (,) seprate multiple sister age']) !!}
                            </td>

                            <td>
                                {!! Form::text('SISHEALTH', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('SISDAGE', null, ['class' => 'form-control','placeholder' => 'Add (,) seprate multiple sister age']) !!}
                            </td>

                            <td>
                                {!! Form::text('SISDYEAR', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('SISDCAUSE', null, ['class' => 'form-control']) !!}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {!! Form::text('frelation0', "SPOUSE", ['class' => 'form-control','readonly']) !!}
                            </td>

                            <td>
                                {!! Form::number('SPCAGE', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('SPHEALTH', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::number('SPDAGE', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('SPDYEAR', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('SPDCAUSE', null, ['class' => 'form-control']) !!}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {!! Form::text('frelation0', "CHILD (M)", ['class' => 'form-control','readonly']) !!}
                            </td>

                            <td>
                                {!! Form::text('CMCAGE', null, ['class' => 'form-control','placeholder' => 'Add (,) seprate multiple child age']) !!}
                            </td>

                            <td>
                                {!! Form::text('CMHEALTH', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('CMDAGE', null, ['class' => 'form-control','placeholder' => 'Add (,) seprate multiple child age']) !!}
                            </td>

                            <td>
                                {!! Form::text('CMDYEAR', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('CMDCAUSE', null, ['class' => 'form-control']) !!}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {!! Form::text('frelation0', "CHILD (F)", ['class' => 'form-control','readonly']) !!}
                            </td>

                            <td>
                                {!! Form::text('CFCAGE', null, ['class' => 'form-control','placeholder' => 'Add (,) seprate multiple child age']) !!}
                            </td>

                            <td>
                                {!! Form::text('CFHEALTH', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('CFDAGE', null, ['class' => 'form-control','placeholder' => 'Add (,) seprate multiple child age']) !!}
                            </td>

                            <td>
                                {!! Form::text('CFDYEAR', null, ['class' => 'form-control']) !!}
                            </td>

                            <td>
                                {!! Form::text('CFDCAUSE', null, ['class' => 'form-control']) !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>