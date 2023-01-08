<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    public $translatable = ['name','description'];
    protected $table='categories';
    protected $fillable=['name','description','image','added_by'];
    public function admins(){
        return $this->belongsTo('App\Models\Admin','added_by');
    }
    public function products(){
        return $this->hasMany('App\Models\Product','category_id');
    }

}
