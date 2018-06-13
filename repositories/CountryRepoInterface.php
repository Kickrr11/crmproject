<?php

namespace repositories;

interface CountryRepoInterface
{
    public function selectAll();

    public function getbyId($id = null);

    public function edit($id = null);

    public function update($id = null);

    public function destroy($id);

    public function account($id);
}
