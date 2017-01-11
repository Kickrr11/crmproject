<?php 

namespace repositories;

use App\User;

interface UserRepoInterface {
	
	public function selectAll();

	public function getbyId($id=null);
	
	public function edit($id=null);
	
	public function update($id=null, array $data);
	
	public function destroy($id);
	
}