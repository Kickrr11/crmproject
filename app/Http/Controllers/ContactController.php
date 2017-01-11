<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Illuminate\Http\Request;
use repositories\ContactRepoInterface;

class ContactController extends Controller
{

    private $contact;

    public function __construct(ContactRepoInterface $contact ) {
        
        $this->contact=$contact;
    }
    
    public function index()
    {
        //TODO VIEW
        
        $contact = $this->contact->selectAll();
        
        return $contact;
        
    }
    
    public function store (Request $request)
    {
        
        $v = Validator::make($request->all(), [
            
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email'
            
            		
            ]);
		
	if ($v->fails()) {
            
            return Redirect::back()->witherrors($v);
			
            $errors = $v->errors();
	
	} else  {

           $input = $request->all();
           
           $this->contact->store ($input);
               
           return redirect()->back()->with('status', 'Contact created!');

        }
    }    
    
    public function show ($id=null)
    {
        
        $contact = $this->contact->getbyId($id);
        
        return View::make ('contactview')
                ->with ('contact',$contact);
        
    }
    
    public function edit ($id)
    {       
        $contact = $this->contact->getbyId($id);
         return View::make ('contactedit')->with('contact',$contact); 
         
    }

    public function update (Request $request,$id=null)
    {
 
        $input=$request->all();

        if ($this->contact ->update($id,$input)) {
            
            return redirect()->route('contacts',$id)->with('status', 'Contact updated!');

        }
        else{
               return array('status'=>'Could not update!');
            }
            
             return array('status'=>'Could not find contact!');
    }
    
    
    public function destroy(Request $request,$id=null)
    {
        
        $id = $request->input('contactid');
        $remove =$this->contact->destroy($id);
        
        
        if($remove) {
            
           return redirect('accounts')->with('status', 'Contact deleted!');
 
        } else {

            return array('status'=>'Could not update!');
            
        }
        
    }
}
