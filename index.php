<?php
    //Templates Section (Common html code to a lot of pages)
    require_once ('template/common.php');
    require_once ('template/mainpagecontent.php');
    require_once ('template/modalregisterloginforms.php');
    require_once('utils/session.php');
    require_once('db/connectiondb.php');
    require_once('db/categoryclass.php');
    require_once('db/restaurantclass.php');
    require_once('db/review.php');


    $db = getDatabaseConnection();

    $session = new Session();
    $categories = Category::getAllCategories($db);
    $restaurants = Restaurant::getAllRestaurants($db);

    if($session->isLoggedIn())
        //Draws header logged in
        output_header_loggedin($session->getName());
    else
        //Draws header not logged in
        output_header_notloggedin();
    //Displays message
    output_message($session);
    //Draw main page content
    output_main_content($db, $restaurants, $categories);
    //Draws footer
    output_footer();
    //Draws modal login register form
    output_modal_register_login_forms();
    //Closes html tags
    echo '</body></html>'
?>
