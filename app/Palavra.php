<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palavra extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['id', 'palavra', 'significado', 'relevancia', 'created_at', 'updated_at'];
    protected $appends = ['text', 'weight'];

    protected function getTextAttribute(){
        return $this->palavra;
    }

    protected function getWeightAttribute(){
        return $this->relevancia;
    }
}
