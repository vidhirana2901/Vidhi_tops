<?php

function checkEmail($email)
{
    // Sanitize email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate email
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Valid Email: " . $email;
    }
    else
    {
        echo "Invalid Email";
    }
}

// Function call
checkEmail("test@gmail.com");

?>