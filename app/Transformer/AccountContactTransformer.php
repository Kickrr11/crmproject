<?php
namespace App\Transformer;

use App\Account;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Transformer\ContactTransformer;
use League\Fractal\TransformerAbstract;

class AccountContactTransformer extends TransformerAbstract
{
	
    protected $defaultIncludes = [
	'contact'
	
    ];
	
    public function transform(Account $item)
    {
        $output = [
            'id'    =>  $item->id, 
            'name'  =>  $item->name,
            'description'  => $item->description, 
            'country_id'  => $item->country_id,
            'user_id'  => $item->user_id, 
            'created_at'=>  $item->created_at,
           
        ];

        return $output;
    }

    public function includeContact(Account $item) {
		
        $contact = $item->contacts;
		
        return $this->collection ($contact,new ContactTransformer);

    }	
	
}