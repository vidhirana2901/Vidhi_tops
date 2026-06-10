<?php

include_once("Pr_18UserProfileModel.php");

class UserProfileController
{
    public function showProfile()
    {
        $model = new UserProfileModel();

        $user = $model->getUser();

        include("Pr_18UserProfileView.php");
    }
}

$controller = new UserProfileController();
$controller->showProfile();

?>