<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Auth;
use Session;
use Illuminate\Http\Request;
use repositories\NoteRepoInterface;

class NoteController extends Controller
{

    private $note;

    public function __construct(NoteRepoInterface $note) {
        
        $this->note=$note;
    }
    
    public function store (Request $request) {
        
        $v = Validator::make($request->all(), [
            
            'description' => 'required',
	
            ]);
		
	if ($v->fails()) {
			
            return Redirect::back()
                ->withErrors($v);
	
	}
		
	else  {
            
            $input=$request->all();
            
            $this->note->store($input);

	}

    }
    
    public function delete($id) {
        
        $note = $this->note->getbyId($id);
        
        $remove = $note->destroy();
        
        if($remove) {
            
           return redirect('accounts')->with('status', 'Contact deleted!');
 
        }
        
        else {
            
            return array('status'=>'Could not update!');
            
        }
        
    }

}

