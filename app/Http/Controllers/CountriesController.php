<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Redirect;
use repositories\CountryRepoInterface;
use Validator;

class CountriesController extends Controller
{
    private $country;

    public function __construct(CountryRepoInterface $country)
    {
        $this->country = $country;
    }

    public function index()
    {
        $countries = $this->country->selectAll();

        return View::make('countries', ['countries'=>$countries]);
    }

    public function show($id)
    {
        $country = $this->country->getbyId($id);

        return View::make('countriesview', ['country' => $country])
             ->with('account', $this->country->account($id));
    }

    public function create()
    {
        return View::make('newcountry');
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [

            'name'        => 'required',
            'description' => 'required',

            ]);

        if ($v->fails()) {
            return Redirect::back()->withErrors($v);
        } else {
            $input = $request->all();

            $this->country->store($input);
        }

        return redirect('countries')->with('status', 'Country created!');
    }

    public function edit($id)
    {
        $country = $this->country->getbyId($id);

        return View::make('countryedit')->with('country', $country);
    }

    public function update(Request $request, $id = null)
    {
        $id = $request->input('id');

        $country = $this->country;

        if ($country) {
            $country->name = $request->input('name');
            $country->description = $request->input('description');

            if ($country->update($id)) {
                return redirect('countries')->with('status', 'Country updated!');
            } else {
                return ['status'=>'Could not update!'];
            }
        }

        return ['status'=>'Could not find Country!'];
    }

    public function destroy(Request $request, $id = null)
    {
        $id = $request->input('countryid');

        $remove = $this->country->destroy($id);

        if ($remove) {
            return redirect('countries')->with('status', 'Country deleted!');
        } else {
            return ['status'=>'Could not delete!'];
        }
    }
}
