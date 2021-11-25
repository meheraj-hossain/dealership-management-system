<?php

namespace App\Http\Controllers;

use App\AreaManager;
use App\EmployeeManagement;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class EmployeeManagementController extends Controller
{
    public function salaryList(){
        $data['title']='Salary List';
        $data['area_managers'] = AreaManager::all();
        return view('admin.employee_management.salary.index',$data);
    }

public function salaryListStore(Request $request){
    $request->validate([
        'month'=>'required',
        'id'=>'required',
    ]);
    foreach ($request->id as $employee_id){
        $employee = AreaManager::where('id',$employee_id)->first();
        $employee_salary = EmployeeManagement::where([
            ['employee_id', $employee_id],
            ['month', $request->month]
        ])->first();
        if (empty($employee_salary)) {
            $employee_salary = new EmployeeManagement();
        } else {
            $employee_salary = $employee_salary;
        }
        $employee_salary->employee_id = $employee_id;
        $employee_salary->month = $request->month;
        $employee_salary->salary = $employee->salary;
        $employee_salary->bonus = $request->bonus[$employee_id];
        $employee_salary->save();
    }
    session()->flash('message','New Salary List is created');
    return redirect()->route('employee.employeeSalaryList');
    }

    public function employeeSalaryList(){
        $data['title'] = 'Employee Salary Status';
        $data['salary_lists'] = EmployeeManagement::with(['AreaManager'=>function($query){
            $query->with(['Area']);
        }])->get();
        return view('admin.employee_management.salary.employee_salary_list',$data);
    }
}
