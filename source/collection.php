<?php

namespace input;

use Closure as closure;
use input\exceptions\bindingExistentException;
use input\exceptions\compositionExistentException;
use InvalidArgumentException as invalidArgumentException;

class collection implements \agreed\input
{	
	private $collection = [ ];
	private $bindings = null;
	private $compositions = null;

	public function __construct ( bindings $bindings = null, compositions $compositions = null )
	{
		$this->bindings = ( $bindings ) ?: new bindings;
		$this->compositions = ( $compositions ) ?: new compositions;
	}

	public function __set ( string $key, $value )
	{
		$this->collection [ $key ] = $value;
	}

	public function __get ( string $key )
	{
		if ( ! isset ( $this->collection [ $key ] ) )
			throw new invalidArgumentException ( "$key does not exist." );

		return $this->collection [ $key ];
	}

	public function all ( ) : array
	{
		return $this->collection;
	}

	public function binding ( $key, closure $binding )
	{
		$this->bindings->binding ( $key, $binding );
	}

	public function bind ( string $key, array $payload = [ ] )
	{
		return $this->bindings->bind ( $key, $this, $payload );
	}

	public function bound ( string $key ) : bool
	{
		return $this->bindings->has ( $key );
	}

	public function composition ( $key, closure $binding )
	{
		$this->compositions->composition ( $key, $binding );
	}

	public function compose ( string $key, array $data )
	{
		return $this->compositions->compose ( $key, $data );
	}
}