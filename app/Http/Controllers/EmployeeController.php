<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use Validator;
use DB;
use App\Models\Employee;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        // Note: we need department_id to load $item->department relation
        $columns = ['id', 'first_name', 'last_name', 'department_id'];
        $limit = $request->length;
        $offset = $request->start;
        $search = $request->search['value'];
        $draw = intval($request->draw);
        $where = [];
        if ($search !== null) {
            $emps = $this->repo->with(['department'])->allWithOrderAndWhere($search, $columns, [$columns[$request->order[0]['column']], $request->order[0]['dir']]);
        } else {
            $emps = $this->repo->with(['department'])->allWithOrder($columns, $orderBy = [$columns[$request->order[0]['column']], $request->order[0]['dir']]);
        }
        // dd(DB::getQueryLog());
        // dd($emps);

        // Get total records before apply limit
        $count = $emps->count();
        // Apply limit and offset
        $emps = $emps->splice($offset, $limit);

        $data = [];
        foreach ($emps as $key => $item) {
            $arr = $item->toArray();
            $data[] = [$arr["id"], $arr["first_name"], $arr["last_name"], @$item->department->name, $arr["id"]];
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
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            "first_name" => "required|min:3",
            "last_name" => "required|min:3",
            "phone_number" => "required",
            "email" => "required|email|unique:employees",
            "hire_date" => "required|date",
            "salary" => "required|numeric",
            "job_id" => "required|numeric",
            "department_id" => "required|numeric",
            "password" => "required|min:6",
            "password_confirm" => "required|min:6|same:password",
        ];
        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator->errors())->withInput();
            }
            $request->salary = 'mahdy';
            $request->password = Hash::make($request->password);
            $emp = Employee::create($request->except(['_token']));
            if ($emp !== null) {
                return redirect('/employees')->with(['success' => 'Employee Created Successfully!']);
            }
        } catch (\Exception $e) {
            return back()->with(['error' => 'Exception occurred, see logs'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        dd($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', ['employee' => $employee]);
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
        $employee_id = $employee->id;
        $rules = [
            "first_name" => "required|min:3",
            "last_name" => "required|min:3",
            "phone_number" => "required",
            "email" => "required|email|unique:employees,email,$employee_id",
            "hire_date" => "required|date",
            "salary" => "required|numeric",
            "job_id" => "required|numeric",
            "department_id" => "required|numeric",
        ];
        try {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator->errors())->withInput();
            }
            $request->salary = 'mahdy';
            $request->password = Hash::make($request->password);
            $emp = $employee->update($request->except(['_token']));
            if ($emp !== null) {
                return redirect('/employees')->with(['success' => 'Employee Updated Successfully!']);
            }
        } catch (\Exception $e) {
            return back()->with(['error' => 'Exception occurred, see logs'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->roles()->detach();// delete roles
        if (Employee::destroy($employee->id)) {
            return $this->respond(['status' => 'success']);
        }
        return $this->setStatusCode(500)->respondWithErrors(['Error Occurred!']);
    }
}
