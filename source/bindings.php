<?php

namespace input;

use Closure as closure;
use input\exceptions\inexistentBindingException;
use input\exceptions\existentBindingException;

class bindings
{
	private $collection = [ ];

	public function has ( string $key ) : bool
	{
		return ( isset ( $this->collection [ $key ] ) );
	}

	public function bind ( string $key, collection $input, array $payload = [ ] )
	{
		if ( ! $this->has ( $key ) )
			throw new inexistentBindingException ( $key );
		return $this->collection [ $key ] ( $input, $payload );
	}

	public function binding ( string $key, closure $binding )
	{
		if ( $this->has ( $key ) )
			throw new existentBindingException ( $key );
		$this->collection [ $key ] = $binding;
	}
}