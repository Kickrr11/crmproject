<?php

namespace repositories;

use App\User;

class UserRepository implements UserRepoInterface
{
    public function selectAll()
    {
        return User::paginate(10);
    }

    public function getbyId($id = null)
    {
        return User::find($id);
    }

    public function store(array $data)
    {
        $user = User::create($data);

        $user->save();
    }

    public function edit($id = null)
    {
    }

    public function update($id, array $data)
    {
        $user = User::find($id);

        return $user->fill($data)->save();
    }

    public function destroy($id)
    {
    }
}
