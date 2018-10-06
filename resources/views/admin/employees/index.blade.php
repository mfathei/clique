@extends('admin.master')

@section('contents')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                             Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE HEAD -->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Dashboard <small>dashboard & statistics</small></h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD -->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('employees.index') }}">Employees</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('employees.index') }}">Dashboard</a>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered-table-striped" id="employees-table" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
@section('scripts')
    <script>
        MYJS.activateSideMenu('employees', 'employees-dashboard');
        MYJS.setToken('{!! csrf_token() !!}');
        $(document).ready(function(){
            var empDatatable = $('#employees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('employees.ajax') !!}',
                    data: {
                        _token: MYJS.getToken(),
                    },
                    type: 'POST',
                    error: function(){
                        $(".employee-grid-error").html("");
                        $("#employees-table").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#employees-table_processing").css("display","none");
                    }
                },
                columnDefs: [
                    {
                        targets: -1,
                        sortable: false,
                        render: function(data, type, row){
                            return `
                                <a href="/employees/${row[0]}" title="View employee"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <form class="hidden" id="form${row[0]}" method="post" action="/employees/${row[0]}/edit">
                                    <input type="hidden" name="_token" value="${MYJS.getToken()}">
                                </form>
                                &nbsp;<a href="javascript: document.querySelector('#form${row[0]}').submit();" title="Edit employee"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <form class="hidden" id="formdelete${row[0]}" method="post" action="/employees/${row[0]}/delete">
                                    <input type="hidden" name="_token" value="${MYJS.getToken()}">
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                                &nbsp;<a href="javascript: if(confirm('Are you sure delete employee ${row[0]} ?')){document.querySelector('#formdelete${row[0]}').submit();};" title="Delete employee"><i style="color: red" class="fa fa-times" aria-hidden="true"></i></a>
                                `;
                        }
                    }
                ]
            });
        });
    </script>
@endsection