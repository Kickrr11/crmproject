<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformer\CountryAccountTransformer;
use repositories\CountryRepoInterface;
use Sorskod\Larasponse\Larasponse;

class ApiCountryAccountController extends Controller
{
    public function __construct(CountryRepoInterface $country, Larasponse $response)
    {
        $this->country = $country;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $country = $this->country->countryAccounts($id);

        if (!$country) {
            return response()->json(['message' => 'This account does not exist', 'code' =>404]);
        }

        return $this->response->item($country, new CountryAccountTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($countryId, $accountId)
    {
        return $this->country->showAccounts($countryId, $accountId);
    }
}
