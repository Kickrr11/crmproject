<?php 

namespace repositories;

use App\Account;

interface AccountRepoInterface {
	
	public function selectAll();

	public function getbyId($id=null);
	
	public function edit($id=null);
	
	public function update($id=null);
	
	public function destroy($id);
	
}