<?php

function sb_instagram_menu() {
    add_menu_page(
        'Instagram Feed',
        'Instagram Feed',
        'manage_options',
        'sb-instagram-feed',
        'sb_instagram_settings_page'
    );
    add_submenu_page(
        'sb-instagram-feed',
        'Settings',
        'Settings',
        'manage_options',
        'sb-instagram-feed',
        'sb_instagram_settings_page'
    );
}
add_action('admin_menu', 'sb_instagram_menu');

function sb_instagram_settings_page() {

    //Hidden fields
    $sb_instagram_settings_hidden_field = 'sb_instagram_settings_hidden_field';
    $sb_instagram_configure_hidden_field = 'sb_instagram_configure_hidden_field';
    $sb_instagram_customize_hidden_field = 'sb_instagram_customize_hidden_field';

    //Declare defaults
    $sb_instagram_settings_defaults = array(
        'sb_instagram_at'                   => '',
        'sb_instagram_user_id'              => '',
        'sb_instagram_preserve_settings'    => '',
        'sb_instagram_ajax_theme'           => false,
        'sb_instagram_width'                => '100',
        'sb_instagram_width_unit'           => '%',
        'sb_instagram_height'               => '',
        'sb_instagram_num'                  => '20',
        'sb_instagram_height_unit'          => '',
        'sb_instagram_cols'                 => '4',
        'sb_instagram_disable_mobile'       => false,
        'sb_instagram_image_padding'        => '5',
        'sb_instagram_image_padding_unit'   => 'px',
        'sb_instagram_sort'                 => 'none',
        'sb_instagram_background'           => '',
        'sb_instagram_show_btn'             => true,
        'sb_instagram_btn_background'       => '',
        'sb_instagram_btn_text_color'       => '',
        'sb_instagram_btn_text'             => 'Load More...',
        'sb_instagram_image_res'            => 'auto',
        //Header
        'sb_instagram_show_header'          => true,
        'sb_instagram_header_color'         => '',
        //Follow button
        'sb_instagram_show_follow_btn'      => true,
        'sb_instagram_folow_btn_background' => '',
        'sb_instagram_follow_btn_text_color' => '',
        'sb_instagram_follow_btn_text'      => 'Follow on Instagram',
        //Misc
        'sb_instagram_custom_css'           => '',
        'sb_instagram_custom_js'            => ''
    );
    //Save defaults in an array
    $options = wp_parse_args(get_option('sb_instagram_settings'), $sb_instagram_settings_defaults);
    update_option( 'sb_instagram_settings', $options );

    //Set the page variables
    $sb_instagram_at = $options[ 'sb_instagram_at' ];
    $sb_instagram_user_id = $options[ 'sb_instagram_user_id' ];
    $sb_instagram_preserve_settings = $options[ 'sb_instagram_preserve_settings' ];
    $sb_instagram_ajax_theme = $options[ 'sb_instagram_ajax_theme' ];
    $sb_instagram_width = $options[ 'sb_instagram_width' ];
    $sb_instagram_width_unit = $options[ 'sb_instagram_width_unit' ];
    $sb_instagram_height = $options[ 'sb_instagram_height' ];
    $sb_instagram_height_unit = $options[ 'sb_instagram_height_unit' ];
    $sb_instagram_num = $options[ 'sb_instagram_num' ];
    $sb_instagram_cols = $options[ 'sb_instagram_cols' ];
    $sb_instagram_disable_mobile = $options[ 'sb_instagram_disable_mobile' ];
    $sb_instagram_image_padding = $options[ 'sb_instagram_image_padding' ];
    $sb_instagram_image_padding_unit = $options[ 'sb_instagram_image_padding_unit' ];
    $sb_instagram_sort = $options[ 'sb_instagram_sort' ];
    $sb_instagram_background = $options[ 'sb_instagram_background' ];
    $sb_instagram_show_btn = $options[ 'sb_instagram_show_btn' ];
    $sb_instagram_btn_background = $options[ 'sb_instagram_btn_background' ];
    $sb_instagram_btn_text_color = $options[ 'sb_instagram_btn_text_color' ];
    $sb_instagram_btn_text = $options[ 'sb_instagram_btn_text' ];
    $sb_instagram_image_res = $options[ 'sb_instagram_image_res' ];
    //Header
    $sb_instagram_show_header = $options[ 'sb_instagram_show_header' ];
    $sb_instagram_header_color = $options[ 'sb_instagram_header_color' ];
    //Follow button
    $sb_instagram_show_follow_btn = $options[ 'sb_instagram_show_follow_btn' ];
    $sb_instagram_folow_btn_background = $options[ 'sb_instagram_folow_btn_background' ];
    $sb_instagram_follow_btn_text_color = $options[ 'sb_instagram_follow_btn_text_color' ];
    $sb_instagram_follow_btn_text = $options[ 'sb_instagram_follow_btn_text' ];
    //Misc
    $sb_instagram_custom_css = $options[ 'sb_instagram_custom_css' ];
    $sb_instagram_custom_js = $options[ 'sb_instagram_custom_js' ];

    // See if the user has posted us some information. If they did, this hidden field will be set to 'Y'.
    if( isset($_POST[ $sb_instagram_settings_hidden_field ]) && $_POST[ $sb_instagram_settings_hidden_field ] == 'Y' ) {

        if( isset($_POST[ $sb_instagram_configure_hidden_field ]) && $_POST[ $sb_instagram_configure_hidden_field ] == 'Y' ) {
            $sb_instagram_at = $_POST[ 'sb_instagram_at' ];
            $sb_instagram_user_id = $_POST[ 'sb_instagram_user_id' ];
            isset($_POST[ 'sb_instagram_preserve_settings' ]) ? $sb_instagram_preserve_settings = $_POST[ 'sb_instagram_preserve_settings' ] : $sb_instagram_preserve_settings = '';
            isset($_POST[ 'sb_instagram_ajax_theme' ]) ? $sb_instagram_ajax_theme = $_POST[ 'sb_instagram_ajax_theme' ] : $sb_instagram_ajax_theme = '';

            $options[ 'sb_instagram_at' ] = $sb_instagram_at;
            $options[ 'sb_instagram_user_id' ] = $sb_instagram_user_id;
            $options[ 'sb_instagram_preserve_settings' ] = $sb_instagram_preserve_settings;
            $options[ 'sb_instagram_ajax_theme' ] = $sb_instagram_ajax_theme;
        } //End config tab post

        if( isset($_POST[ $sb_instagram_customize_hidden_field ]) && $_POST[ $sb_instagram_customize_hidden_field ] == 'Y' ) {
            $sb_instagram_width = $_POST[ 'sb_instagram_width' ];
            $sb_instagram_width_unit = $_POST[ 'sb_instagram_width_unit' ];
            $sb_instagram_height = $_POST[ 'sb_instagram_height' ];
            $sb_instagram_height_unit = $_POST[ 'sb_instagram_height_unit' ];
            $sb_instagram_num = $_POST[ 'sb_instagram_num' ];
            $sb_instagram_cols = $_POST[ 'sb_instagram_cols' ];
            isset($_POST[ 'sb_instagram_disable_mobile' ]) ? $sb_instagram_disable_mobile = $_POST[ 'sb_instagram_disable_mobile' ] : $sb_instagram_disable_mobile = '';

            $sb_instagram_image_padding = $_POST[ 'sb_instagram_image_padding' ];
            $sb_instagram_image_padding_unit = $_POST[ 'sb_instagram_image_padding_unit' ];
            $sb_instagram_sort = $_POST[ 'sb_instagram_sort' ];
            $sb_instagram_background = $_POST[ 'sb_instagram_background' ];
            isset($_POST[ 'sb_instagram_show_btn' ]) ? $sb_instagram_show_btn = $_POST[ 'sb_instagram_show_btn' ] : $sb_instagram_show_btn = '';
            $sb_instagram_btn_background = $_POST[ 'sb_instagram_btn_background' ];
            $sb_instagram_btn_text_color = $_POST[ 'sb_instagram_btn_text_color' ];
            $sb_instagram_btn_text = $_POST[ 'sb_instagram_btn_text' ];
            $sb_instagram_image_res = $_POST[ 'sb_instagram_image_res' ];
            //Header
            isset($_POST[ 'sb_instagram_show_header' ]) ? $sb_instagram_show_header = $_POST[ 'sb_instagram_show_header' ] : $sb_instagram_show_header = '';
            $sb_instagram_header_color = $_POST[ 'sb_instagram_header_color' ];
            //Follow button
            isset($_POST[ 'sb_instagram_show_follow_btn' ]) ? $sb_instagram_show_follow_btn = $_POST[ 'sb_instagram_show_follow_btn' ] : $sb_instagram_show_follow_btn = '';
            $sb_instagram_folow_btn_background = $_POST[ 'sb_instagram_folow_btn_background' ];
            $sb_instagram_follow_btn_text_color = $_POST[ 'sb_instagram_follow_btn_text_color' ];
            $sb_instagram_follow_btn_text = $_POST[ 'sb_instagram_follow_btn_text' ];
            //Misc
            $sb_instagram_custom_css = $_POST[ 'sb_instagram_custom_css' ];
            $sb_instagram_custom_js = $_POST[ 'sb_instagram_custom_js' ];

            $options[ 'sb_instagram_width' ] = $sb_instagram_width;
            $options[ 'sb_instagram_width_unit' ] = $sb_instagram_width_unit;
            $options[ 'sb_instagram_height' ] = $sb_instagram_height;
            $options[ 'sb_instagram_height_unit' ] = $sb_instagram_height_unit;
            $options[ 'sb_instagram_num' ] = $sb_instagram_num;
            $options[ 'sb_instagram_cols' ] = $sb_instagram_cols;
            $options[ 'sb_instagram_disable_mobile' ] = $sb_instagram_disable_mobile;
            $options[ 'sb_instagram_image_padding' ] = $sb_instagram_image_padding;
            $options[ 'sb_instagram_image_padding_unit' ] = $sb_instagram_image_padding_unit;
            $options[ 'sb_instagram_sort' ] = $sb_instagram_sort;
            $options[ 'sb_instagram_background' ] = $sb_instagram_background;
            $options[ 'sb_instagram_show_btn' ] = $sb_instagram_show_btn;
            $options[ 'sb_instagram_btn_background' ] = $sb_instagram_btn_background;
            $options[ 'sb_instagram_btn_text_color' ] = $sb_instagram_btn_text_color;
            $options[ 'sb_instagram_btn_text' ] = $sb_instagram_btn_text;
            $options[ 'sb_instagram_image_res' ] = $sb_instagram_image_res;
            //Header
            $options[ 'sb_instagram_show_header' ] = $sb_instagram_show_header;
            $options[ 'sb_instagram_header_color' ] = $sb_instagram_header_color;
            //Follow button
            $options[ 'sb_instagram_show_follow_btn' ] = $sb_instagram_show_follow_btn;
            $options[ 'sb_instagram_folow_btn_background' ] = $sb_instagram_folow_btn_background;
            $options[ 'sb_instagram_follow_btn_text_color' ] = $sb_instagram_follow_btn_text_color;
            $options[ 'sb_instagram_follow_btn_text' ] = $sb_instagram_follow_btn_text;
            //Misc
            $options[ 'sb_instagram_custom_css' ] = $sb_instagram_custom_css;
            $options[ 'sb_instagram_custom_js' ] = $sb_instagram_custom_js;
            
        } //End customize tab post
        
        //Save the settings to the settings array
        update_option( 'sb_instagram_settings', $options );

    ?>
    <div class="updated"><p><strong><?php _e('Settings saved.', 'instagram-feed' ); ?></strong></p></div>
    <?php } ?>


    <div id="sbi_admin" class="wrap">

        <div id="header">
            <h2><?php _e('Instagram Feed'); ?></h2>
        </div>
    
        <form name="form1" method="post" action="">
            <input type="hidden" name="<?php echo $sb_instagram_settings_hidden_field; ?>" value="Y">

            <?php $sbi_active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'configure'; ?>
            <h2 class="nav-tab-wrapper">
                <a href="?page=sb-instagram-feed&amp;tab=configure" class="nav-tab <?php echo $sbi_active_tab == 'configure' ? 'nav-tab-active' : ''; ?>"><?php _e('1. Configure'); ?></a>
                <a href="?page=sb-instagram-feed&amp;tab=customize" class="nav-tab <?php echo $sbi_active_tab == 'customize' ? 'nav-tab-active' : ''; ?>"><?php _e('2. Customize'); ?></a>
                <a href="?page=sb-instagram-feed&amp;tab=display" class="nav-tab <?php echo $sbi_active_tab == 'display' ? 'nav-tab-active' : ''; ?>"><?php _e('3. Display Your Feed'); ?></a>
                <a href="?page=sb-instagram-feed&amp;tab=support" class="nav-tab <?php echo $sbi_active_tab == 'support' ? 'nav-tab-active' : ''; ?>"><?php _e('Support'); ?></a>
            </h2>

            <?php if( $sbi_active_tab == 'configure' ) { //Start Configure tab ?>
            <input type="hidden" name="<?php echo $sb_instagram_configure_hidden_field; ?>" value="Y">

            <table class="form-table">
                <tbody>
                    <h3><?php _e('Configure'); ?></h3>

                    <div id="sbi_config">
                        <a href="https://instagram.com/oauth/authorize/?client_id=97584dabe06548f99b54d318f8db509d&redirect_uri=https://smashballoon.com/instagram-feed/instagram-token-plugin/?return_uri=<?php echo admin_url('admin.php?page=sb-instagram-feed'); ?>&response_type=token" class="sbi_admin_btn"><?php _e('Log in and get my Access Token and User ID'); ?></a>
                    </div>
                    
                    <tr valign="top">
                        <th scope="row"><label><?php _e('Access Token'); ?></label></th>
                        <td>
                            <input name="sb_instagram_at" id="sb_instagram_at" type="text" value="<?php esc_attr_e( $sb_instagram_at ); ?>" size="60" placeholder="Click button above to get your Access Token" />
                            &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What is this?"); ?></a>
                            <p class="sbi_tooltip"><?php _e("In order to display your photos you need an Access Token from Instagram. To get yours, simply click the button above and log into Instagram. You can also use the button on <a href='https://smashballoon.com/instagram-feed/token/' target='_blank'>this page</a>."); ?></p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label><?php _e('Show Photos From:'); ?>
                        
                        </label></th>
                        <td>
                            <span>
                                <?php $sb_instagram_type = 'user'; ?>
                                <input type="radio" name="sb_instagram_type" id="sb_instagram_type_user" value="user" <?php if($sb_instagram_type == "user") echo "checked"; ?> />
                                <label class="sbi_radio_label" for="sb_instagram_type_user">User ID(s):</label>
                                <input name="sb_instagram_user_id" id="sb_instagram_user_id" type="text" value="<?php esc_attr_e( $sb_instagram_user_id ); ?>" size="25" />
                                &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What is this?"); ?></a>
                                <p class="sbi_tooltip"><?php _e("These are the IDs of the Instagram accounts you want to display photos from. To get your ID simply click on the button above and log into Instagram.<br /><br />You can also display photos from other peoples Instagram accounts. To find their User ID you can use <a href='http://www.otzberg.net/iguserid/' target='_blank'>this tool</a>. You can separate multiple IDs using commas."); ?></p><br />
                            </span>

                            <div class="sbi_notice sbi_user_id_error">
                                <?php _e("<p>Please be sure to enter your numeric <b>User ID</b> and not your Username. You can find your User ID by clicking the blue Instagram Login button above, or by entering your username into <a href='http://www.otzberg.net/iguserid/' target='_blank'>this tool</a>.</p>"); ?>
                            </div>
                            
                            <span class="sbi_pro">
                                <input disabled type="radio" name="sb_instagram_type" id="sb_instagram_type_hashtag" value="hashtag" <?php if($sb_instagram_type == "hashtag") echo "checked"; ?> />
                                <label class="sbi_radio_label" for="sb_instagram_type_hashtag">Hashtag:</label>
                                <input readonly type="text" size="25" />
                                &nbsp;<a class="sbi_tooltip_link sbi_pro" href="JavaScript:void(0);"><?php _e("What is this?"); ?></a><span class="sbi_note"> - <a href="https://smashballoon.com/instagram-feed/" target="_blank">Upgrade to Pro to show posts by Hashtag</a></span>
                                <p class="sbi_tooltip"><?php _e("Display posts from a specific hashtag instead of from a user"); ?></p>
                            </span>
                            <br />
                            <span class="sbi_note" style="margin: 10px 0 0 0; display: block;"><?php _e('Separate multiple IDs or hashtags using commas'); ?></span>
                           
                        </td>
                    </tr>

                    <tr>
                        <th class="bump-left"><label for="sb_instagram_preserve_settings" class="bump-left"><?php _e("Preserve settings when plugin is removed"); ?></label></th>
                        <td>
                            <input name="sb_instagram_preserve_settings" type="checkbox" id="sb_instagram_preserve_settings" <?php if($sb_instagram_preserve_settings == true) echo "checked"; ?> />
                            <label for="sb_instagram_preserve_settings"><?php _e('Yes'); ?></label>
                            <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?'); ?></a>
                            <p class="sbi_tooltip"><?php _e('When removing the plugin your settings are automatically erased. Checking this box will prevent any settings from being deleted. This means that you can uninstall and reinstall the plugin without losing your settings.'); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th class="bump-left"><label for="sb_instagram_ajax_theme" class="bump-left"><?php _e("Are you using an Ajax powered theme?"); ?></label></th>
                        <td>
                            <input name="sb_instagram_ajax_theme" type="checkbox" id="sb_instagram_ajax_theme" <?php if($sb_instagram_ajax_theme == true) echo "checked"; ?> />
                            <label for="sb_instagram_ajax_theme"><?php _e('Yes'); ?></label>
                            <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?'); ?></a>
                            <p class="sbi_tooltip"><?php _e("When navigating your site, if your theme uses Ajax to load content into your pages (meaning your page doesn't refresh) then check this setting. If you're not sure then please check with the theme author."); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php submit_button(); ?>
        </form>

        <p><?php _e('Next Step: <a href="?page=sb-instagram-feed&tab=customize">Customize your Feed</a>'); ?></p>

        <p><?php _e('Need help setting up the plugin? Check out our <a href="http://smashballoon.com/instagram-feed/free/" target="_blank">setup directions</a>'); ?></p>


    <?php } // End Configure tab ?>



    <?php if( $sbi_active_tab == 'customize' ) { //Start Configure tab ?>
    <input type="hidden" name="<?php echo $sb_instagram_customize_hidden_field; ?>" value="Y">

        <h3><?php _e('Customize'); ?></h3>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Width of Feed'); ?></label></th>
                    <td>
                        <input name="sb_instagram_width" type="text" value="<?php esc_attr_e( $sb_instagram_width ); ?>" size="4" />
                        <select name="sb_instagram_width_unit">
                            <option value="px" <?php if($sb_instagram_width_unit == "px") echo 'selected="selected"' ?> ><?php _e('px'); ?></option>
                            <option value="%" <?php if($sb_instagram_width_unit == "%") echo 'selected="selected"' ?> ><?php _e('%'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Height of Feed'); ?></label></th>
                    <td>
                        <input name="sb_instagram_height" type="text" value="<?php esc_attr_e( $sb_instagram_height ); ?>" size="4" />
                        <select name="sb_instagram_height_unit">
                            <option value="px" <?php if($sb_instagram_height_unit == "px") echo 'selected="selected"' ?> ><?php _e('px'); ?></option>
                            <option value="%" <?php if($sb_instagram_height_unit == "%") echo 'selected="selected"' ?> ><?php _e('%'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Background Color'); ?></label></th>
                    <td>
                        <input name="sb_instagram_background" type="text" value="<?php esc_attr_e( $sb_instagram_background ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
            </tbody>
        </table>

        <hr />
        <h3><?php _e('Photos'); ?></h3>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Sort Photos By'); ?></label></th>
                    <td>
                        <select name="sb_instagram_sort">
                            <option value="none" <?php if($sb_instagram_sort == "none") echo 'selected="selected"' ?> ><?php _e('Newest to oldest'); ?></option>
                            <!-- <option value="most-recent" <?php if($sb_instagram_sort == "most-recent") echo 'selected="selected"' ?> ><?php _e('Newest to Oldest'); ?></option>
                            <option value="least-recent" <?php if($sb_instagram_sort == "least-recent") echo 'selected="selected"' ?> ><?php _e('Oldest to newest'); ?></option>
                            <option value="most-liked" <?php if($sb_instagram_sort == "most-liked") echo 'selected="selected"' ?> ><?php _e('Most liked first'); ?></option>
                            <option value="least-liked" <?php if($sb_instagram_sort == "least-liked") echo 'selected="selected"' ?> ><?php _e('Least liked first'); ?></option>
                            <option value="most-commented" <?php if($sb_instagram_sort == "most-commented") echo 'selected="selected"' ?> ><?php _e('Most commented first'); ?></option>
                            <option value="least-commented" <?php if($sb_instagram_sort == "least-commented") echo 'selected="selected"' ?> ><?php _e('Least commented first'); ?></option> -->
                            <option value="random" <?php if($sb_instagram_sort == "random") echo 'selected="selected"' ?> ><?php _e('Random'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top" class="sbi_pro">
                    <th scope="row"><label><?php _e("Enable Pop-up Lightbox"); ?></label></th>
                    <td>
                        <span class="sbi_note"><a href="https://smashballoon.com/instagram-feed/" target="_blank"><?php _e('Upgrade to Pro to enable the Pop-up Lightbox.'); ?></a></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Number of Photos'); ?></label></th>
                    <td>
                        <input name="sb_instagram_num" type="text" value="<?php esc_attr_e( $sb_instagram_num ); ?>" size="4" />
                        <span class="sbi_note"><?php _e('Number of photos to show initially. Maximum of 33.'); ?></span>
                        &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("Using multiple IDs or hashtags?"); ?></a>
                            <p class="sbi_tooltip"><?php _e("If you're displaying photos from multiple User IDs or hashtags then this is the number of photos which will be displayed from each."); ?></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Number of Columns'); ?></label></th>
                    <td>

                        <select name="sb_instagram_cols">
                            <option value="1" <?php if($sb_instagram_cols == "1") echo 'selected="selected"' ?> ><?php _e('1'); ?></option>
                            <option value="2" <?php if($sb_instagram_cols == "2") echo 'selected="selected"' ?> ><?php _e('2'); ?></option>
                            <option value="3" <?php if($sb_instagram_cols == "3") echo 'selected="selected"' ?> ><?php _e('3'); ?></option>
                            <option value="4" <?php if($sb_instagram_cols == "4") echo 'selected="selected"' ?> ><?php _e('4'); ?></option>
                            <option value="5" <?php if($sb_instagram_cols == "5") echo 'selected="selected"' ?> ><?php _e('5'); ?></option>
                            <option value="6" <?php if($sb_instagram_cols == "6") echo 'selected="selected"' ?> ><?php _e('6'); ?></option>
                            <option value="7" <?php if($sb_instagram_cols == "7") echo 'selected="selected"' ?> ><?php _e('7'); ?></option>
                            <option value="8" <?php if($sb_instagram_cols == "8") echo 'selected="selected"' ?> ><?php _e('8'); ?></option>
                            <option value="9" <?php if($sb_instagram_cols == "9") echo 'selected="selected"' ?> ><?php _e('9'); ?></option>
                            <option value="10" <?php if($sb_instagram_cols == "10") echo 'selected="selected"' ?> ><?php _e('10'); ?></option>
                        </select>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Image Resolution'); ?></label></th>
                    <td>

                        <select name="sb_instagram_image_res">
                            <option value="auto" <?php if($sb_instagram_image_res == "auto") echo 'selected="selected"' ?> ><?php _e('Auto-detect (recommended)'); ?></option>
                            <option value="thumb" <?php if($sb_instagram_image_res == "thumb") echo 'selected="selected"' ?> ><?php _e('Thumbnail (150x150)'); ?></option>
                            <option value="medium" <?php if($sb_instagram_image_res == "medium") echo 'selected="selected"' ?> ><?php _e('Medium (306x306)'); ?></option>
                            <option value="full" <?php if($sb_instagram_image_res == "full") echo 'selected="selected"' ?> ><?php _e('Full size (640x640)'); ?></option>
                        </select>

                        &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What does Auto-detect mean?"); ?></a>
                            <p class="sbi_tooltip"><?php _e("Auto-detect means that the plugin automatically sets the image resolution based on the size of your feed."); ?></p>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Padding around Images'); ?></label></th>
                    <td>
                        <input name="sb_instagram_image_padding" type="text" value="<?php esc_attr_e( $sb_instagram_image_padding ); ?>" size="4" />
                        <select name="sb_instagram_image_padding_unit">
                            <option value="px" <?php if($sb_instagram_image_padding_unit == "px") echo 'selected="selected"' ?> ><?php _e('px'); ?></option>
                            <option value="%" <?php if($sb_instagram_image_padding_unit == "%") echo 'selected="selected"' ?> ><?php _e('%'); ?></option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label><?php _e("Disable mobile layout"); ?></label></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_disable_mobile" id="sb_instagram_disable_mobile" <?php if($sb_instagram_disable_mobile == true) echo 'checked="checked"' ?> />
                        &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What does this mean?"); ?></a>
                            <p class="sbi_tooltip"><?php _e("By default on mobile devices the layout automatically changes to use fewer columns. Checking this setting disables the mobile layout."); ?></p>
                    </td>
                </tr>

                <tr valign="top" class="sbi_pro">
                    <th scope="row"><label><?php _e('Hide Photos'); ?></label></th>
                    <td>
                        <span class="sbi_note"><a href="https://smashballoon.com/instagram-feed/" target="_blank"><?php _e('Upgrade to Pro to enable this feature.'); ?></a></span>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>

        <hr />
        <h3><?php _e("Header"); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Show the Header"); ?></label></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_show_header" id="sb_instagram_show_header" <?php if($sb_instagram_show_header == true) echo 'checked="checked"' ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Header Text Color'); ?></label></th>
                    <td>
                        <input name="sb_instagram_header_color" type="text" value="<?php esc_attr_e( $sb_instagram_header_color ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
            </tbody>
        </table>

        <hr />
        <h3><?php _e("Caption"); ?></h3>
        <p style="padding-bottom: 18px;"><a href="https://smashballoon.com/instagram-feed/" target="_blank">Upgrade to Pro to enable Photo Captions</a></p>

        <hr />
        <h3><?php _e("Likes &amp; Comments"); ?></h3>
        <p style="padding-bottom: 18px;"><a href="https://smashballoon.com/instagram-feed/" target="_blank">Upgrade to Pro to enable Likes &amp; Comments</a></p>

        <hr />
        <h3><?php _e("'Load More' Button"); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Show the 'Load More' button"); ?></label></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_show_btn" id="sb_instagram_show_btn" <?php if($sb_instagram_show_btn == true) echo 'checked="checked"' ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Background Color'); ?></label></th>
                    <td>
                        <input name="sb_instagram_btn_background" type="text" value="<?php esc_attr_e( $sb_instagram_btn_background ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Text Color'); ?></label></th>
                    <td>
                        <input name="sb_instagram_btn_text_color" type="text" value="<?php esc_attr_e( $sb_instagram_btn_text_color ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Text'); ?></label></th>
                    <td>
                        <input name="sb_instagram_btn_text" type="text" value="<?php esc_attr_e( $sb_instagram_btn_text ); ?>" size="20" />
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>

        <hr />
        <h3><?php _e("'Follow on Instagram' Button"); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Show the Follow button"); ?></label></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_show_follow_btn" id="sb_instagram_show_follow_btn" <?php if($sb_instagram_show_follow_btn == true) echo 'checked="checked"' ?> />
                    </td>
                </tr>

                <!-- <tr valign="top">
                    <th scope="row"><label><?php _e("Button Position"); ?></label></th>
                    <td>
                        <select name="sb_instagram_follow_btn_position">
                            <option value="top" <?php if($sb_instagram_follow_btn_position == "top") echo 'selected="selected"' ?> ><?php _e('Top'); ?></option>
                            <option value="bottom" <?php if($sb_instagram_follow_btn_position == "bottom") echo 'selected="selected"' ?> ><?php _e('Bottom'); ?></option>
                        </select>
                    </td>
                </tr> -->

                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Background Color'); ?></label></th>
                    <td>
                        <input name="sb_instagram_folow_btn_background" type="text" value="<?php esc_attr_e( $sb_instagram_folow_btn_background ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Text Color'); ?></label></th>
                    <td>
                        <input name="sb_instagram_follow_btn_text_color" type="text" value="<?php esc_attr_e( $sb_instagram_follow_btn_text_color ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Text'); ?></label></th>
                    <td>
                        <input name="sb_instagram_follow_btn_text" type="text" value="<?php esc_attr_e( $sb_instagram_follow_btn_text ); ?>" size="30" />
                    </td>
                </tr>
            </tbody>
        </table>

        <hr />
        <h3><?php _e('Misc'); ?></h3>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <td style="padding-bottom: 0;">
                    <?php _e('<strong style="font-size: 15px;">Custom CSS</strong><br />Enter your own custom CSS in the box below'); ?>
                    </td>
                </tr>
                <tr valign="top">
                    <td>
                        <textarea name="sb_instagram_custom_css" id="sb_instagram_custom_css" style="width: 70%;" rows="7"><?php esc_attr_e( stripslashes($sb_instagram_custom_css) ); ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <td style="padding-bottom: 0;">
                    <?php _e('<strong style="font-size: 15px;">Custom JavaScript</strong><br />Enter your own custom JavaScript/jQuery in the box below'); ?>
                    </td>
                </tr>
                <tr valign="top">
                    <td>
                        <textarea name="sb_instagram_custom_js" id="sb_instagram_custom_js" style="width: 70%;" rows="7"><?php esc_attr_e( stripslashes($sb_instagram_custom_js) ); ?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>

    </form>

    <p><?php _e('Next Step: <a href="?page=sb-instagram-feed&tab=display">Display your Feed</a>'); ?></p>

    <p><?php _e('Need help setting up the plugin? Check out our <a href="http://smashballoon.com/instagram-feed/free/" target="_blank">setup directions</a>'); ?></p>


    <?php } //End Customize tab ?>



    <?php if( $sbi_active_tab == 'display' ) { //Start Display tab ?>

        <h3><?php _e('Display your Feed'); ?></h3>
        <p><?php _e("Copy and paste the following shortcode directly into the page, post or widget where you'd like the feed to show up:"); ?></p>
        <input type="text" value="[instagram-feed]" size="16" readonly="readonly" style="text-align: center;" onclick="this.focus();this.select()" title="<?php _e('To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac).'); ?>" />

        <p><?php _e("If you'd like to display multiple feeds then you can set different settings directly in the shortcode like so:"); ?>
        <code>[instagram-feed num=9 cols=3]</code></p>
        <p>You can display as many different feeds as you like, on either the same page or on different pages, by just using the shortcode options below. For example:<br />
        <code>[instagram-feed]</code><br />
        <code>[instagram-feed id="12986477"]</code><br />
        <code>[instagram-feed id="12986477,13460080" num=4 cols=4 showfollow=false]</code>
        </p>
        <p><?php _e("See the table below for a full list of available shortcode options:"); ?></p>

        <p><span class="sbi_table_key"></span><?php _e('Pro version only'); ?></p>

        <table class="sbi_shortcode_table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><?php _e('Shortcode option'); ?></th>
                    <th scope="row"><?php _e('Description'); ?></th>
                    <th scope="row"><?php _e('Example'); ?></th>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Configure Options"); ?></td></tr>
                <tr class="sbi_pro">
                    <td>type</td>
                    <td><?php _e("Display photos from a User ID (user) or Hashtag (hashtag)"); ?></td>
                    <td><code>[instagram-feed type=hashtag]</code></td>
                </tr>
                <tr>
                    <td>id</td>
                    <td><?php _e('An Instagram User ID. Separate multiple IDs by commas.'); ?></td>
                    <td><code>[instagram-feed id="1234567"]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>hashtag</td>
                    <td><?php _e('Any hashtag. Separate multiple IDs by commas.'); ?></td>
                    <td><code>[instagram-feed hashtag="#awesome"]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Customize Options"); ?></td></tr>
                <tr>
                    <td>width</td>
                    <td><?php _e("The width of your feed. Any number."); ?></td>
                    <td><code>[instagram-feed width=50]</code></td>
                </tr>
                <tr>
                    <td>widthunit</td>
                    <td><?php _e("The unit of the width. 'px' or '%'"); ?></td>
                    <td><code>[instagram-feed widthunit=%]</code></td>
                </tr>
                <tr>
                    <td>height</td>
                    <td><?php _e("The height of your feed. Any number."); ?></td>
                    <td><code>[instagram-feed height=250]</code></td>
                </tr>
                <tr>
                    <td>heightunit</td>
                    <td><?php _e("The unit of the height. 'px' or '%'"); ?></td>
                    <td><code>[instagram-feed heightunit=px]</code></td>
                </tr>
                <tr>
                    <td>background</td>
                    <td><?php _e("The background color of the feed. Any hex color code."); ?></td>
                    <td><code>[instagram-feed background=#ffff00]</code></td>
                </tr>
                <tr>
                    <td>class</td>
                    <td><?php _e("Add a CSS class to the feed container"); ?></td>
                    <td><code>[instagram-feed class=feedOne]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Photos Options"); ?></td></tr>
                <tr>
                    <td>sortby</td>
                    <td><?php _e("Sort the posts by Newest to Oldest (none) or Random (random)"); ?></td>
                    <td><code>[instagram-feed sortby=random]</code></td>
                </tr>
                <tr>
                    <td>num</td>
                    <td><?php _e("The number of photos to display initially. Maximum is 33."); ?></td>
                    <td><code>[instagram-feed num=10]</code></td>
                </tr>
                <tr>
                    <td>cols</td>
                    <td><?php _e("The number of columns in your feed. 1 - 10."); ?></td>
                    <td><code>[instagram-feed cols=5]</code></td>
                </tr>
                <tr>
                    <td>imageres</td>
                    <td><?php _e("The resolution/size of the photos. 'auto', full', 'medium' or 'thumb'."); ?></td>
                    <td><code>[instagram-feed imageres=full]</code></td>
                </tr>
                <tr>
                    <td>imagepadding</td>
                    <td><?php _e("The spacing around your photos"); ?></td>
                    <td><code>[instagram-feed imagepadding=10]</code></td>
                </tr>
                <tr>
                    <td>imagepaddingunit</td>
                    <td><?php _e("The unit of the padding. 'px' or '%'"); ?></td>
                    <td><code>[instagram-feed imagepaddingunit=px]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>disablelightbox</td>
                    <td><?php _e("Whether to disable the photo Lightbox. It is enabled by default."); ?></td>
                    <td><code>[instagram-feed disablelightbox=true]</code></td>
                </tr>
                <tr>
                    <td>disablemobile</td>
                    <td><?php _e("Disable the mobile layout. 'true' or 'false'."); ?></td>
                    <td><code>[instagram-feed disablemobile=true]</code></td>
                </tr>

                <tr class="sbi_pro">
                    <td>hovercolor</td>
                    <td><?php _e("The background color when hovering over a photo. Any hex color code."); ?></td>
                    <td><code>[instagram-feed hovercolor=#ff0000]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>hovertextcolor</td>
                    <td><?php _e("The text/icon color when hovering over a photo. Any hex color code."); ?></td>
                    <td><code>[instagram-feed hovertextcolor=#fff]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Header Options"); ?></td></tr>
                <tr>
                    <td>showheader</td>
                    <td><?php _e("Whether to show the feed Header. 'true' or 'false'."); ?></td>
                    <td><code>[instagram-feed showheader=false]</code></td>
                </tr>
                <tr>
                    <td>headercolor</td>
                    <td><?php _e("The color of the Header text. Any hex color code."); ?></td>
                    <td><code>[instagram-feed headercolor=#333]</code></td>
                </tr>
                
                <tr class="sbi_table_header"><td colspan=3><?php _e("'Load More' Button Options"); ?></td></tr>
                <tr>
                    <td>showbutton</td>
                    <td><?php _e("Whether to show the 'Load More' button. 'true' or 'false'."); ?></td>
                    <td><code>[instagram-feed showbutton=false]</code></td>
                </tr>
                <tr>
                    <td>buttoncolor</td>
                    <td><?php _e("The background color of the button. Any hex color code."); ?></td>
                    <td><code>[instagram-feed buttoncolor=#000]</code></td>
                </tr>
                <tr>
                    <td>buttontextcolor</td>
                    <td><?php _e("The text color of the button. Any hex color code."); ?></td>
                    <td><code>[instagram-feed buttontextcolor=#fff]</code></td>
                </tr>
                <tr>
                    <td>buttontext</td>
                    <td><?php _e("The text used for the button."); ?></td>
                    <td><code>[instagram-feed buttontext="Load More Photos"]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("'Follow on Instagram' Button Options"); ?></td></tr>
                <tr>
                    <td>showfollow</td>
                    <td><?php _e("Whether to show the 'Follow on Instagram' button. 'true' or 'false'."); ?></td>
                    <td><code>[instagram-feed showfollow=true]</code></td>
                </tr>
                <tr>
                    <td>followcolor</td>
                    <td><?php _e("The background color of the button. Any hex color code."); ?></td>
                    <td><code>[instagram-feed followcolor=#ff0000]</code></td>
                </tr>
                <tr>
                    <td>followtextcolor</td>
                    <td><?php _e("The text color of the button. Any hex color code."); ?></td>
                    <td><code>[instagram-feed followtextcolor=#fff]</code></td>
                </tr>
                <tr>
                    <td>followtext</td>
                    <td><?php _e("The text used for the button."); ?></td>
                    <td><code>[instagram-feed followtext="Follow me"]</code></td>
                </tr>
                
                <tr class="sbi_table_header"><td colspan=3><?php _e("Caption Options"); ?></td></tr>
                <tr class="sbi_pro">
                    <td>showcaption</td>
                    <td><?php _e("Whether to show the photo caption. 'true' or 'false'."); ?></td>
                    <td><code>[instagram-feed showcaption=false]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>captionlength</td>
                    <td><?php _e("The number of characters of the caption to display"); ?></td>
                    <td><code>[instagram-feed captionlength=50]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>captioncolor</td>
                    <td><?php _e("The text color of the caption. Any hex color code."); ?></td>
                    <td><code>[instagram-feed captioncolor=#000]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>captionsize</td>
                    <td><?php _e("The size of the caption text. Any number."); ?></td>
                    <td><code>[instagram-feed captionsize=24]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Likes &amp; Comments Options"); ?></td></tr>
                <tr class="sbi_pro">
                    <td>showlikes</td>
                    <td><?php _e("Whether to show the Likes &amp; Comments. 'true' or 'false'."); ?></td>
                    <td><code>[instagram-feed showlikes=false]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>likescolor</td>
                    <td><?php _e("The color of the Likes &amp; Comments. Any hex color code."); ?></td>
                    <td><code>[instagram-feed likescolor=#FF0000]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>likessize</td>
                    <td><?php _e("The size of the Likes &amp; Comments. Any number."); ?></td>
                    <td><code>[instagram-feed likessize=14]</code></td>
                </tr>

            </tbody>
        </table>

        <p><?php _e('Need help setting up the plugin? Check out our <a href="http://smashballoon.com/instagram-feed/free/" target="_blank">setup directions</a>'); ?></p>

    <?php } //End Display tab ?>


    <?php if( $sbi_active_tab == 'support' ) { //Start Support tab ?>

        <h3><?php _e('Setting up and Customizing the plugin'); ?></h3>
        <p><?php _e('<a href="https://smashballoon.com/instagram-feed/free/" target="_blank">Click here for step-by-step setup directions</a>'); ?></p>
        <p style="max-width: 960px;">See below for a short video demonstrating how to set up, customize and use the plugin. <b>Please note</b> that the video shows the set up and use of the <b><a href="https://smashballoon.com/instagram-feed/" target="_blank">PRO version</a></b> of the plugin, but the process is the same for this free version. The only difference is some of the features available.</p>
        <iframe class="youtube-video" src="//www.youtube.com/embed/3tc-UvcTcgk?theme=light&amp;showinfo=0&amp;controls=2" width="960" height="540" frameborder="0" allowfullscreen="allowfullscreen" style="border: 1px solid #ddd;"></iframe>

        <br />
        <br />
        <p><?php _e('Still need help? <a href="http://smashballoon.com/instagram-feed/support/" target="_blank">Request support</a>. Please include your <b>System Info</b> below with all support requests.'); ?></p>

        <h3><?php _e('System Info &nbsp; <i style="color: #666; font-size: 11px; font-weight: normal;">Click the text below to select all</i>'); ?></h3>


        <?php $sbi_options = get_option('sb_instagram_settings'); ?>
        <textarea readonly="readonly" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)." style="width: 100%; max-width: 960px; height: 500px; white-space: pre; font-family: Menlo,Monaco,monospace;">
## SITE/SERVER INFO: ##
Site URL:                 <?php echo site_url() . "\n"; ?>
Home URL:                 <?php echo home_url() . "\n"; ?>
WordPress Version:        <?php echo get_bloginfo( 'version' ) . "\n"; ?>
PHP Version:              <?php echo PHP_VERSION . "\n"; ?>
Web Server Info:          <?php echo $_SERVER['SERVER_SOFTWARE'] . "\n"; ?>

## ACTIVE PLUGINS: ##
<?php
$plugins = get_plugins();
$active_plugins = get_option( 'active_plugins', array() );

foreach ( $plugins as $plugin_path => $plugin ) {
    // If the plugin isn't active, don't show it.
    if ( ! in_array( $plugin_path, $active_plugins ) )
        continue;

    echo $plugin['Name'] . ': ' . $plugin['Version'] ."\n";
}
?>

## PLUGIN SETTINGS: ##
sb_instagram_plugin_type => Instagram Feed Free
<?php 
while (list($key, $val) = each($sbi_options)) {
    echo "$key => $val\n";
}
?>
        </textarea>

        
<?php 
} //End Support tab 
?>


    <hr />

    <a href="https://smashballoon.com/instagram-feed/demo" target="_blank" style="display: block; margin: 20px 0 0 0; float: left; clear: both;">
        <img src="<?php echo plugins_url( 'img/instagram-pro-promo.png' , __FILE__ ) ?>" alt="Instagram Feed Pro">
    </a>

</div> <!-- end #sbi_admin -->

<?php } //End Settings page

function sb_instagram_admin_style() {
        wp_register_style( 'sb_instagram_admin_css', plugin_dir_url( __FILE__ ) . 'css/sb-instagram-admin.css?2', false, '1.0.0' );
        wp_enqueue_style( 'sb_instagram_admin_css' );
        wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'sb_instagram_admin_style' );

function sb_instagram_admin_scripts() {
    wp_enqueue_script( 'sb_instagram_admin_js', plugin_dir_url( __FILE__ ) . 'js/sb-instagram-admin.js?2' );
    if( !wp_script_is('jquery-ui-draggable') ) { 
        wp_enqueue_script(
            array(
            'jquery',
            'jquery-ui-core',
            'jquery-ui-draggable'
            )
        );
    }
    wp_enqueue_script(
        array(
        'hoverIntent',
        'wp-color-picker'
        )
    );
}
add_action( 'admin_enqueue_scripts', 'sb_instagram_admin_scripts' );

// Add a Settings link to the plugin on the Plugins page
$sbi_plugin_file = 'instagram-feed/instagram-feed.php';
add_filter( "plugin_action_links_{$sbi_plugin_file}", 'sbi_add_settings_link', 10, 2 );
 
//modify the link by unshifting the array
function sbi_add_settings_link( $links, $file ) {
    $sbi_settings_link = '<a href="' . admin_url( 'admin.php?page=sb-instagram-feed' ) . '">' . __( 'Settings', 'sb-instagram-feed' ) . '</a>';
    array_unshift( $links, $sbi_settings_link );
 
    return $links;
}

?>