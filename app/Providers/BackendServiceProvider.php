<?php

namespace repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {
    
    public function register()
	{
	$this->app->bind('repositoriesAccountRepoInterface', 'repositoriesDbAccountRepository');
    }
    
    
}