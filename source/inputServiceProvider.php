<?php

namespace input;

use serviceProvider;

class inputServiceProvider extends serviceProvider
{
	public function register ( )
	{
		$this->app->share ( 'input', function ( )
		{
			return new collection;
		} );
	}
}