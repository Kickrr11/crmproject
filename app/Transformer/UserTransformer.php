<?php
namespace App\Transformer;

use App\User;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $item)
    {
        $output = [
			'id'        =>  (int)$item->id, 
            'username'      => 	$item->username, 
			'pass'      => 	$item->password, 
			'email'      => $item->email, 
			'pic'      => 	$item->pic, 
			'created_at'=>  $item->created_at,
			'updated'=>  $item->updated_at
           
        ];

        return $output;
    }

}