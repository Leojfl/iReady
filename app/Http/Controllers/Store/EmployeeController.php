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
    public function update(RequestEmployee $request, $id = 0)
    {
        $user = Auth::User();
        $store = Store::whereHas('employees', function (Builder $query) use ($user) {
            $query->where('fk_id_user', $user->id);
        })->first();
        // try {

        DB::beginTransaction();

        $employee = Employee::findOrNew($id);
        $employee->active = true;
        $user = $id == 0 ? new User() : $employee->user;
        $user->fill($request->all());
        $user->fk_id_role = 4;
        $user->saveOrFail();
        $employee->fk_id_user = $user->id;
        $employee->fk_id_store = $store->id;
        $employee->saveOrFail();
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
        $id->delete();
        return redirect()->route('employee_index');
    }
}
