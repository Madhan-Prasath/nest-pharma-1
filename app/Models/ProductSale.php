<?php

namespace App\Models;

use Heloufir\FilamentWorkflowManager\Core\HasWorkflow;
use Heloufir\FilamentWorkflowManager\Core\InteractsWithWorkflows;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model implements HasWorkflow
{
    use HasFactory;
    use InteractsWithWorkflows;

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
        'doctor_master_id',
        'product_master_id',
        'distribution_method_id',
        'sales_unit',
        'free_unit',
        'sales_total',
        'free_total',
        'distributed_date',
        'status'
    ];

    public function doctor_master()
    {
        return $this->belongsTo(DoctorMaster::class, 'doctor_master_id');
    }

    public function product_master()
    {
        return $this->belongsTo(ProductMaster::class);
    }

    public function distribution_method()
    {
        return $this->belongsTo(DistributionMethod::class);
    }

    // This function is created to search DoctorMaster relationships fields.
    public static function doctor_master_search()
    {
        $doctor_masters = DoctorMaster::where('status', '=', 1)->get();
        $doctor_options = [];

        foreach ($doctor_masters as $doctor_master) {
            $data = $doctor_master->stockist->sales_manager->name.' & '.$doctor_master->stockist->name.' to '.$doctor_master->billing->billing_name.' / '.$doctor_master->billing->doctor_name;

            // To view all characters in Uppercase
            $doctor_options[$doctor_master->id] = strtoupper($data);
        }

        asort($doctor_options);

        return $doctor_options;
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
}
