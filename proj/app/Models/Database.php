<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Database extends Model
{
    protected $fillable = ["path_name","db_name",'pass_db',"user_db", "client_id"];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
