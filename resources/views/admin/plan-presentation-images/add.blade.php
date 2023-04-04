@extends('admin.layouts.app')
<style>
    #DisplayDiv{width: 150;height: 135px;border: 1px solid black;}
</style>

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Plan Presentation Image <small>Add</small></h3>
                        </div>

                        {!! Form::open(['url' => url('admin/plan-presentation-images'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.plan-presentation-images.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('admin/plan-presentation-images') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button class="btn btn-info" type="submit">Save</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection