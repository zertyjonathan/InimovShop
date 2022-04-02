<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'category_title',
        'category_fileimg',
        'user_id',
        'category_description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * a categorie has the many products
     *
     * @return products
     */
    public function products()
    {
        return $this->hasMany('App\Models\product','categorie_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\users','user_id');
    }

}
