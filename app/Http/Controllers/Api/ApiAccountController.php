<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformer\AccountTransformer;
use Illuminate\Http\Request;
use repositories\AccountRepoInterface;
use Sorskod\Larasponse\Larasponse;
use Validator;

class ApiAccountController extends Controller
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

    public function index()
    {
        return $this->response->collection($this->account->selectAll(), new AccountTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $v = Validator::make($input, [

            'name'        => 'required',
            'description' => 'required',

        ]);

        if ($v->fails()) {
            return response([
                'message'       => 'Validation Failed',
                'errors'        => $v->errors(),
            ]);
        } else {
            if ($input) {
                $this->account->store($input);

                return response()->json(['message' => 'Account created', 'code' =>201], 201);
            } else {
                return response()->json(['message' => 'There was an error, account not created', 'code' =>500], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = $this->account->getbyId($id);

        if (!$account) {
            return response()->json(['message' => 'This account does not exist', 'code' =>404]);
        }

        return $this->response->item($account, new AccountTransformer());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        if ($this->account->update($id, $input)) {
            return response()->json(['message' => 'Account updated', 'code' =>200], 200);
        } else {
            return response()->json(['message' => 'couldnt update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remove = $this->account->destroy($id);

        if ($remove) {
            return response()->json(['message' => 'Account deleted', 'code' =>200], 200);
        } else {
            return response()->json(['message' => 'Couldnt delete account', 'code'=>404]);
        }
    }
}
