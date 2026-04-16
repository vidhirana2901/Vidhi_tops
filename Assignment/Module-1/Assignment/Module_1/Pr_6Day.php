<?php
$day = date("l"); // Gets current day (e.g., Sunday, Monday)
	
if ($day == "Sunday") 
{
    echo "Happy Sunday.";
} 
else 
{
    echo "Today is " . $day;
}
?>