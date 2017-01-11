<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use repositories\CountryRepoInterface;
use Validator;
use Sorskod\Larasponse\Larasponse;
use App\Transformer\CountryTransformer;

class ApiCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(CountryRepoInterface $country,Larasponse $response)
    {        
        $this->country=$country;
        $this->response = $response;
    }
    
    public function index()
    {

        return $this->response->collection
                ($this->country->selectAll(),new CountryTransformer());

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $v = Validator::make($input, [
            
            'name' => 'required',
            'description' => 'required',

        ]);
		
	if ($v->fails()) {
            
            return response([
                'message'   => 'Validation Failed',
                'errors'        => $v->errors()
            ]);
            
        } else {
            
            if ($input) {
            
                $this->country->store ($input);
            
                return response()->json(['message' => 'Country created', 'code' =>201],201 );
            
            } else {
            
                return response()->json(['message' => 'There was an error, country not created', 'code' =>500],500 );
            }
          
        }   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = $this->country->getbyId($id);
     
        if (!$country) {
            
            return response()->json(['message' => 'This country does not exist', 'code' =>404] );
            
        }
      
        return $this->response->item($country,new CountryTransformer());
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input=$request->all();

        if ($this->country ->update($id,$input)) {
            
            return response()->json(['message' => 'Country updated', 'code' =>200],200 );
            
        } else {
            
            return response()->json(['message' => 'couldnt update', 'code'=>404] );
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $remove = $this->country->destroy($id);
        
        if($remove) {

           return response()->json(['message' => 'Country deleted', 'code' =>200],200 );

        } else {

            return response()->json(['message' => 'Couldnt delete country','code'=>404] );
            
        }

    }

}
