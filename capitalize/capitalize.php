<?php

$query = "{query}";
if( empty( $query ) )
	$query = `pbpaste`;
echo ucwords(strtolower($query));