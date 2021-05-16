<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\RealEstate;
use App\Models\Construction;
use App\Models\Partner;
use App\Models\Properties;
use App\Models\PropertiesAssociate;
use App\Models\PropertiesFiles;
use App\Models\PropertiesImages;
use App\Models\StatusProperties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Isset_;

class PropertiesController extends Controller
{
    //    

    public function listaAllProperties(Properties $properties)
    {
        $properties = Properties::all();

        $propertiename = DB::table('properties')->get();

        $propertienames = [];

        foreach ($propertiename as $name) {

            $propertienames[] = $name->realestate;
        }

        return view('properties.properties', [
            'properties' => $properties,
            'propertiesnames' => $propertienames
        ]);
    }

    public function listaAllPropertiesList(Properties $properties)
    {
        $properties = Properties::all();

        $propertiename = DB::table('properties')->get();

        $propertienames = [];

        foreach ($propertiename as $name) {

            $propertienames[] = $name->name;
        }

        return view('properties.properties-list', [
            'properties' => $properties,
            'propertiesnames' => $propertienames
        ]);
    }

    public function searchPropertie(Properties $properties, Request $request)
    {

        $search = $request->get('search');

        // $properties = DB::table('properties')->where('name', 'like', '%'.$search. '%');
        //  $properties = $properties->find($search)->images;

        $properties = DB::table('properties')
            ->where('realestate', 'like', '%' . $search . '%')
            ->orWhere('statusproperties', 'like', '%' . $search . '%')
            ->orWhere('cep', 'like', '%' . $search . '%')
            ->orWhere('logradouro', 'like', '%' . $search . '%')
            ->orWhere('cidade', 'like', '%' . $search . '%')
            ->orWhere('uf', 'like', '%' . $search . '%')
            ->get();

        if (is_null($properties) || $properties->count() == 0) {

            $view = redirect()
                ->route('search.propertie')
                ->with('warning', 'Nenhum ativo encontrado com a seguinte descricao: ' . $search);
        } else {
            $view = view('properties.properties-search', [
                'properties' => $properties
            ]);
        }

        return $view;
    }   

    public function createPropertie()
    {

        $realestate = RealEstate::all();
        $constructions = Construction::all();
        $statusproperties = StatusProperties::all();
        $partners = Partner::all();

        return view('properties.properties-create', [
            'realestate' => $realestate,
            'constructions' => $constructions,
            'statusproperties' => $statusproperties,
            'partners' => $partners
        ]);
    }


    public function addProperties(Request $request)
    {

        $partners = Partner::all();

        // dd($request, $request->hasFile('pictures'), $request->hasFile('files'));

        $this->validate($request, [
            'name' => 'required',
            'realestate' => 'required',
            'statusproperties' => 'required',
            'cep' => 'required|max:9',
            'logradouro' => 'required|min:5',
            'bairro' => 'required|min:5',
            'cidade' => 'required|min:5',
            'uf' => 'required|min:2',
            'areatotal' => 'required',
            'valorvenal' => 'required',
            'valordaaquisicao' => 'required',
            'construction' => 'required',
            'company' => 'required',
        ]);

        //$request->file('pictures')->store('teste');

        $data = $request->only([
            'name',
            'realestate',
            'statusproperties',
            'cep',
            'logradouro',
            'bairro',
            'cidade',
            'uf',
            'areatotal',
            'areaconstruida',
            'valorvenal',
            'valordaaquisicao',
            'valordevenda',
            'construction',
            'company',
            'feedback',
            'latitude',
            'longitude'
        ]);

        $properties = Properties::create($data);

        //dd($properties);

        if ($request->hasFile('pictures')) {

            for ($i = 0; $i < count($request->allFiles()['pictures']); $i++) {

                $images = $request->allFiles()['pictures'][$i];

                $propertiesImages = new PropertiesImages();
                $propertiesImages->id_properties = $properties->id;
                $propertiesImages->path = $images->store('properties/images/' . $properties->id);
                $propertiesImages->save();
                unset($propertiesImages);
            }
        }

        if ($request->hasFile('files')) {

            for ($i = 0; $i <  count($request->allFiles()['files']); $i++) {

                $files = $request->allFiles()['files'][$i];

                $propertiesFiles = new PropertiesFiles();
                $propertiesFiles->id_properties = $properties->id;
                $propertiesFiles->path = $files->store('properties/files/' . $properties->id);
                $propertiesFiles->save();
                unset($propertiesFiles);
            }
        }

        return view('properties.properties-create-partner', [
            'properties' => $properties,
            'partners' => $partners
        ]);
    }

    public function showPropertie(Properties $properties)
    {

        $partners = $properties->partners()->get();

        return view('properties.properties-show', [
            'properties' => $properties,
            'partners' => $partners
        ]);
    }

    public function showExpensePropertie(Properties $properties)
    {

        $expenses = $properties->expenses()->get();

        return view('properties.properties-show-expenses', [
            'expenses' => $expenses,
            'properties' => $properties
        ]);
    }

    public function showUniqueExpensePropertie(Properties $properties)
    {

        $expenses = $properties->expenses()->get();

        return view('expenses.expenses-show-unique.blade.php', []);
    }

    public function showAddpartner(Properties $properties)
    {

        $partners = Partner::all();

        return view('properties.properties-create-partner', [
            "properties" => $properties,
            "partners" => $partners
        ]);
    }

    public function addPartner(Request $request)
    {

        $this->validate($request, [
            'properties' => 'required'
        ]);

        $properties = Properties::find($request->properties);

        foreach ($request->partners as $partner) {

            $partnerAtt = Partner::find($partner);

            //Adiciona diretamente sem validar se existe ou nao a relacao
            //$properties->partners()->sync($partnerAtt); Sincroniza o elemento
            $properties->partners()->attach($partnerAtt);            
        }

        $partners = $properties->partners()->get();

            //return view('properties.properties-add-partner-value', [
              //  "properties" => $properties,
                //"partners" => $partners
            //]);

        return redirect()->route('properties');
    }

    public function addPartnerValuePropertie(){


        return view('properties.properties-add-partner-value');

    }
}
