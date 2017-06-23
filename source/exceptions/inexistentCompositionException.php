<?php

namespace input\exceptions;

use RuntimeException as runtimeException;

class inexistentCompositionException extends runtimeException
{
	public function __construct ( string $key )
	{
		$this->message = "An input composition under the key: $key does not exist.";
	}
}