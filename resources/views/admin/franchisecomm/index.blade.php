@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/franchisee-commision-master')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @can('franchisee_commision_create')
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/franchisee-commision-master/create/') }}" ><button class="btn bg-orange margin" type="button">Add Franchisee Commision Rate</button></a></h3>
                        </div>
                        @endcan

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Franchisee Name</th>
                                        <th>Dealer Name</th>
                                        <th>Product Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($franchisecomm as $list)
                                        <tr>
                                            <?php
                                                $franchise = '';
                                                if(!empty($list['franchid']) && $list['franchid'] > 0) {
                                                    $franchisedata = \DB::connection('lifecell_lic')->select("SELECT franchnm FROM franchise where franchid = {$list['franchid']} limit 1");
                                                    $franchise = !empty($franchisedata[0]) ? $franchisedata[0]->franchnm : '';
                                                }
                                            ?>
                                            <td>{{ $franchise }}</td>
                                            <?php
                                                $dealer = '';
                                                if(!empty($list['dealerid']) && $list['dealerid'] > 0) {
                                                    $dealerdata = \DB::connection('lifecell_lic')->select("SELECT dealer FROM dealer where dealerid = {$list['dealerid']} limit 1");
                                                    $dealer = !empty($dealerdata[0]) ? $dealerdata[0]->dealer : '';
                                                }
                                            ?>
                                            <td>{{ $dealer }}</td>
                                            <?php
                                                $product = '';
                                                if(!empty($list['productid']) && $list['productid'] > 0) {
                                                    $productdata = \DB::connection('lifecell_lic')->select("SELECT productname FROM product where productid = {$list['productid']} limit 1");
                                                    $product = !empty($productdata[0]) ? $productdata[0]->productname : '';
                                                }
                                            ?>
                                            <td>{{ $product }}</td>
                                            <td>
                                                <div class="btn-group-horizontal">
                                                    @can('franchisee_commision_edit')
                                                    {{ Form::open(array('url' => 'admin/franchisee-commision-master/'.$list['franchcommid'].'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                    <button class="index-edit-button" type="submit" ><i class="fa fa-edit"></i></button>
                                                    {{ Form::close() }}
                                                    @endcan
                                                    @can('franchisee_commision_delete')
                                                    <button class="index-delete-button" type="button" data-toggle="modal" data-target="#myModal{{$list['franchcommid']}}" style="margin: 2px 0px"><i class="fa fa-trash"></i></button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>

                                        <div id="myModal{{$list['franchcommid']}}" class="fade modal modal-danger" role="dialog" >
                                            {{ Form::open(array('url' => 'admin/franchisee-commision-master/'.$list['franchcommid'], 'method' => 'delete','style'=>'display:inline')) }}
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Delete Franchisee Commision Rate</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this Franchisee Commision Rate ?</p>
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