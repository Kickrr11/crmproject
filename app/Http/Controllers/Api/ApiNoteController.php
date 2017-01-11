<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect; 
use repositories\NoteRepoInterface;

class ApiNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(NoteRepoInterface $note)
    {
        $this->note= $note;
    }
    
    public function index()
    {
        $note = $this->note->selectAll();
        
        return $note;
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
            
            'description' => 'required',
	
            ]);
		
	if ($v->fails()) {
			
           return response()->json(['message' => 'description required', 'code' =>400],400);
	
	}
		
	else  {

            $file = $request->file('doc');
            $description=$request->input('description');
            
            if ($file) {
                $destinationPath= 'uploads';
                
                $filename = $file->move($destinationPath,$file->getClientOriginalName());
                $input = array('description'=>$description,'doc'=> $filename);
            }
            
            else {
                
              $input = $request->all(); 
              
            }
            if ($input) {
            
            $this->note->store($input);
            
                return response()->json(['message' => 'Note created', 'code' =>201],201 );
            }
            
            else {
                
                return response()->json(['message' => 'Couldnt create note', 'code' =>401],401 );

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
        return $this->note->getbyId($id);
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
    
    //TODO
    
    public function update(Request $request, $id)
    {
        
        $file = $request->file('doc');
        $name=$request->input('name');
        $description=$request->input('description');
        if ($file) {
        $destinationPath= 'uploads';
                
        $filename = $file->move($destinationPath,$file->getClientOriginalName());
        $input = array('name'=>$name,'description'=>$description,'doc'=> $filename);
        
        }
        
        else {
            
            $input = $request->all($id);
            
        }

            if($this->note->update($id,$input)){
                return response()->json(['message' => 'Note updated', 'code' =>200],200 );            
 
            }else{
              return response()->json(['message' => 'couldnt update','code'=>404] );
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {

        $remove = $this->note->destroy($id);
        
        if($remove) {

           return response()->json(['message' => 'Note deleted', 'code' =>200],200 );

        }
      
        else {
            
            return response()->json(['message' => 'Couldnt delete note','code'=>404] );
            
        }

    }

    
}
