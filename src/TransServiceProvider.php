<?php

namespace Trans;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class TransServiceProvider extends ServiceProvider
{
	public function boot(Kernel $kernel)
	{
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
	}
}
