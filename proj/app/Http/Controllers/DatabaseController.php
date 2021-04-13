<?php

namespace App\Http\Controllers;

use App\Models\Database;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Traits\CrudTrait;
use App\Models\Client;

class DatabaseController extends Controller
{
    use CrudTrait;

    public function index()
    {
        $data = Database::all();
        $client = Client::all();
        return Inertia::render('Database', ['data' => $data, 'clients'=> $client]);
    }

    public function store(Request $request)
    {
        Database::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if($request->has('id')){
            Database::find($request->input('id'))->update($request->all());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        if($request->has('id')){
            Database::find($request['id'])->delete();
            return redirect()->back();
        }
    }

    public function model()
    {
        return Database::class;
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
