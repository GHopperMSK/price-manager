<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractorItem extends Model
{
    protected $fillable = ['contractor_id', 'name', 'price'];

    public function relatedItem()
    {
        return $this->belongsToMany('App\Item', 'relations');
    }
}
