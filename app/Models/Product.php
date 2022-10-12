<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','description'];
    /**
     * Get the colors for the product.
    */
    public function colors()
    {
        return $this->hasMany(Color::class);
    }
}
