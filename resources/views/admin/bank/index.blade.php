@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/bank-master')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @can('bank_create')
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/bank-master/create/') }}" ><button class="btn bg-orange margin" type="button">Add Bank</button></a></h3>
                        </div>
                        @endcan

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Bank Name</th>
                                        <th>Bank Name / Code</th>
                                        <th>MICR Code</th>
                                        <th>IFC Code</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bank as $list)
                                        <tr>
                                            <td>{{ $list['BANK'] }}</td>
                                            <td>{{ $list['BANKBR'] }}</td>
                                            <td>{{ $list['BANKMICR'] }}</td>
                                            <td>{{ $list['BANKIFS'] }}</td>
                                            <td>{{ $list['EMAIL'] }}</td>
                                            <td>
                                                <div class="btn-group-horizontal">
                                                    @can('bank_edit')
                                                    {{ Form::open(array('url' => 'admin/bank-master/'.$list['BANKCD'].'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                    <button class="index-edit-button" type="submit" ><i class="fa fa-edit"></i></button>
                                                    {{ Form::close() }}
                                                    @endcan
                                                    @can('bank_delete')
                                                    <button class="index-delete-button" data-delete-id="{{$list['BANKCD']}}" type="button" data-toggle="modal" data-target="#myModal_DELETE" style="margin: 2px 0px"><i class="fa fa-trash"></i></button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="myModal_DELETE" class="fade modal modal-danger" role="dialog" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Bank</h4>
                    </div>
                    <form action="{{route('bank-master.destroy','test')}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                      <div class="modal-body">
                            <p class="text-center">
                                Are you sure you want to delete this?
                            </p>
                            <input type="hidden" name="delete_record_id" id="delete_record_id" value="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-warning">Yes, Delete</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>

    </div>
@endsection