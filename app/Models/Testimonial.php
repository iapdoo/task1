<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasTranslations;

    public $translatable = ['opinion'];
    protected $table='testimonials';
    protected $fillable=['opinion','user_id'];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function getActive(){
        return $this->status == 1 ? trans('admin.active') :trans('admin.notActive') ;
    }
}
