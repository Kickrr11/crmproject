<?php

namespace App\Transformer;

use App\Country;
use League\Fractal\TransformerAbstract;

class CountryAccountTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
    'account',

    ];

    public function transform(Country $item)
    {
        $output = [
            'id'           => $item->id,
            'name'         => $item->name,
            'description'  => $item->description,

            'created_at'=> $item->created_at,
            'updated_at'=> $item->updated_at,

        ];

        return $output;
    }

    public function includeAccount(Country $item)
    {
        $account = $item->account;

        return $this->collection($account, new AccountTransformer());
    }
}
