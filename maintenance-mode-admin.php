<?php
/**
*
* @package Easy Maintenance Mode
* @since 1.0
*
*/

// Create Class Admin_Settings

class Admin_Settings {

// Create public constructor function

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'gncd_register_content_page') );
        add_action( 'wp_loaded', array( $this, 'ng_maintenance_mode') ); 
        add_action( 'admin_init', array( $this, 'gncd_register_setting') );

    }

/*
Function Name: gncd_register_content_page
Function Description: This function adds menu page
*/

    function gncd_register_content_page() {
        add_menu_page( __('Easy Maintenance', 'easy-maintenance-mode'),
                       __('Easy Maintenance', 'easy-maintenance-mode'),
                       'manage_options', 
                       'maintenance-mode', 
                       array( $this, 'gncd_register_setting_page'), 
                       'dashicons-admin-generic');

    }

/*
Function Name: gncd_register_setting
Function Description: This function will register all the settings
*/

    function gncd_register_setting() {

        // we register the content fields with WordPress

        register_setting( 'maintenance_content_setting_group', 'maintenance_mode_toggle' );
        register_setting( 'maintenance_content_setting_group', 'maintenance_mode_title' );
        register_setting( 'maintenance_content_setting_group', 'maintenance_mode_desc' );
        register_setting( 'maintenance_content_setting_group', 'maintenance_mode_date' );

        // we register the appearance fields with WordPress

        register_setting( 'maintenance_appearance_setting_group', 'maintenance_mode_image_logo' );
        register_setting( 'maintenance_appearance_setting_group', 'maintenance_mode_title_color' );
        register_setting(
            'maintenance_appearance_setting_group',
            'maintenance_mode_desc_color'
        );
        register_setting(
            'maintenance_appearance_setting_group',
            'maintenance_mode_countdown_color'
        );
        register_setting(
            'maintenance_appearance_setting_group',
            'maintenance_mode_image'
        );
        register_setting(
            'maintenance_appearance_setting_group',
            'maintenance_mode_title_size'
        );
        register_setting(
            'maintenance_appearance_setting_group',
            'maintenance_mode_desc_size'
        );
        register_setting(
            'maintenance_appearance_setting_group',
            'maintenance_mode_countdown_size'
        );

        // we register the social media fields with WordPress

        register_setting(
            'maintenance_social_media_setting_group',
            'mm_social_media_facebook'
        );
        register_setting(
            'maintenance_social_media_setting_group',
            'mm_social_media_twitter'
        );
        register_setting(
            'maintenance_social_media_setting_group',
            'mm_social_media_youtube'
        );
            register_setting(
            'maintenance_social_media_setting_group',
            'mm_social_media_googleplus'
        );
        register_setting(
            'maintenance_social_media_setting_group',
            'mm_social_media_linkedin'
        );

    }

/*
Function Name: gncd_register_setting_page
Function Description: This fucntion has all the setting that we want to display
*/

    public function gncd_register_setting_page() {
        ?>
        <h1> <?php _e( 'Maintenance Mode Options', 'easy-maintenance-mode' ) ?> </h1>
            
            <?php

                // Condition to check the current tab
                
                if( isset( $_GET[ 'tab' ] ) ) {
                    $active_tab = $_GET[ 'tab' ];
                }
                else {
                    $active_tab = 'content_options';
                }
            ?>
            
            <h2 class="nav-tab-wrapper">
                <a href="?page=maintenance-mode&tab=content_options" class="nav-tab <?php echo $active_tab == 'content_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Content Options', 'easy-maintenance-mode') ?></a>
                <a href="?page=maintenance-mode&tab=appearance_options" class="nav-tab <?php echo $active_tab == 'appearance_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Appearance Options', 'easy-maintenance-mode') ?></a>
                <a href="?page=maintenance-mode&tab=social_media_options" class="nav-tab <?php echo $active_tab == 'social_media_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Social Media Options', 'easy-maintenance-mode') ?></a>
            </h2>
             
            
            <?php settings_errors(); ?>

            <form action="options.php" method="post" enctype="multipart/form-data">
            <?php

            // Checking if active tab is content_options

            if( $active_tab == 'content_options' ) {
            ?>
            <!-- If active tab is content_options then show Page Settings -->
        <div class="wrap">
            <h2><?php _e('Page Settings', 'easy-maintenance-mode') ?></h2>
            <?php settings_fields( 'maintenance_content_setting_group' ); ?>
            <?php do_settings_sections( 'maintenance_content_setting_group' ); ?>
                <table class="form-table">

                    <tr valign="top">
                    <th scope="row"> <?php _e('Maintenance Mode', 'easy-maintenance-mode') ?> </th>
                        <td>
                            <div class="onoffswitch">
                            <input type="checkbox" class="onoffswitch-checkbox" id="myonoffswitch" checked name="maintenance_mode_toggle" id="show_toggle" value="1" <?php checked( 'maintenance_mode_toggle', '1'); ?> >
                                <label class="onoffswitch-label" for="myonoffswitch">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                             </div>
                        </td>
                    </td>

                    </tr>

                    <tr valign="top">
                    <th scope="row"> <?php _e( 'Enter Title', 'easy-maintenance-mode') ?> </th>
                        <td><input type="text" name="maintenance_mode_title" id="show_title" value="<?php echo esc_attr( get_option('maintenance_mode_title') ) ?>" >
                    </td>

                    </tr>
                    <tr valign="top">
                    <th scope="row"> <?php _e( 'Enter Description', 'easy-maintenance-mode') ?> </th>
                        <td>
                            <textarea name="maintenance_mode_desc" id="show_desc" value="" ><?php echo esc_attr( get_option('maintenance_mode_desc'));?></textarea>
                        </td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> <?php _e( 'Select Date', 'easy-maintenance-mode') ?>  </th>
                        <td><input type="text" name="maintenance_mode_date" class="datepicker" id="show_date" value="<?php echo esc_attr( get_option('maintenance_mode_date') ) ?>" ></td>
                    </tr>
                </table>
                <?php submit_button();?>
            </form>
        </div>
        <?php 
        }  ?>
            <?php

             // Checking if active tab is appearance_options

            if ( $active_tab == 'appearance_options' ) {
            ?>
            <!-- If active tab is appearance_options then show Appearance Settings -->

            <div class="wrap">
                <form id="form-maintenance-options" action="options.php" method="post" enctype="multipart/form-data">
                
                <h2> <?php _e( 'Appearance Settings', 'easy-maintenance-mode' ) ?> </h2>
                <?php settings_fields( 'maintenance_appearance_setting_group' ); ?>
                <?php do_settings_sections( 'maintenance_appearance_setting_group' ); ?>
                <?php wp_enqueue_script( 'maintenance_custom_js', plugins_url( 'admin/js/jquery.custom.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  ); ?>
           
                    <table class="form-table">

                        <tr valign="top">
                        <th scope="row"> <?php _e( 'Select Logo', 'easy-maintenance-mode' ) ?> </th>
                        <td>
                            <input type="hidden" name="maintenance_mode_image_logo" id="image_logo_url" class="regular-text" value="<?php echo esc_attr( get_option('maintenance_mode_image_logo') ) ?>" >
                            <input type="button" name="upload-logo" id="upload-logo" class="button-secondary" value="Upload Logo">  
                            <span>
                            <img id="upload_logo_preview" />
                            </span>
                        </td>
                        </tr>

                        <tr valign="top">
                        <th scope="row"> <?php _e( 'Select Title Color', 'easy-maintenance-mode' ) ?> </th>
                        <td><input type="hidden" name="maintenance_mode_title_color" class="cpa-color-picker text-color" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_title_color') ) ?>" ></td>
                        </tr>

                        <tr valign="top">
                        <th scope="row"> <?php _e( 'Select Description Color', 'easy-maintenance-mode' ) ?> </th>
                        <td><input type="hidden" name="maintenance_mode_desc_color" class="cpa-color-picker text-color" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_desc_color') ) ?>" ></td>
                        </tr>

                        <tr valign="top">
                        <th scope="row"> <?php _e('Select Countdown Color', 'easy-maintenance-mode') ?> </th>
                        <td><input type="hidden" name="maintenance_mode_countdown_color" class="cpa-color-picker  text-color" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_countdown_color') ) ?>" ></td>
                        </tr>

                        <tr valign="top">
                        <th scope="row"> <?php _e( 'Select Background Image', 'easy-maintenance-mode' ) ?> </th>
                        <td>
                            <input type="hidden" name="maintenance_mode_image" id="image_url" class="regular-text" value="<?php echo esc_attr( get_option('maintenance_mode_image') ) ?>">
                            <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Background Image">
                            <img id="upload_background_preview" />
                            </span>
                            
                        </td>
                        </tr>

                        <tr valign="top">
                        <th scope="row"> <?php _e( 'Select Title Size', 'easy-maintenance-mode' ) ?> </th>
                            <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_title_size" value="<?php echo esc_attr( get_option('maintenance_mode_title_size') ) ?>" onchange="show_title(this.value);">
                                <span id="slider_title" style="color:#8A0707;"> <?php echo get_option( 'maintenance_mode_title_size' ); ?>px </span>
                            </td>
                        </tr>

                        <tr valign="top">
                        <th scope="row"> <?php _e( 'Select Description Size', 'easy-maintenance-mode' ) ?> </th>
                            <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_desc_size" value="<?php echo esc_attr( get_option('maintenance_mode_desc_size') ) ?>" onchange="show_description(this.value);">
                                <span id="slider_desc" style="color:#8A0707;"> <?php echo get_option( 'maintenance_mode_desc_size' ); ?>px </span>
                            </td>
                        </tr>

                        <tr valign="top">
                        <th scope="row"> <?php _e( 'Select Countdown Font Size', 'easy-maintenance-mode' ) ?> </th>
                            <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_countdown_size" value="<?php echo esc_attr( get_option('maintenance_mode_countdown_size') ) ?>" onchange="show_countdown(this.value);">
                                <span id="slider_countdown" style="color:#8A0707;"> <?php echo get_option( 'maintenance_mode_countdown_size' ); ?>px </span>
                            </td>
                        </tr>

                    </table>
                    <?php submit_button();?>
            
                </form>
            </div>
        <?php } ?>
            <?php

                // Checking if active tab is social_media_options

                if ( $active_tab == 'social_media_options' ) {
            ?>
        <!-- If active tab is social_media_options then show Social Media Settings -->
        <div class="wrap">
            <form action="options.php" method="post">
            <h2>Social Media Settings</h2>
            <?php settings_fields( 'maintenance_social_media_setting_group' ); ?>
            <?php do_settings_sections( 'maintenance_social_media_setting_group' ); ?>
                <table class="form-table">

                    <tr valign="top">
                    <th scope="row"> <?php _e( 'Facebook Page Link', 'easy-maintenance-mode' ) ?> </th>
                    <td><input type="url" name="mm_social_media_facebook" id="show_facebook" value="<?php echo esc_attr( get_option('mm_social_media_facebook') ) ?>" >
                    </td>

                    </tr>
                    <tr valign="top">
                    <th scope="row"> <?php _e( 'Twitter Page Link', 'easy-maintenance-mode' ) ?> </th>
                    <td><input type="url" name="mm_social_media_twitter" id="show_twitter" value="<?php echo esc_attr( get_option('mm_social_media_twitter') ) ?>" ></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> <?php _e( 'Youtube Page Link', 'easy-maintenance-mode' ) ?> </th>
                    <td><input type="url" name="mm_social_media_youtube" id="show_instagram" value="<?php echo esc_attr( get_option('mm_social_media_youtube') ) ?>" ></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> <?php _e( 'LinkedIn Page Link', 'easy-maintenance-mode' ) ?> </th>
                    <td><input type="url" name="mm_social_media_linkedin" id="show_linkedin" value="<?php echo esc_attr( get_option('mm_social_media_linkedin') ) ?>" ></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> <?php _e( ' Google Plus Page Link', 'easy-maintenance-mode' ) ?> </th>
                    <td><input type="url" name="mm_social_media_googleplus" id="show_googleplus" value="<?php echo esc_attr( get_option('mm_social_media_googleplus') ) ?>" ></td>
                    </tr>

                </table>

                <?php submit_button();
                    }
                ?>
        
            </form>
        </div>
    <?php
    }

/*
Function Name: ng_maintenance_mode
Fucntion Description: This function is used to activate WordPress maintenance mode
*/

    function ng_maintenance_mode() {
        global $pagenow;
        $tog = get_option('maintenance_mode_toggle');
        if ( $pagenow !== 'wp-login.php' && ! current_user_can( 'manage_options' ) && ! is_admin() &&  $tog == 1) {
            if ( file_exists( plugin_dir_path( __FILE__ ) . 'includes/maintenance.php' ) ) {
                require_once( plugin_dir_path( __FILE__ ) . 'includes/maintenance.php' );
            }
            die();
        }

    }
}

// Create object of class

new Admin_Settings
?>