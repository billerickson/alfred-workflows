<?php

	$words = isset( $argv[1] ) && !empty( $argv[1] ) ? intval( $argv[1] ) : 2;
	$content = file_get_contents( 'https://xuntroubled.merchantquest.net/pwgen/ppgen.cgi?wordcount=' . $words . '&minlen=4&maxlen=8&randcaps=none&numlen=2&submit=Generate+Passphrase' );
	$table = substr( $content, strpos( $content, '<tr><th>Passphrase</th></tr>' ) + 28 );
	$items = explode( '<tt>', $table );
	$item = str_replace( array( "</tt>", "<td>", "</td>", "<tr>", "</tr>", "\r", "\n" ), "", $items[3] );
	echo $item;