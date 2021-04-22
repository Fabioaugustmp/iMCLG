<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusPropertiesController extends Controller
{
    //
    public function createSP(){
        return view('statusproperties.statusproperties-create');
    }

    public function listAllSP(){
        return view('statusproperties.statusproperties');
    }
}
