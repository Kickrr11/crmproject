<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Input;
use Redirect;
use repositories\AccountRepoInterface;
use Validator;

class AccountController extends Controller
{
    private $account;

    public function __construct(AccountRepoInterface $account)
    {
        $this->account = $account;
    }

    public function index()
    {
        $accounts = $this->account->selectAll();

        return View::make('accounts', ['accounts'=>$accounts]);
    }

    public function show($id)
    {
        return View::make('accountsview')
           ->with('contact', $this->account->contacts($id))
           ->with('note', $this->account->notes($id))
           ->with('account', $this->account->getbyId($id));
    }

    public function create($id = null)
    {
        return View::make('newaccount')
    ->with('title', 'New Account')
    ->with('country', $this->account->create($id)->sortBy('name'));
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

            $this->account->store($input);

            return redirect('accounts')->with('status', 'Account created!');
        }
    }

    public function edit($id)
    {
        $account = $this->account->getbyId($id);

        return View::make('accountedit')->with('account', $account);
    }

    public function update(Request $request, $id = null)
    {
        $input = $request->all();

        if ($this->account->update($id, $input)) {
            return redirect()->route('accounts', $id)->with('status', 'Account updated!');
        } else {
            return ['status'=>'Could not update!'];
        }

        return ['status'=>'Could not find Account!'];
    }

    public function destroy(Request $request, $id = null)
    {
        $id = $request->input('accountid');

        $remove = $this->account->destroy($id);

        if ($remove) {
            return redirect('accounts')->with('status', 'Account deleted!');
        } else {
            return ['status'=>'Could not delete!'];
        }
    }

    public function search()
    {
        $query = Input::get('query', '');

        if ($query) {
            $accounts = $this->account->search($query);

            $accounts->getAggregations();
        } else {
            // Show all posts if no query is set
            $accounts = $this->account->selectAll();
        }

        return View::make('accountssearch')->with('accounts', $accounts);
    }
}
