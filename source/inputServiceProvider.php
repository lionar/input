<?php

namespace input;

use input;
use foundation\serviceProvider;

class inputServiceProvider extends serviceProvider
{
	public function register ( )
	{
		$input = new collection;

		$this->app->share ( 'input', function ( ) use ( $input )
		{
			return $input;
		} );

		input::instance ( $input );
	}
}