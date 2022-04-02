<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'product_name',
        'product_price',
        'categorie_id',
        'product_stock',
        'product_fileimg'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * this method return the categorie of one product
     *
     * @var categories
     */
    public function categories()
    {
        return $this->belongsTo('App\Models\Categorie','categorie_id');
    }

}
