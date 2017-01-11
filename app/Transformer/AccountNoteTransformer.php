<?php
namespace App\Transformer;

use App\Account;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Transformer\NoteTransformer;
use League\Fractal\TransformerAbstract;

class AccountNoteTransformer extends TransformerAbstract
{
	
    protected $defaultIncludes = [
	'note'
	
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

    public function includeNote(Account $item) {
		
        $note = $item->notes;
		
        return $this->collection ($note,new NoteTransformer);

    }	
	
}