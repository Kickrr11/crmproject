<?php

namespace repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('repositories\\AccountRepoInterface', 'repositories\\AccountRepository');

        $this->app->bind('repositories\\ContactRepoInterface', 'repositories\\ContactRepository');

        $this->app->bind('repositories\\UserRepoInterface', 'repositories\\UserRepository');

        $this->app->bind('repositories\\NoteRepoInterface', 'repositories\\NoteRepository');

        $this->app->bind('repositories\\CountryRepoInterface', 'repositories\\CountryRepository');
    }
}
