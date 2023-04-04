@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/plan-presentation-images')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                       
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/plan-presentation-images/create/') }}" ><button class="btn bg-orange margin" type="button">Add Image</button></a></h3>
                        </div>

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Plan Name</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($imageData as $list)
                                        <tr>
                                            <td>{{ isset($list->planPresentationId) ? $list->planPresentationId->plannm : 'Multiple Plan'}}</td>
                                            <td>{{ $list->Title }}</td>
                                            <td><img src="{{ url($list->Image) }}" name="img" id="img" width="400" style="padding-bottom:5px" ></td>
                                            <td>
                                                <div class="btn-group-horizontal">
                                                    {{ Form::open(array('url' => 'admin/plan-presentation-images/'.$list->PlanPreID.'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                    <button class="index-edit-button" type="submit" ><i class="fa fa-edit"></i></button>
                                                    {{ Form::close() }}
                                                    <button class="index-delete-button" data-delete-id="{{$list->PlanPreID}}" type="button" data-toggle="modal" data-target="#myModal_DELETE" style="margin: 2px 0px"><i class="fa fa-trash"></i></button>
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
                        <h4 class="modal-title">Delete Image</h4>
                    </div>
                    <form action="{{route('plan-presentation-images.destroy','test')}}" method="post">
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