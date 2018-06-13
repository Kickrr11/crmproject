<?php

namespace repositories;

interface UserRepoInterface
{
    public function selectAll();

    public function getbyId($id = null);

    public function edit($id = null);

    public function update($id, array $data);

    public function destroy($id);
}
