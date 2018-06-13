<?php

namespace repositories;

use App\Account;
use App\Note;
use Auth;
use Input;

class NoteRepository implements NoteRepoInterface
{
    public function selectAll()
    {
        return Note::all();
    }

    public function getbyId($id = null)
    {
        return Note::find($id);
    }

    public function create($id)
    {
    }

    public function store(array $data)
    {
        $note = Note::create($data);

        $accounts = [Input::get('accountid')];

        foreach ($accounts as $accountId) {
            $account = Account::find($accountId);
            $note->account()->associate($account);
        }

        $user = Auth::user();
        $note->user()->associate($user);

        $note->save();
    }

    public function edit($id = null)
    {
        return Note::find($id);
    }

    public function update($id, array $data)
    {
        $note = Note::find($id);

        return $note->fill($data)->save();
    }

    public function destroy($id)
    {
        $note = Note::find($id);

        return $note->delete();
    }
}
