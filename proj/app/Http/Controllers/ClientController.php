<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Traits;
use Inertia\Inertia;

class ClientController extends Controller
{
   use Traits\CrudTrait;

    public function index()
    {
        $data = Client::all();
        return Inertia::render('Conta', ['data' => $data]);
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect()->back()->with('message', 'Criado com sucesso');
    }

    public function model()
   {
       return Client::class;
   }

   public function validationRules($resource_id = 0)
   {
       // TODO: Implement validationRules() method.
   }
   public function validationRulesId($resource_id = 0)
   {
       // TODO: Implement validationRulesId() method.
   }

}
