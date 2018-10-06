<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Models\Employee;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use DB;

class EmployeeController extends ApiController
{
    protected $repo;
    /**
     * Constructor
     */
    public function __construct(Employee $emp)
    {
        $this->middleware('auth');
        $this->repo = new Repository($emp);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $emps = $this->repo->all(['first_name', 'last_name']);
        // dd($emps);
        return view('admin.employees.index');
    }

    /**
     * @return Employees in ajax format for DataTable plugin.
     */
    public function ajax(Request $request)
    {
        $columns = ['id', 'first_name', 'last_name'];
        $limit = $request->length;
        $offset = $request->start;
        $search = $request->search['value'];
        $draw = intval($request->draw);

        $where = [];
        if ($search !== null) {
            $emps = $this->repo->allWithOrderAndWhere($search, $columns, [$columns[$request->order[0]['column']], $request->order[0]['dir']]);
        } else {
            $emps = $this->repo->allWithOrder($columns, [$columns[$request->order[0]['column']], $request->order[0]['dir']]);
        }
        // dd(DB::getQueryLog());

        // Get total records before apply limit
        $count = $emps->count();
        // Apply limit and offset
        $emps = $emps->splice($offset, $limit);

        $data = [];
        foreach ($emps as $key => $item) {
            $data[] = array_values($item->toArray());
        }
        $recordsTotal = $count;
        $recordsFiltered = $recordsTotal;
        $json_data = [
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ];

        if ($recordsFiltered) {
            return $this->respond($json_data);
        }
        return $this->setStatusCode(404)->respondWithErrors(['No Data Found']);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
