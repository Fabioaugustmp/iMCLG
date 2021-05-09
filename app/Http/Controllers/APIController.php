<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //

    public function getExpenses(){

        $query = Expense::select('id_propertie',
        'expensetype',
        'classexpense',
        'includedate',
        'expiredate',
        'paymentdate',
        'competence',
        'value',
        'observations');

        return datatables($query)->make(true);

    }
}
