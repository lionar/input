<?php

use input\collection as input;

require __DIR__ . '/../vendor/autoload.php';

$input = new input;

$input->composition ( 'full name', function ( $first, $last )
{
	return "$first $last";
} );

$input->binding ( 'name', function ( $input )
{
	$input->name = $input->compose ( 'full name', [ 'Aron', 'Wouters' ] );
} );


$input->bind ( 'name' );

var_dump ( $input->name );
