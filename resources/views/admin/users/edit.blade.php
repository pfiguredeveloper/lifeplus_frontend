@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            @include ('admin.error')
        </section>

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-info">
                        
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit User <small>Edit</small></h3>
                        </div>

                        <div class="pad margin no-print">
                            <div style="margin-bottom: 0!important;" class="callout callout-info">
                                <h4><i class="fa fa-info"></i> Note:</h4>
                                Leave <strong>Password</strong> and <strong>Confirm Password</strong> empty if you are not going to change the password.
                            </div>
                        </div>

                        {!! Form::model($user, ['url' => url('admin/users/' . $user->id), 'method' => 'patch', 'class' => 'form-horizontal','files'=>true]) !!}

                            <div class="box-body">
                                @include ('admin.users.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('/admin') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button class="btn btn-info" type="submit">Edit</button>
                                </div>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection