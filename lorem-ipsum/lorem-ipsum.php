<?php

// Query in the form of 5 (for 5 paragraphs) or 5 p.  Default is 1 paragraph.
$query = "{query}";
$params = empty($query) ? array(1, 'p') : explode(' ', $query);

// Get the count and the type from the $params.
$count = intval($params[0]) ? intval($params[0]) : 1;
$type  = (empty($params[1]) || !in_array($params[1], array('p', 'w'))) ? 'p' : $params[1];

// Fetch from loripsum.net and trim the output.
$output = file_get_contents("http://loripsum.net/api/$count/prude/plaintext");
$output = trim($output);

// Loripsum.net only delivers paragraphs, so if words were requested the output 
// must be shortened.
if ($type == 'w') {
  // Strip the punctuation from the graph.
  $output = preg_replace('/[^a-zA-Z 0-9]+/', '', strtolower($output));
  
  // Turn the output into an array and grab the first $count words.
  $output = explode(' ', $output);
  $output = array_slice($output, 0, $count);
  $output[0] = ucwords($output[0]);
  
  // Then reassemble.
  $output = implode(' ', $output) . '.';
}

echo $output;