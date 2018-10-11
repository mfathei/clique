<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Repositories\Repository;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $repo;
    /**
     * Constructor
     */
    public function __construct(Attendance $attendance)
    {
        $this->middleware('auth');
        $this->repo = new Repository($attendance);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $month = date('m');// current month
        $monthName = date('F');
        $lastDay = date('t');
        $currentYear = date('Y');
        $headers = [$monthName];
        $firstRow = ['EMPLOYEE NAME'];
        $rows = [];
        $emptyRow = [''];
        if (isset($request->month)) {
            $month = $request->month;
        }

        for ($i = 1; $i <= $lastDay; $i++) {
            $headers[] = date('D', mktime(0, 0, 0, $month, $i, $currentYear));
            $firstRow[] = $i;
            $emptyRow[] = '';
        }

        // dd($headers);
        $this->repo->setModel(new Employee);
        $data = $this->repo->with(
            ['attendances' => function ($q) use ($month) {
                $q->whereMonth('date', '=', $month)->with('attendanceType');
            }]
        )->with(
            ['vacations' => function ($q) use ($month) {
                $q->whereMonth('start_date', '=', $month)
                    ->orWhereMonth('end_date', '=', $month);
            }]
        )->all();

        // dd($data);
        foreach ($data as $k => $value) {
            $row = $emptyRow;
            $row[0] = $value->full_name;
            foreach ($value->attendances as $att) {
                $d = date('j', strtotime($att->date));
                $row[$d] = $att->AttendanceType->name;
            }

            foreach ($value->vacations as $vacation) {
                $start = strtotime($vacation->start_date);
                $end = strtotime($vacation->end_date);
                while ($start <= $end) {
                    if (date('m', $start) == $month) {
                        $d = date('j', $start);
                        $row[$d] = 'Vacation';
                    }
                    $start += 86400;// add 24 hours to get the next day
                }
            }
            $rows[] = $row;
        }

        // dd($rows);
        return view('admin.attendance.calendar', ['headers' => $headers, 'firstRow' => $firstRow, 'rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Attendance   $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
