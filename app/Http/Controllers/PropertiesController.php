<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\RealEstate;
use App\Models\Construction;
use App\Models\Expense;
use App\Models\FileType;
use App\Models\Partner;
use App\Models\Properties;
use App\Models\PropertiesAssociate;
use App\Models\PropertiesFiles;
use App\Models\PropertiesImages;
use App\Models\StatusProperties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Isset_;

class PropertiesController extends Controller
{
    //    

    public function listaAllProperties(Properties $properties)
    {
        $properties = Properties::paginate(9);

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
        $searchC = $request->get('company');

        // $properties = DB::table('properties')->where('name', 'like', '%'.$search. '%');
        //  $properties = $properties->find($search)->images;

        $properties = DB::table('properties')
            ->where('name', 'like', '%' . $search . '%')
            ->where('company', 'like', '%' . $searchC . '%')
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
                'properties' => $properties,
                'search' => $search,
                'searhC' => $searchC
            ]);
        }

        return $view;
    }

    public function searchPropertieCompany(Properties $properties, Request $request)
    {
        $searchC = $request->get('company');

        // $properties = DB::table('properties')->where('name', 'like', '%'.$search. '%');
        //  $properties = $properties->find($search)->images;

        $properties = DB::table('properties')
            ->where('company', 'like', '%' . $searchC . '%')
            ->get();

        if (is_null($properties) || $properties->count() == 0) {

            $view = redirect()
                ->route('search.propertie')
                ->with('warning', 'Nenhum ativo encontrado com a seguinte descricao: ' . $searchC);
        } else {
            $view = view('properties.properties-search', [
                'properties' => $properties,
                'searchC' => $searchC
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
            'dataaquisicao' => 'required'
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
            'longitude',
            'dataaquisicao',
            'dataavaliacao'
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

    public function showAddImages(Properties $properties)
    {

        return view('properties.uploads.images.properties-add-images', [
            'properties' => $properties
        ]);
    }

    public function showEditPropertie(Properties $properties)
    {

        $realestate = RealEstate::all();
        $constructions = Construction::all();
        $statusproperties = StatusProperties::all();
        $partners = $properties->partners()->get();


        return view('properties.properties-edit', [
            'properties' => $properties,
            'realestate' => $realestate,
            'constructions' => $constructions,
            'statusproperties' => $statusproperties,
            'partners' => $partners
        ]);
    }

    public function showEditImages(Properties $properties)
    {
        return view('properties.uploads.images.properties-edit-images', [
            'properties' => $properties
        ]);
    }

    public function editImages(Properties $properties, Request $request)
    {
      
    }

    public function showEditFiles(Properties $properties)
    {

        return view('properties.uploads.files.properties-edit-files', [
            'properties' => $properties
        ]);
    }

    public function putEditPropertie(Properties $properties, Request $request)
    {

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
            'dataaquisicao' => 'required'
        ]);
        /*
        //Comentário do Fábio - Aqui vc consegue ver o q tá indo na request como um debug seu burro!
        dd($request->feedback);
        exit;
        */
        $properties->name = $request->name;
        $properties->realestate = $request->realestate;
        $properties->statusproperties = $request->statusproperties;
        $properties->cep = $request->cep;
        $properties->logradouro = $request->logradouro;
        $properties->bairro = $request->bairro;
        $properties->cidade = $request->cidade;
        $properties->uf = $request->uf;
        $properties->areatotal = $request->areatotal;
        $properties->valorvenal = $request->valorvenal;
        $properties->valordaaquisicao = $request->valordaaquisicao;
        $properties->construction = $request->construction;
        $properties->company = $request->company;
        $properties->latitude = $request->latitude;
        $properties->longitude = $request->longitude;
        $properties->dataaquisicao = $request->dataaquisicao;
        $properties->dataavaliacao = $request->dataavaliacao;
        $properties->feedback = $request->feedback;

        $properties->save();

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

        return redirect()
            ->route('propertie.show', $properties->id);
    }

    public function showPropertie(Properties $properties)
    {

        $partners = $properties->partners()->get();
        $url = 'https://www.google.com/maps/search/?api=1&query=' . $properties->latitude . ',' . $properties->longitude;

        return view('properties.properties-show', [
            'properties' => $properties,
            'partners' => $partners,
            'url' => $url
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
            //$properties->partners()->sync($partnerAtt); //Sincroniza o elemento
            $properties->partners()->attach($partnerAtt);
        }

        $partners = $properties->partners()->get();

        //return view('properties.properties-add-partner-value', [
        //  "properties" => $properties,
        //"partners" => $partners
        //]);

        return redirect()->route('properties');
    }

    public function showEditPartnerRemove(Properties $properties)
    {

        $partners = $properties->partners()->get();

        return view('properties.partner.properties-update-remove-partner', [
            'properties' => $properties,
            'partners' => $partners
        ]);
    }

    public function editPartnerRemove(Partner $partner)
    {

        $detachPartner = $partner;

        $partner->properties()->detach($detachPartner);

        return redirect()->route('properties');
    }

    public function showEditPartnerAdd(Properties $properties)
    {

        $partners = Partner::all();

        return view('properties.partner.properties-update-partner', [
            'properties' => $properties,
            'partners' => $partners
        ]);
    }

    public function editPartnerAdd(Properties $properties, Request $request)
    {

        $this->validate($request, [
            'properties' => 'required'
        ]);

        $properties = Properties::find($request->properties);

        foreach ($request->partners as $partner) {

            $partnerAtt = Partner::find($partner);

            //Adiciona diretamente sem validar se existe ou nao a relacao
            $properties->partners()->attach($partnerAtt); //Sincroniza o elemento
            //$properties->partners()->sync($partnerAtt);
        }

        return redirect()
            ->route('propertie.show', ['properties' => $properties->id])
            ->with('success', 'Socios atualizados com sucesso!');
    }

    public function addPartnerValuePropertie()
    {

        return view('properties.properties-add-partner-value', []);
    }

    public function showPartnerAddValue(Properties $properties)
    {

        $partners = $properties->partners()->get();

        return view('properties.partner.properties-add-partner-value', [
            'properties' => $properties,
            'partners' => $partners

        ]);
    }

    public function partnerAddValue(Request $request, Properties $properties)
    {

        /* --> Original
           $this->validate($request, [
            'properties' => 'required'
        ]);

        //dd($request);

        $propertiesArray = $properties->partners()->get();

        $properties = Properties::find($request->properties);  

        

        for ($i=1; $i <= count($propertiesArray) ; $i++) {    
            
            $count = $i++;
            
            $partialRequest = $request->partial_value_.$count;
            $partialRequestTotal = 'partial_value_'.$partialRequest;
            $partialValue = $request->$partialRequestTotal;
            
            $properties->partners()->syncWithoutDetaching([
                $request->partner.$i => [
                    'partial_value' => $partialValue
                ]
            ]); 
            
        }

        return redirect('properties');
        */

        $this->validate($request, [
            'properties' => 'required'
        ]);

        //dd($request);

        $propertiesArray = $properties->partners()->get();

        $properties = Properties::find($request->properties);

        $valorTotal =  $request->valordaaquisicao;
        $somatoria = 0;

        //dd(count($propertiesArray));

        for ($i = 0; $i < count($propertiesArray); $i++) {

            /*$partialRequest = $request->partial_value_ . $i++;
            $partialRequestTotal = 'partial_value_' . $partialRequest;
            $partialValue = $request->$partialRequestTotal;

            $partnerRequest = $request->partner . $i++;
            $partnerJunction = 'partner' . $partnerRequest;
            $partnerValue = $request->$partnerJunction;

            dd($partnerValue);*/

            $somatoria = array_sum($request->partnerValue);

            /*if ($somatoria > $valorTotal || $somatoria < $valorTotal) {

                return redirect()
                    ->route('properties.add.files', $properties->id)
                    ->with('error', 'A somatória de valores não confere!');
            }*/

            $properties->partners()->sync([
                $request->partnerId[$i] => [
                    'partial_value' => $request->partnerValue[$i]
                ]
            ]);
        }

        return redirect('properties');
    }

    public function showAddFiles(Properties $properties)
    {

        $filetypes = FileType::all();

        return view('properties.uploads.files.properties-add-files', [
            'properties' => $properties,
            'filetypes' => $filetypes
        ]);
    }

    public function addFile(Request $request, Properties $properties)
    {

        $this->validate($request, [
            'propertieid' => 'required',
            'name' => 'required',
            'filetype' => 'required',
            'files' => 'required'
        ]);

        //dd($request->file('files'));

        $files = $request->file('files');

        $propertiesFiles = new PropertiesFiles();
        $propertiesFiles->id_properties = $request->propertieid;
        $propertiesFiles->name = $request->name;
        $propertiesFiles->filetype = $request->filetype;
        $propertiesFiles->path = $files->store('properties/files/' . $properties->id);
        $propertiesFiles->save();

        return redirect()
            ->route('properties.add.files', $properties->id)
            ->with('success', 'Arquivo cadastrado com sucesso!');
    }

    public function removeFile(PropertiesFiles $propertiesFiles)
    {

        $propertiesFiles->delete();

        Storage::delete($propertiesFiles);


        return redirect()
            ->route('propertie.show', $propertiesFiles->id_properties)
            ->with('success', 'Anexo removido com sucesso!');
    }

    public function searchExpenseDetailed(Request $request, Properties $properties)
    {

        $request->validate([
            'dates' => 'required',
            'datainicial' => 'required',
            'datafinal' => 'required'
        ]);

        $expenses = DB::table('expenses')
            ->whereBetween($request->dates, [$request->datainicial, $request->datafinal])
            ->where('id_propertie', '=', $properties->id)
            ->get();


        return view('properties.properties-show-expenses', [
            'expenses' => $expenses,
            'properties' => $properties
        ]);
    }

    public function removeImages(PropertiesImages $propertiesImages)
    {

// dd($propertiesFiles);
// exit;

        $propertiesImages->delete();
    
        Storage::delete($propertiesImages);


        return redirect()
            ->route('properties.edit.images', $propertiesImages->id_properties)
            ->with('success', 'Imagem removida com sucesso!');
    }
}
