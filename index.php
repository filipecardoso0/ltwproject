<?php
    //Templates Section (Common html code to a lot of pages)
    require_once'template/common.php';
    require_once'template/mainpagecontent.php';
    require_once'template/modalregisterloginforms.php';

    //Draws header
    output_header();
    //Draw main page content
    output_main_content();
    //Draws footer
    output_footer();
    //Draws modal login register form
    output_modal_register_login_forms();
    //Closes html tags
    echo '</body></html>'
?>
