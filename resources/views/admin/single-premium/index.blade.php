@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/single-premium-posting')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @can('area_create')
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/single-premium-posting/create/') }}" ><button class="btn bg-orange margin" type="button">Add Single Premium Posting</button></a></h3>
                        </div>
                        @endcan

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Policy No</th>
                                        <th>Name</th>
                                        <th>Premium</th>
                                        <th>Mode</th>
                                        <th>Paid Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lists as $list)
                                        <tr>
                                        <td>{{$list->PONO}}</td>
                                        <td>{{$list->NAME}}</td>
                                        <td>{{$list->prem}}</td>
                                        <td>{{$list->mode}}</td>
                                        <td>{{$list->paiddt}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection