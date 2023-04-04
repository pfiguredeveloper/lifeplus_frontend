@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/gst-setup')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @can('gst_setup_create')
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/gst-setup/create/') }}" ><button class="btn bg-orange margin" type="button">Add GST Rate</button></a></h3>
                        </div>
                        @endcan

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Cal. GST In Report?</th>
                                        <th>GST (Ann.Sgl.Pr.)%</th>
                                        <th>GST (Term,Ulip,Helath)%</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gst as $list)
                                        <tr>
                                            <td>{{ $list['gst_in_report'] }}</td>
                                            <td>{{ $list['gst_ann'] }}</td>
                                            <td>{{ $list['gst_term'] }}</td>
                                            <td>
                                                <div class="btn-group-horizontal">
                                                    @can('gst_setup_edit')
                                                    {{ Form::open(array('url' => 'admin/gst-setup/'.$list['id'].'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                    <button class="index-edit-button" type="submit" ><i class="fa fa-edit"></i></button>
                                                    {{ Form::close() }}
                                                    @endcan
                                                    @can('gst_setup_delete')
                                                    <button class="index-delete-button" data-delete-id="{{$list['id']}}" type="button" data-toggle="modal" data-target="#myModal_DELETE" style="margin: 2px 0px"><i class="fa fa-trash"></i></button>
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
                        <h4 class="modal-title">Delete GST Rate</h4>
                    </div>
                    <form action="{{route('gst-setup.destroy','test')}}" method="post">
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