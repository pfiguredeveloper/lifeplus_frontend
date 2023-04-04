@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/product-master')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @can('product_create')
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/product-master/create/') }}" ><button class="btn bg-orange margin" type="button">Add Product</button></a></h3>
                        </div>
                        @endcan

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Path</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $list)
                                        <tr>
                                            <td>{{ $list['productname'] }}</td>
                                            <td>{{ $list['productpath'] }}</td>
                                            <td>
                                                <div class="btn-group-horizontal">
                                                    @can('product_edit')
                                                    {{ Form::open(array('url' => 'admin/product-master/'.$list['productid'].'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                    <button class="index-edit-button" type="submit" ><i class="fa fa-edit"></i></button>
                                                    {{ Form::close() }}
                                                    @endcan
                                                    @can('product_delete')
                                                    <button class="index-delete-button" type="button" data-toggle="modal" data-target="#myModal{{$list['productid']}}" style="margin: 2px 0px"><i class="fa fa-trash"></i></button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>

                                        <div id="myModal{{$list['productid']}}" class="fade modal modal-danger" role="dialog" >
                                            {{ Form::open(array('url' => 'admin/product-master/'.$list['productid'], 'method' => 'delete','style'=>'display:inline')) }}
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Delete Product</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this Product ?</p>
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