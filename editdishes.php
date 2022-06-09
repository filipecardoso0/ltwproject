<?php

    require_once('template/common.php');
    require_once('template/editdishestemplate.php');
    require_once('utils/session.php');
    require_once('db/dishesclass.php');

    $session = new Session();

    output_header_editprofile();
    output_edit_dishes_content();
    output_footer();

?>