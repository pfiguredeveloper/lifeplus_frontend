<!-- Modal --><div class="modal fade" id="exampleStatusModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleStatusModalLongTitle" aria-hidden="true">    <div class="modal-dialog modal-dialog-centered" role="document">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                <span aria-hidden="true">&times;</span></button>                <h4 class="modal-title">Add Status</h4>            </div>            <div class="modal-body-status">                <div class="panel-body">                    <div class="row include-class">                        <div class="form-group">                            <label class="col-sm-4 control-label">Status</label>                            <div class="col-sm-5">                                {!! Form::text('STATUS', null, ['class' => 'form-control','id'=>"status"]) !!}                            </div>                        </div>                        <div class="form-group">                            <label class="col-sm-4 control-label">Gender</label>                            <div class="col-sm-5">                                {!! Form::select('GENDER', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"status_gender_sel"]) !!}                            </div>                        </div>                    </div>                </div>                <input type="hidden" name="statustableId" id="statustableId" value=""/>            </div>            <div class="modal-footer">                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>                <button id="model-status-form-submit" type="button" class="btn btn-primary">Save</button>            </div>        </div>    </div></div>@if(empty($policySec))<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>@endif<script type="text/javascript">    $(document).on("click", ".status-model-form", function () {         var statustableId = $(this).data('table');         $(".modal-body-status #statustableId").val( statustableId );         $.ajax({            url: "{{ url('admin/getCityModelRecord') }}",            type: "GET",            success: function(data) {                $.each(data.gender, function(key, value) {                    $('#status_gender_sel').append($("<option></option>").attr("value",key).text(value));                });            }        });    });    $("#model-status-form-submit").click(function() {        var statustableId = $(".modal-body-status #statustableId").val();        var status        = $('#status').val();        var genderID      = $('#status_gender_sel option:selected').val();                if(status == '') {            alert('Empty Not Allowed');            return false;        } else {            var data = { "_token": "{{ csrf_token() }}",type : statustableId,STATUS:status,GENDER:genderID };        }                $.ajax({            url: "{{ url('admin/addModelRecord') }}",            type: "POST",            data: data,            success: function(data) {                $('#status_sel').append($("<option></option>").attr({value:data.data.STATUSID,selected:"selected"}).text(data.data.STATUS));                $(".modal-body-status").find("input,textarea,select").val('').end();                $('#exampleStatusModalLong').modal('toggle');            }        });    });</script>