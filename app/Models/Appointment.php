<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'name',
        'phone_number',
        'brief',
        'budget',
        'email',
        'meeting_at'
    ];

    protected $casts = [
        'meeting_at' => 'date', // format method
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
