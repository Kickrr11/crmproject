<?php

namespace App\Transformer;

use App\Note;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class NoteTransformer extends TransformerAbstract
{
    public function transform(Note $item)
    {
        $output = [
            'id'    =>  (int)$item->id, 
            'name'  => 	$item->name, 
            'description'  => $item->description, 
            'doc'  => 	$item->doc, 
            'account_id'   =>  $item->account_id,
            'user_id'   =>  $item->user_id,
            'created_at'=>  $item->created_at,
            'updated_at'=>  $item->updated_at,
           
        ];

        return $output;
    }

}