<?php

namespace App\Http\Controllers\Store;

use App\Http\Requests\EmployeeRequest as RequestsEmployeeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Request\EmployeeRequest;
use App\Models\Employee;
use App\Models\Store;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw = Employee::all();
        return view('store.employee.index', compact('raw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = Store::all();
        return view('store.employee.create', compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsEmployeeRequest $request)
    {
        $raw = Employee::create([
            'active' => $request->active,
            'fk_id_user' => $request->fk_id_user,
            'fk_id_store' => $request->fk_id_store,
        ]);

        return redirect()->route('raw_employee_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Employee::find($id);
        return view('store.employee.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($employee)
    {
        $employee = Employee::find($employee);
        $store = Store::all();
        return view('store.employee.edit', compact('employee', 'store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsEmployeeRequest $request, $employee)
    {
        $employee = Employee::find();
        $employee->update($request->all());

        return redirect()->route('employee_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Employee::find($id);
        $id->delete();
        return redirect()->route('employee_index');
    }
}
