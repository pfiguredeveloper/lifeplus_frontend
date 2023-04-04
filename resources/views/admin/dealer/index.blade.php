@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/dealer-master')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @can('dealer_create')
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/dealer-master/create/') }}" ><button class="btn bg-orange margin" type="button">Add Dealer</button></a></h3>
                        </div>
                        @endcan

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Dealer Name</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dealer as $list)
                                        <tr>
                                            <td>{{ $list['dealer'] }}</td>
                                            <td>{{ $list['mobile'] }}</td>
                                            <td>
                                                <div class="btn-group-horizontal">
                                                    @can('dealer_edit')
                                                    {{ Form::open(array('url' => 'admin/dealer-master/'.$list['dealerid'].'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                    <button class="index-edit-button" type="submit" ><i class="fa fa-edit"></i></button>
                                                    {{ Form::close() }}
                                                    @endcan
                                                    @can('dealer_delete')
                                                    <button class="index-delete-button" type="button" data-toggle="modal" data-target="#myModal{{$list['dealerid']}}" style="margin: 2px 0px"><i class="fa fa-trash"></i></button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>

                                        <div id="myModal{{$list['dealerid']}}" class="fade modal modal-danger" role="dialog" >
                                            {{ Form::open(array('url' => 'admin/dealer-master/'.$list['dealerid'], 'method' => 'delete','style'=>'display:inline')) }}
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Delete Dealer</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this Dealer ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
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