<?php

namespace App\Http\Controllers\Store;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\RequestEmployee;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = $this->storeInSesion();
        $employees = $store->employees;
        return view('store.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        $employee = Employee::find($id);
        return view('store.employee.create', ['employee' => $employee]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0)
    {
        $employee = Employee::find($id);
        return view('store.employee.show', ['employee' => $employee]);
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
    public function update(RequestEmployee $request, $id = 0)
    {

        $store = $this->storeInSesion();
        $employee = Employee::where('fk_id_user', Auth::user()->id)->first();
        if ($employee->id == $id) {
            return back()
                ->withErrors(['generic' => ['No puedes editar tu información']])
                ->withInput($request->all());
        }
        // try {
        DB::beginTransaction();
        $employee = Employee::findOrNew($id);
        $employee->active = false;
        $user = $id == 0 ? new User() : $employee->user;
        $user->fill($request->all());
        $user->fk_id_role = Role::WAITER;
        $password = $request->input('password', null);
        if (isset($password)) {
            $user->password = Hash::make($password);
        }
        if ($request->file("img_url") != null) {
            $employee->img_url = $this->storeImage($request->file("img_url"), "employee", $employee->id);
        }
        $user->saveOrFail();
        $employee->fill($request->all());
        $employee->fk_id_user = $user->id;
        $employee->fk_id_store = $store->id;
        $employee->saveOrFail();
        $address = $employee->address ?? new EmployeeAddress();
        $address->fill($request->all());
        $address->fk_id_employee = $employee->id;
        $address->saveOrFail();
        DB::commit();
        return redirect()->route('store_employee_index');
        //  } catch (Exception $e) {
        DB::rollBack();
        return back()
            ->withErrors(['generic' => ['Algo salio mal, intente más tarde']])
            ->withInput($request->all());
        // }
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
        $id->delete($id);
        return redirect()->route('store_employee_index');
    }
}
