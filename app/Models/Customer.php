<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id'; // Set the primary key
    //public $incrementing = false; // If the key is non-incrementing
    //protected $keyType = 'string'; // Use 'string' if customer_id is not an integer
    //protected static string $model = Customer::class;

    protected $fillable = [
        'name',
        'phone'
    ];

    public function bodyMetrics()
{
    return $this->hasMany(BodyMetric::class, 'customer_id');
}
    public function statuses()
{
    return $this->hasMany(Status::class, 'customer_id');
}

}
