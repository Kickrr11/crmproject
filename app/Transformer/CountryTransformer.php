<?php
namespace App\Transformer;

use App\Country;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class CountryTransformer extends TransformerAbstract 
{

    public function transform(Country $item)
    {
        $output = [
            'id'    =>  $item->id, 
            'name'  =>  $item->name,
            'description'  => $item->description, 
            'user_id'  => $item->user_id, 
            'created_at'=>  $item->created_at,
            'updated_at'=>  $item->updated_at,
           
        ];

        return $output;
    }

}