<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BodyMetric extends Model
{
    use HasFactory;

    protected $primaryKey = 'body_metrics_id'; // Set the primary key
    //public $incrementing = false; // If the key is non-incrementing
    //protected $keyType = 'string'; // Use 'string' if body_metrics_id is not an integer

    protected $fillable = [
        'customer_id',
        'bust',
        'bust_cir',
        'waist',
        'hips',
        'arm',
        'arm_cir' ,
        'biceps', 
        'biceps_cir',
        'forearm' ,
        'forearm_cir',
        'shoulder' ,
        'off_shoulder',
        'dart ',
        'dart_cir',
        'neck',
        'mini_dress',
    ];

    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class, 'customer_id');


    }
}
