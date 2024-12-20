<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'price', 'image', 'description'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
