@extends('admin.master')

@section('contents')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
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
            <div class="pull-right" style="margin-bottom: 5px;">
                <a class="btn btn-primary" href="{{ route('employees.create') }}" title="Create New Employee">Add Employee</a>
            </div>
            <!-- END PAGE HEADER-->
            @include('admin.error')
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered-table-striped" id="employees-table" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
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
        function deleteEmployee(id){
            var empsUrl = '{!! route("employees.index") !!}';
            var url = empsUrl + '/' + id + '/delete';
            axios.delete(url, {
                method: 'delete',
            })
            .then(function(res){
                console.log(res);
                MYJS.empDatatable.ajax.reload();// refresh datatable
                swal('Deleted', 'Employee Deleted Successfully!', 'success');

            })
            .catch(function(err){
                swal('Oops!', 'Something went wrong!', 'error');
            });
        }

        function confirmDelete(id){
            swal({
                title: 'Delete employee ' + id,
                text: 'Are you sure delete employee ' + id + ' ?',
                icon: 'warning',
                dangerMode: true
            })
            .then(willDelete => {
                if(willDelete){
                    deleteEmployee(id);
                }
            })
        }
        $(document).ready(function(){
            MYJS.empDatatable = $('#employees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route("employees.ajax") !!}',
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
                                &nbsp;<a href="javascript: confirmDelete('${row[0]}');" title="Delete employee"><i style="color: red" class="fa fa-times" aria-hidden="true"></i></a>
                                `;
                        }
                    }
                ]
            });
        });
    </script>
@endsection