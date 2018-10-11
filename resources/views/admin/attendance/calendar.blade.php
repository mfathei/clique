@extends('admin.master')

@section('style')

<style media="screen">

#attendance-table td:before {
    content: attr(data-content);
}

.Work {
    background-color: #418AB3;
    color: white;
}

#attendance-table td.Work:before {
    content: 'W';
}

td {
    width: 50px;
    height: 50px;
}

#attendance-table td {
    vertical-align: middle;
    text-align: center;
}

#attendance-table th {
    background-color: #D8E8F1;
    color: #6C6E6F;
}

#attendance-table .first-row {
    background-color: #5E5E5E;
    color: white;
}

</style>

@endsection

@section('contents')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE HEAD -->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Calendar <small>calendar & statistics</small></h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD -->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('/') }}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('attendance.index') }}">Attendance</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('attendance.index') }}">Calendar</a>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- END PAGE HEADER-->
            @include('admin.error')
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped" id="attendance-table" width="100%">
                        <thead>
                            <tr>
                                @foreach($headers as $header)
                                    <th>{{ $header }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($firstRow as $row)
                                    <td class='first-row'>{{ $row }}</td>
                                @endforeach
                            </tr>
                            @foreach($rows as $row)
                                <tr>
                                    @foreach($row as $d)
                                        <td class="{{ $d }}" data-content="{{ $d }}"></td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
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
        MYJS.activateSideMenu('attendance', 'attendance-dashboard');
        MYJS.setToken('{!! csrf_token() !!}');
    </script>
@endsection
