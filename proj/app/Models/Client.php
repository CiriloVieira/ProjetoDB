<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Database;

class Client extends Model
{
    protected $fillable= ['razao_social', 'dt_pagamento', 'vlr_recorrente', "expire_date", "limit_logins"];

    protected $guarded = [];

    public function database() {

        return $this->hasMany(Database::class);

    }
}
