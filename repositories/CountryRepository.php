<?php

namespace repositories;

use App\Account;
use App\Country;
use Auth;

class CountryRepository implements CountryRepoInterface
{
    public function selectAll()
    {
        return Country::paginate(10);
    }

    public function getbyId($id = null)
    {
        return Country::find($id);
    }

    public function create($id)
    {
    }

    public function store(array $data)
    {
        $country = Country::create($data);

        $user = Auth::user();
        $country->user()->associate($user);

        $country->save();
    }

    public function edit($id = null)
    {
        return Country::find($id);
    }

    public function update($id = null)
    {
        $country = Country::find($id);

        return $country->save();
    }

    public function destroy($id)
    {
        $contact = Country::find($id);

        return $contact->delete();
    }

    public function account($id)
    {
        $country = Country::find($id);

        return $country->account()->orderBy('created_at', 'desc')->paginate(10);
    }

    //API Transformer method

    public function countryAccounts($id)
    {
        return Country::find($id);
    }

    //API method
    public function showAccounts($countryId, $accountId)
    {
        $account = Account::find($accountId);
        $country = Country::find($countryId);

        $countries = $country->account()->get()->find($account);

        return $countries;
    }
}
