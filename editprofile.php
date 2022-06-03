<?php
    require_once('template/common.php');
    require_once('template/editprofilecontent.php');
    require_once('template/modaledituserforms.php');

    require_once('db/connectiondb.php');
    require_once('db/userclass.php');
    require_once('utils/session.php');

    $db = getDatabaseConnection();
    $session = new Session();
    $user = User::getUserWithId($db, $session->getId());
    $accountype = User::getUserAccountType($db, $user->id);

    if($user){
        output_header_editprofile();
        output_profile_edit_content($user, $accountype);
        output_footer();
        output_edit_user_form($user);
    }
    else{
        $session->logout();
        $session->addMessage('error', 'Error while fetching user information');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>