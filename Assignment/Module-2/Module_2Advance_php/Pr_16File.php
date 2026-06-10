<?php

// Read file content
$content = file_get_contents("data.txt");

// Display content
echo nl2br($content);

?>