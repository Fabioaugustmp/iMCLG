<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\Partner;
use App\Models\Properties;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    //

    public function showCreatePartner()
    {
        return view('partner.partner-create');
    }

    public function createPartner(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:partners',
            'cpf' => 'required|numeric|unique:partners'            
        ]);

        if (!isset($request->status)) {
            $request->status = 0;
        } else {
            $request->status = 1;
        }

        $data = [];

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['cpf'] = $request->cpf;
        $data['status'] = $request->status;

        Partner::create($data);

        return redirect('partners');
    }

    public function listaAllPartner(Partner $partners)
    {

        $partners = Partner::all();

        return view('partner.partner', [
            'partners' => $partners
        ]);
    }
}
