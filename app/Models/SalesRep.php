<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRep extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'email', 'telephone', 'route_id','joined_date','comments'];

    public function route(){
        return $this->belongsTo(Route::class,'route_id');
    }
}
