<?php

namespace App\Http\Controllers;

use App\Models\ClassExpenses;
use Illuminate\Http\Request;

class ClassExpensesController extends Controller
{
    public function createClassExpenses(){
        return view('classexpenses.classexpenses-create');
    }

    public function listAllClassExpenses(){
        $classexpenses = ClassExpenses::all();

        return view('classexpenses.classexpenses', [
            'classexpenses' => $classexpenses
        ]);
    }


    public function addclassexpenses(Request $request){

        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'status' => 'required'
        ]);

        $data = $request->only(['name' , 'description', 'status']);

        ClassExpenses::create($data);

        return redirect('classexpenses')
        ->with('success', $data['name'] .' cadastrado com sucesso');

    }

    public function updateclassexpenses(ClassExpenses $classexpenses){

        return view('classexpenses.classexpenses-update', [
            'classexpenses' => $classexpenses
        ]);

    }

    public function editclassexpenses(ClassExpenses $classexpenses, Request $request){

        $classexpenses->name = $request->name;
        $classexpenses->description = $request->description;
        $classexpenses->status = $request->status;

        $classexpenses->save();

        return redirect()
        ->route('classexpenses')
        ->with('success', $classexpenses->name . ' atualizado com sucesso!');

        

    }
}
