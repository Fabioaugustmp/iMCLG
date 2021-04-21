<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    //

    public function createPartner(){
        return view('partner.partner-create');
    }

    public function listaAllPartner(){
        return view('partner.partner');
    }
}
