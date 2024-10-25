<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['shopping_list_id', 'product_id', 'is_purchased', 'is_favorite'];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
