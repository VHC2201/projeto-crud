<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'cep', 'street', 'number', 'neighborhood', 'city', 'state'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
