<?php
/**
*
* @package Easy Maintenance Mode
* @since 1.0
*
*/

class Admin_Settings {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'gncd_register_content_page') );
        add_action( 'wp_loaded', array( $this, 'ng_maintenance_mode') ); 
        add_action( 'admin_init', array( $this, 'gncd_register_setting') );

    }
    function gncd_register_content_page() {
        add_menu_page( __('Maintenance', 'emaintenance'),
                       __('Maintenance', 'emaintenance'),
                       'manage_options', 
                       'maintenance-mode', 
                       array( $this, 'gncd_register_setting_page'), 
                       'dashicons-admin-generic');

    }

    function gncd_register_setting() {

        // we register the content fields with WordPress
        register_setting(
            'maintenance_content_setting_group',
            'maintenance_mode_toggle'
        );
        register_setting(
            'maintenance_content_setting_group',
            'maintenance_mode_title'
        );
            register_setting(
            'maintenance_content_setting_group',
            'maintenance_mode_desc'
        );
                register_setting(
            'maintenance_content_setting_group',
            'maintenance_mode_date'
        );

        // we register the appearance fields with WordPress
        register_setting(
            'maintenance_appearance_setting_group',
            'maintenance_mode_image_logo'
        );
        register_setting(
            'maintenance_appearance_setting_group',
            'maintenance_mode_title_color'
        );
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

    public function gncd_register_setting_page() {
        ?>
        <h1> Maintenance Mode Options </h1>
        <div class="wrap">
            
            <?php

                if( isset( $_GET[ 'tab' ] ) ) {
                    $active_tab = $_GET[ 'tab' ];
                }
                else {
                    $active_tab = 'content_options';
                }
            ?>
            <h2 class="nav-tab-wrapper">
                <a href="?page=maintenance-mode&tab=content_options" class="nav-tab <?php echo $active_tab == 'content_options' ? 'nav-tab-active' : ''; ?>">Content Options</a>
                <a href="?page=maintenance-mode&tab=appearance_options" class="nav-tab <?php echo $active_tab == 'appearance_options' ? 'nav-tab-active' : ''; ?>">Appearance Options</a>
                <a href="?page=maintenance-mode&tab=social_media_options" class="nav-tab <?php echo $active_tab == 'social_media_options' ? 'nav-tab-active' : ''; ?>">Social Media Options</a>
            </h2>
             
            
            <?php settings_errors(); ?>

            <form action="options.php" method="post" enctype="multipart/form-data">
            <?php
            if( $active_tab == 'content_options' ) {
            ?>
            <h2>Page Settings</h2>
            <?php settings_fields( 'maintenance_content_setting_group' ); ?>
            <?php do_settings_sections( 'maintenance_content_setting_group' ); ?>
                <table class="form-table">

                    <tr valign="top">
                    <th scope="row"> Maintenance Mode </th>
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
                    <th scope="row"> Enter Title </th>
                        <td><input type="text" name="maintenance_mode_title" id="show_title" value="<?php echo esc_attr( get_option('maintenance_mode_title') ) ?>" required>
                    </td>

                    </tr>
                    <tr valign="top">
                    <th scope="row"> Enter Description </th>
                        <td>
                            <textarea name="maintenance_mode_desc" id="show_desc" value="" required><?php echo esc_attr( get_option('maintenance_mode_desc'));?></textarea>
                        </td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Date </th>
                        <td><input type="text" name="maintenance_mode_date" class="datepicker" id="show_date" value="<?php echo esc_attr( get_option('maintenance_mode_date') ) ?>" required></td>
                    </tr>
                </table>
                <?php submit_button();?>
        <pre id="shortcode-label">[gn-countdown]</pre>
        <p>use the above code to use shortcode</p>

        </form>
        </div>
        <?php 
        }  ?>
            <?php
            if ( $active_tab == 'appearance_options' ) {
            ?>
            <div class="wrap">
            <form id="form-maintenance-options" action="options.php" method="post" enctype="multipart/form-data">
            
            <h2>Appearance Settings</h2>
            <?php settings_fields( 'maintenance_appearance_setting_group' ); ?>
            <?php do_settings_sections( 'maintenance_appearance_setting_group' ); ?>
            <?php wp_enqueue_script( 'cpa_custom_js', plugins_url( 'admin/js/jquery.custom.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  ); ?>
       
                <table class="form-table">

                    <tr valign="top">
                    <th scope="row"> Select Logo </th>
                    <td>
                        <input type="hidden" name="maintenance_mode_image_logo" id="image_logo_url" class="regular-text" value="<?php echo esc_attr( get_option('maintenance_mode_image_logo') ) ?>">
                        <input type="button" name="upload-btn" id="upload-logo" class="button-secondary" value="Upload Image">
                        
                    </td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Title Color </th>
                    <td><input type="hidden" name="maintenance_mode_title_color" class="cpa-color-picker text-color" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_title_color') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Description Color </th>
                    <td><input type="hidden" name="maintenance_mode_desc_color" class="cpa-color-picker text-color" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_desc_color') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Countdown Color </th>
                    <td><input type="hidden" name="maintenance_mode_countdown_color" class="cpa-color-picker  text-color" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_countdown_color') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Background Image </th>
                    <td>
                        <input type="hidden" name="maintenance_mode_image" id="image_url" class="regular-text" value="<?php echo esc_attr( get_option('maintenance_mode_image') ) ?>">
                        <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
                        
                    </td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Title Font Size </th>
                        <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_title_size" value="<?php echo esc_attr( get_option('maintenance_mode_title_size') ) ?>"" onchange="show_title(this.value);">
                            <span id="slider_title" style="color:red;"></span>
                        </td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Countdown Font Size </th>
                        <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_desc_size" value="<?php echo esc_attr( get_option('maintenance_mode_desc_size') ) ?>"" onchange="show_description(this.value);">
                            <span id="slider_desc" style="color:red;"></span>
                        </td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Countdown Font Size </th>
                        <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_countdown_size" value="<?php echo esc_attr( get_option('maintenance_mode_countdown_size') ) ?>"" onchange="show_countdown(this.value);">
                            <span id="slider_countdown" style="color:red;"></span>
                        </td>
                    </tr>

                </table>
                <?php submit_button();?>
        
        </form>
        </div>
        <?php } ?>
            <?php
                if ( $active_tab == 'social_media_options' ) {
            ?>
        <div class="wrap">
             <form action="options.php" method="post">
            <h2>Social Media Settings</h2>
            <?php settings_fields( 'maintenance_social_media_setting_group' ); ?>
            <?php do_settings_sections( 'maintenance_social_media_setting_group' ); ?>
                <table class="form-table">

                    <tr valign="top">
                    <th scope="row"> Facebook Page Link</th>
                    <td><input type="url" name="mm_social_media_facebook" id="show_facebook" value="<?php echo esc_attr( get_option('mm_social_media_facebook') ) ?>" required>
                    </td>

                    </tr>
                    <tr valign="top">
                    <th scope="row"> Twitter Page Link</th>
                    <td><input type="url" name="mm_social_media_twitter" id="show_twitter" value="<?php echo esc_attr( get_option('mm_social_media_twitter') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Youtube Page Link</th>
                    <td><input type="url" name="mm_social_media_youtube" id="show_instagram" value="<?php echo esc_attr( get_option('mm_social_media_youtube') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> LinkedIn Page Link</th>
                    <td><input type="url" name="mm_social_media_linkedin" id="show_linkedin" value="<?php echo esc_attr( get_option('mm_social_media_linkedin') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Google Plus Page Link</th>
                    <td><input type="url" name="mm_social_media_googleplus" id="show_googleplus" value="<?php echo esc_attr( get_option('mm_social_media_googleplus') ) ?>" required></td>
                    </tr>

                </table>

                <?php submit_button();
                    }
                ?>
        
        </form>
        </div>
    <?php
    }

    // Activate WordPress Maintenance Mode
    function ng_maintenance_mode() {
        global $pagenow;
        $tog = get_option('maintenance_mode_toggle');
        if ( $pagenow !== 'wp-login.php' && ! current_user_can( 'manage_options' ) && ! is_admin() &&  $tog == 1) {
            header( 'HTTP/1.1 Service Unavailable', true, 503 );
            header( 'Content-Type: text/html; charset=utf-8' );
            if ( file_exists( plugin_dir_path( __FILE__ ) . 'includes/maintenance.php' ) ) {
                require_once( plugin_dir_path( __FILE__ ) . 'includes/maintenance.php' );
            }
            die();
        }

    }
}
new Admin_Settings
?>