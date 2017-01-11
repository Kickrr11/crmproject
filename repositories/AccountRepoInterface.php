<?php 

namespace repositories;



interface AccountRepoInterface {
	
    public function selectAll();
	
    public function getbyId($id=null);

    public function edit($id=null);

    public function update($id=null,array $data);
	
    public function destroy($id);
        
    public function contacts($id);
        
    public function notes($id);
	
}