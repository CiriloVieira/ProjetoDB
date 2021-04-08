<?php

namespace App\Http\Controllers;

use App\Models\Database;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Traits\CrudTrait;

class DatabaseController extends Controller
{
    use CrudTrait;

    public function model(){
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
    public function index()
    {
        $data = Database::all();
        return Inertia::render('Database', ['data' => $data]);
    }


//    public function create(Request $request)
//    {
//        Database::create($request->all());
//        return response('criado');
//    }


    public function store(Request $request)
    {
        //
    }


    public function show(database $database)
    {
        //
    }


    public function edit(database $database)
    {
        //
    }



    public function update(Request $request, database $database)
    {
        //
    }


    public function destroy(database $database)
    {
        //
    }
}
