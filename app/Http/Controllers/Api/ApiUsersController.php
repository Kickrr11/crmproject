<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformer\UserTransformer;
use Illuminate\Http\Request;
use repositories\UserRepoInterface;
use Sorskod\Larasponse\Larasponse;

class ApiUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(UserRepoInterface $user, Larasponse $response)
    {
        $this->user = $user;
        $this->response = $response;
    }

    public function index()
    {
        $users = $this->user->selectAll();

        if (!$users) {
            return response()->json(['message' => 'No contacts', 'code'=>404]);
        } else {
            $data = $this->response
            ->collection($users,
            new UserTransformer());

            return response()->json($data, 200);
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
        $user = $this->user->getbyId($id);

        if (!$user) {
            return response()->json(['message' => 'This contact does not exist']);
        }

        return $this->response->item($user,
            new UserTransformer());
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
    public function update(Request $request, $id = null)
    {
        $file = $request->file('pic');
        $username = $request->input('username');
        $email = $request->input('email');
        if ($file) {
            $destinationPath = 'uploads';

            $filename = $file->move($destinationPath, $file->getClientOriginalName());
            $input = ['username'=>$username, 'email'=>$email, 'pic'=> $filename];
        } else {
            $input = $request->all($id);
        }

        if ($this->user->update($id, $input)) {
            return response()->json(['message' => 'User updated', 'code' =>200], 200);
        } else {
            return response()->json(['message' => 'couldnt update', 'code'=>404]);
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
        $remove = $this->user->destroy($id);

        if ($remove) {
            return response()->json(['message' => 'User deleted', 'code' =>200], 200);
        } else {
            return response()->json(['message' => 'Couldnt delete user', 'code'=>404]);
        }
    }
}
