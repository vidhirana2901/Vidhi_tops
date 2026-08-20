<?php
// Set timezone
date_default_timezone_set("Asia/Kolkata");

// Display current date and time in different formats
echo "Default Format: " . date("Y-m-d H:i:s") . "<br>";
echo "Date (DD-MM-YYYY): " . date("d-m-Y") . "<br>";
echo "Date (Month Day, Year): " . date("F d, Y") . "<br>";
echo "Time (12-hour format): " . date("h:i:s A") . "<br>";
echo "Time (24-hour format): " . date("H:i:s") . "<br>";
echo "Day: " . date("l") . "<br>";
echo "Full Date & Time: " . date("l, d F Y h:i:s A");
?>