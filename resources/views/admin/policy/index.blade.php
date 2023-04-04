@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/policy')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @can('policy_create')
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/policy/create/') }}" ><button class="btn bg-orange margin" type="button">Add Policy</button></a></h3>
                        </div>
                        @endcan

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Policy No.</th>
                                    <th>Name - 1</th>
                                    <th>Proposal No.</th>
                                    <th>Proposal Date</th>
                                    <th>Risk Date</th>
                                    <th>Plan</th>
                                    <th>Basic</th>
                                    <th>Mode</th>
                                    <th>FUP</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($policy as $list)
                                    <tr>
                                        <td>{{ $list['PONO'] }} </td>
                                        <?php
                                            $party = '';
                                            if(!empty($list['NAME1']) && $list['NAME1'] > 0) {
                                                $partydata = \DB::connection('lifecell_lic')->select("SELECT NAME FROM party where GCODE = {$list['NAME1']} limit 1");
                                                $party = !empty($partydata[0]) ? $partydata[0]->NAME : '';
                                            }
                                        ?>
                                        <td>{{ $party }} </td>
                                        <td>{{ $list['PROPNO'] }}</td>
                                        <td>{{ $list['PROPDT'] }}</td>
                                        <td>{{ $list['RDT'] }}</td>
                                        <td>{{ $list['PLAN'] }}</td>
                                        <td>{{ $list['SA'] }}</td>
                                        <td>{{ $list['MODE'] }}</td>
                                        <td>{{ $list['FUP'] }}</td>
                                        <td>
                                            <div class="btn-group-horizontal">
                                                @can('policy_edit')
                                                {{ Form::open(array('url' => 'admin/policy/'.$list['PUNIQID'].'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                <button class="index-edit-button" type="submit" ><i class="fa fa-edit"></i></button>
                                                {{ Form::close() }}
                                                @endcan
                                                @can('policy_delete')
                                                <button class="index-delete-button" data-delete-id="{{$list['PUNIQID']}}" type="button" data-toggle="modal" data-target="#myModal_DELETE" style="margin: 2px 0px"><i class="fa fa-trash"></i></button>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                             @endforeach
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
                        <h4 class="modal-title">Delete Policy</h4>
                    </div>
                    <form action="{{route('policy.destroy','test')}}" method="post">
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