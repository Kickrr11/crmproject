<?php

namespace repositories;

interface NoteRepoInterface
{
    public function getbyId($id = null);

    public function edit($id = null);

    public function update($id, array $data);

    public function destroy($id);
}
