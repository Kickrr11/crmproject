<?php

namespace App\Transformer;

use App\Account;
use League\Fractal\TransformerAbstract;

class AccountTransformer extends TransformerAbstract
{
    public function transform(Account $item)
    {
        $output = [
            'id'           => $item->id,
            'name'         => $item->name,
            'description'  => $item->description,
            'country_id'   => $item->country_id,
            'user_id'      => $item->user_id,
            'created_at'   => $item->created_at,

        ];

        return $output;
    }
}
