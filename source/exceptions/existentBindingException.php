<?php

namespace input\exceptions;

use RuntimeException as runtimeException;

class existentBindingException extends runtimeException
{
	public function __construct ( string $key )
	{
		$this->message = "An input binding under the key: $key already exists.";
	}
}