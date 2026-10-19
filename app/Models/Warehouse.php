<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'location',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function managers()
    {
        return $this->hasMany(Manager::class);
    }
}
