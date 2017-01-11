<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect; 
use App\Transformer\ContactTransformer;
use Sorskod\Larasponse\Larasponse;
use repositories\ContactRepoInterface;


class ApiContactController extends Controller
{

    private $response;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(ContactRepoInterface $contact, Larasponse $response) {
        $this->contact= $contact;
        $this->response= $response;
    }

    public function index()
    {
        $contacts=$this->contact->selectAll();
        
        if (!$contacts) {
            
            return response()->json(['message' => 'No contacts','code'=>404] );

        }
        
        else {
        
        $data = $this->response
            ->collection( $contacts,
            new ContactTransformer());
        
         return response()->json($data, 200);
        }
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
    public function store (Request $request) {
        
        $v = Validator::make($request->all(), [
            
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email'
	
        ]);
		
	if ($v->fails()) {
            
            return response([
                'message'   => 'Validation Failed',
                'errors'        => $v->errors()
            ]);
	
	}
		
	else  {
            
           $input = $request->all();
           
           $this->contact->store ($input);
               
           return response()->json(['message' => 'Contact created', 'code' =>201],201 );

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
        $contact = $this->contact->getbyId($id);

        if (!$contact) {
            
            return response()->json(['message' => 'This contact does not exist'] );
            
        }
        
        return $this->response->item($contact,
            new ContactTransformer());
            
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
    public function update (Request $request,$id=null) {
 
        $input=$request->all();

        if ($this->contact ->update($id,$input)) {
            
           return response()->json(['message' => 'Contact updated', 'code' =>200],200 );

        }
        else{
           
            return response()->json(['message' => 'Couldnt delete contact'] );

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
        
      $remove = $this->contact->destroy($id);

        if($remove) {

            return response()->json(['message' => 'Contact deleted', 'code' =>200],200 );

        }
        
        else {
   
            return \response()->json(['message' => 'Couldnt delete contact'] );
           
        }

    }
}
