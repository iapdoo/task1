<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Partner extends Model
{
    use HasTranslations;

    public $translatable = ['name','description'];
    protected $table='partners';
    protected $fillable=['name','description','logo'];
    public function getActive(){
        return $this->status == 1 ? trans('admin.active') :trans('admin.notActive') ;
    }
}
