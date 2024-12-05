<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Status extends Model
{
    protected $primaryKey = 'status_id'; // Set the primary key
    public $incrementing = false; // If the key is non-incrementing
    protected $keyType = 'string'; // Use 'string' if status_id is not an integer

    protected $fillable = [
        'customer_id',
        'status_name',
        'description',
        'balance',
        'due_date'
    ];

    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class, 'customer_id');


    }

}
