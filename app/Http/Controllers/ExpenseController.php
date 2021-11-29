<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Expenses List';
        $data['expenses']= Expense::paginate(2);
        $data['serial']=managePaginationSerial($data['expenses']);
        return view('admin.expense.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Add New Expense information';
        return view('admin.expense.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'amount'=>'required|numeric|min:0|not_in:0',
        ]);
        $expense = new Expense();
        $expense-> name = $request->name;
        $expense-> details = $request->details;
        $expense-> amount = $request->amount;
        $expense->save();
        session()->flash('message','Expense Details Added Successfully');
        return redirect()->route('expenses.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $data['title']='Edit Expense Details';
        $data['expense']=$expense;
        return view('admin.expense.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'amount'=>'required|numeric|min:0|not_in:0',
        ]);
        $expense-> name = $request->name;
        $expense-> details = $request->details;
        $expense-> amount = $request->amount;
        $expense->update();
        session()->flash('message','Expense Details Updated Successfully');
        return redirect()->route('expenses.edit',$expense->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
