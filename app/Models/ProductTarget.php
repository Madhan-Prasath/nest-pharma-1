<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTarget extends Model
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
        'product_master_id',
        'scope',
        'target',
        'month',
    ];

    public function product_master(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductMaster::class);
    }

    public static function product_master_search()
    {
        $product_masters = ProductMaster::where('status', '=', 1)->get();
        $product_options = [];

        foreach ($product_masters as $product_master) {
            $data = $product_master->product->name.' , '.$product_master->state->state;
            $product_options[$product_master->id] = strtoupper($data);
        }

        asort($product_options);

        return $product_options;
    }

    public function head_quarter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HeadQuarter::class);
    }
}
