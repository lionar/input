<?php

namespace input\exceptions;

use RuntimeException as runtimeException;

class inexistentBindingException extends runtimeException
{
	public function __construct ( string $key )
	{
		$this->message = "An input binding under the key: $key does not exist.";
	}
}