<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use repositories\NoteRepoInterface;
use Validator;

class NoteController extends Controller
{
    private $note;

    public function __construct(NoteRepoInterface $note)
    {
        $this->note = $note;
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [

            'description' => 'required',

            ]);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v);
        } else {
            $file = $request->file('doc');
            $description = $request->input('description');

            if ($file) {
                $destinationPath = 'uploads';

                $filename = $file->move($destinationPath, $file->getClientOriginalName());
                $input = ['description'=>$description, 'doc'=> $filename];
            } else {
                $input = $request->all();
            }

            $this->note->store($input);

            return redirect()->back()->with('status', 'Note created!');
        }
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('doc');
        $name = $request->input('name');
        $description = $request->input('description');
        if ($file) {
            $destinationPath = 'uploads';

            $filename = $file->move($destinationPath, $file->getClientOriginalName());
            $input = ['name'=>$name, 'description'=>$description, 'doc'=> $filename];
        } else {
            $input = $request->all();
        }

        if ($this->note->update($id, $input)) {
            return redirect()->back()->with('status', 'Note updated!');
        }
    }

    public function delete($id)
    {
        $remove = $this->note->destroy($id);

        if ($remove) {
            return redirect()->back()->with('status', 'Note deleted!');
        } else {
            return ['status'=>'Could not update!'];
        }
    }

    public function showfile($id)
    {
        $headers = [
              'Content-Type: application/pdf',
            ];

        $note = $this->note->getbyId($id);
        $file = $note->doc;

        return response()->download($file, '', $headers);
    }
}
