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
                    <h1>Create Employee <small>add new employee</small></h1>
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
                    <a href="{{ route('employees.create') }}">Create</a>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-xs-12">
                    <form action="{{ route('employees.create') }}" method="post" id="formempcreate">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-2 control-label">First name</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control" placeholder="firstname" required minlength="3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 control-label">Last name</label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" placeholder="lastname" required minlength="3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 control-label">Phone number</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" pattern="^\([0-9]{4}\)[\s-]{1}[0-9]{4}[\s-]{1}[0-9]{4}$" class="form-control" placeholder="(----) ---- ----" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" placeholder="test@example.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 control-label">Hire date</label>
                            <div class="col-sm-10">
                                <input type="text" name="hire_date" class="form-control" pattern="^[0-9]{0, 6}(\.?[0-9]{2})$" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 control-label">Salary</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="salary" class="form-control" pattern='[0-9]\{1, 6\}' placeholder="000000.00" required>
                                    <span class="input-group-addon">$</span>
                                </div>
                            </div>
                            <label for="" class="col-sm-2 control-label">Commission pct</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" name="commission_pct" class="form-control" pattern="^[0-9]{0, 2}(\.?[0-9]{2})$" placeholder="00.00">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 control-label">Job</label>
                            <div class="col-sm-10">
                                <select name="job_id" id="job_id" class="form-control">
                                    @foreach(App\Models\Job::all() as $job)
                                        <option value="{{ $job->id }}">{{ $job->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 control-label">Manager</label>
                            <div class="col-sm-10">
                                <select name="manager_id" id="manager_id" class="form-control">
                                    <option value="" selected>None</option>
                                    @foreach(App\Models\Employee::all() as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 control-label">Department</label>
                            <div class="col-sm-10">
                                <select name="department_id" id="department_id" class="form-control">
                                    @foreach(App\Models\Department::all() as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>
                            <label for="" class="col-sm-2 control-label">Password confirm</label>
                            <div class="col-sm-4">
                                <input type="password" name="password_confirm" class="form-control" required minlength="6">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success bt-block" style="width:100%">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
@section('scripts')
    <script>
        MYJS.activateSideMenu('employees', 'employees-create');
        MYJS.setToken('{!! csrf_token() !!}');
    </script>
@endsection