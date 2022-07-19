<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\RequestEmployee;
use App\Models\Employee;
use App\Models\User;
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
        $employees = Employee::all();
        return view('store.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $stores = Store::all();
        return view('store.employee.create', compact('users', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestEmployee $request)
    {
        $employee = Employee::create([
            'active' => $request->active,
            'fk_id_user' => $request->fk_id_user,
            'fk_id_store' => $request->fk_id_store,
        ]);
        return redirect()->route('employee_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $users = User::all();
        $stores = Store::all();
        return view('store.employee.edit', compact('employee', 'users', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEmployee $request, $id)
    {
        $employee = Employee::find($id);
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
