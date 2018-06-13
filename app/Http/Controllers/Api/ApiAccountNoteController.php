<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformer\AccountNoteTransformer;
use repositories\AccountRepoInterface;
use Sorskod\Larasponse\Larasponse;

class ApiAccountNoteController extends Controller
{
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
        $account = $this->account->accNote($id);

        if (!$account) {
            return response()->json(['message' => 'This account does not exist', 'code' =>404]);
        }

        return $this->response
            ->item($account,
            new AccountNoteTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($accountId, $noteId)
    {
        return $this->account->shownotes($accountId, $noteId);
    }
}
