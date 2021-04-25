<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    //
    public function createExpenseType(){
        return view('expensetype.expensetype-create');
    }

    public function listAllExpenseTypes(){
        $expensetype = ExpenseType::all();

        return view('expensetype.expensetype', [
            'expensetype' => $expensetype
        ]);
    }


    public function addExpenseType(Request $request){

        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'status' => 'required'
        ]);

        $data = $request->only(['name' , 'description', 'status']);

        ExpenseType::create($data);

        return redirect('expensetype')
        ->with('success', $data['name'] .' cadastrado com sucesso');

    }

    public function updateExpenseType(ExpenseType $expensetype){

        return view('expensetype.expensetype-update', [
            'expensetype' => $expensetype
        ]);

    }

    public function editExpenseType(ExpenseType $expensetype, Request $request){

        $expensetype->name = $request->name;
        $expensetype->description = $request->description;
        $expensetype->status = $request->status;

        $expensetype->save();

        return redirect()
        ->route('expensetype')
        ->with('success', $expensetype->name . ' atualizado com sucesso!');

        

    }
}
