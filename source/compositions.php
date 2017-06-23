<?php

namespace input;

use Closure as closure;
use input\exceptions\existentCompositionException;
use input\exceptions\inexistentCompositionException;

class compositions
{
	private $collection = [ ];

	public function has ( string $key )
	{
		return ( isset ( $this->collection [ $key ] ) );
	}

	public function compose ( string $key, array $data )
	{
		if ( ! $this->has ( $key ) )
			throw new inexistentCompositionException ( $key );
		return $this->collection [ $key ] ( ...$data );
	}

	public function composition ( string $key, closure $composition )
	{
		if ( $this->has ( $key ) )
			throw new existentCompositionException ( $key );
		$this->collection [ $key ] = $composition;
	}
}