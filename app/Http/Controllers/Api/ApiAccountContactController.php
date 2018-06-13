<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformer\AccountContactTransformer;
use App\Transformer\ContactTransformer;
use repositories\AccountRepoInterface;
use Sorskod\Larasponse\Larasponse;

class ApiAccountContactController extends Controller
{
    private $account;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(AccountRepoInterface $account, Larasponse $response)
    {
        $this->account = $account;
        $this->response = $response;
    }

    public function index($id)
    {
        $account = $this->account->accCont($id);

        if (!$account) {
            return response()->json(['message' => 'This account does not exist', 'code' =>404]);
        }

        return $this->response
            ->item($account,
            new AccountContactTransformer());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show($accountId, $contactId)
    {
        return $this->response->item($this->account->showContacts($accountId, $contactId),
                 new ContactTransformer());
    }
}
