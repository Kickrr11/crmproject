<?php 

namespace repositories;

use App\Contact;

interface NoteRepoInterface {
	

	public function getbyId($id=null);
	
	public function edit($id=null);
	
	public function update($id=null);
	
	public function destroy($id);
	
}