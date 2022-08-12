<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use const Grpc\STATUS_ALREADY_EXISTS;

class Stockist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'sales_manager_id',
        'status'
    ];

    public function sales_manager(){
        return $this->belongsTo(SalesManager::class , 'sales_manager_id', 'id');
    }

}
