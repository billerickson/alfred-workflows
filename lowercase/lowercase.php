<?php

$query = "{query}";
if( empty( $query ) )
	$query = `pbpaste`;
echo strtolower($query);