<?php

namespace App\Transformer;

use App\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract
{
    public function transform(Contact $item)
    {
        $output = [
            'id'         => (int) $item->id,
            'firstname'  => $item->firstname,
            'lastname'   => $item->lastname,
            'email'      => $item->email,
            'account_id' => $item->account_id,
            'user_id'    => $item->user_id,
            'created_at' => $item->created_at,

        ];

        return $output;
    }
}
