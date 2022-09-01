<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionMethod extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (! $model->isDirty('created_by')) {
                $model->created_by = auth()->user()->email;
            }
            if (! $model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->email;
            }
        });
        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (! $model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->email;
            }
        });
    }

    protected $fillable = [
        'method',
    ];
}
