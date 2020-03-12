<?php 


//create admin control panel on wordpress for user input.
add_action( 'admin_menu', 'goh_nba_setup_menu' );
 
function goh_nba_setup_menu() {
        add_menu_page( 'NBA API Plugin', 'NBA API Plugin', 'manage_options', plugin_dir_path(__FILE__) . 'goh-nba-acp-page.php' );
}

