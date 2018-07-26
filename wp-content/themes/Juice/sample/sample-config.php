<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "opt_settings";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Juice Option', 'redux-framework-demo' ),
        'page_title'           => __( 'Juice Option', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
    // General
        Redux::setSection( $opt_name, array(
            'title' => __( 'General', 'redux-framework-demo' ),
            'id'    => 'g',
            'desc'  => __( '', 'redux-framework-demo' ),
            'icon'  => 'el el-cogs'
        ) );
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Logo', 'redux-framework-demo' ),
            'id'         => 'g-logo',
            'desc'       => __( 'Upload for Logo', 'redux-framework-demo' ),
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'llogo',
                    'type'     => 'media',
                    'title'    => __( 'Add Light Logo', 'redux-framework-demo' ),
                    'subtitle' => __( 'For Light Logo', 'redux-framework-demo' ),
                    // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                ),
                array(
                    'id'       => 'dlogo',
                    'type'     => 'media',
                    'title'    => __( 'Add Dark Logo', 'redux-framework-demo' ),
                    'subtitle' => __( 'For Dark Logo', 'redux-framework-demo' ),
                ),
            )
        ));
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Background', 'redux-framework-demo' ),
            'id'         => 'g-bg',
            'desc'       => __( 'Upload for Background', 'redux-framework-demo' ),
            'subsection' => true,
            'fields'     => array(
                // First Section -> Home
                array(
                    'id'       => 'homebg',
                    'type'     => 'media',
                    'title'    => __( 'Add Home Background', 'redux-framework-demo' ),
                    'subtitle' => __( 'For Index / Home', 'redux-framework-demo' ),
                    // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                ),
                array(
                    'id'       => 'webtitle',
                    'type'     => 'media',
                    'title'    => __( 'Title Website', 'redux-framework-demo' ),
                    //'subtitle' => __( 'For About Us', 'redux-framework-demo' ),
                ),
                // Section Menu -> Home
                array(
                    'id'       => 'menubg',
                    'type'     => 'media',
                    'title'    => __( 'Add Menu Background', 'redux-framework-demo' ),
                    'subtitle' => __( 'For Menu Section', 'redux-framework-demo' ),
                    // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                ),
                array(
                    'id'       => 'menutitle',
                    'type'     => 'media',
                    'title'    => __( 'Title Menu', 'redux-framework-demo' ),
                    // 'subtitle' => __( 'For Menu Section', 'redux-framework-demo' ),
                    // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                ),
                // Wave
                array(
                    'id'       => 'wavebg',
                    'type'     => 'media',
                    'title'    => __( 'Wave Background', 'redux-framework-demo'),
                    'subtitle' => __( 'This for wave effect bg', 'redux-framework-demo'),
                ),
                array(
                    'id'       => 'wavedownbg',
                    'type'     => 'media',
                    'title'    => __( 'Wave Down Background', 'redux-framework-demo'),
                    'subtitle' => __( 'This for wave down effect bg', 'redux-framework-demo'),
                ),
                // Footer
                array(
                    'id'       => 'footer',
                    'type'     => 'media',
                    'title'    => __( 'Footer Background', 'redux-framework-demo'),
                    //'subtitle' => __( 'This for wave effect bg', 'redux-framework-demo'),
                ),

            )
        ));
    // Second Section
        Redux::setSection( $opt_name, array(
            'title' => __( 'Second Section', 'redux-framework-demo' ),
            'id'    => 'ss',
            'desc'  => __( '', 'redux-framework-demo' ),
            'icon'  => 'el el-cogs'
        ) );
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Smoothie Image', 'redux-framework-demo' ),
            'id'         => 'ss-bg',
            'desc'       => __( 'Upload for Image', 'redux-framework-demo' ),
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'juice-bg',
                    'type'     => 'media',
                    'title'    => __( 'Add Juice Image', 'redux-framework-demo' ),
                    // 'subtitle' => __( 'For Index / Home', 'redux-framework-demo' ),
                    // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                ),
                array(
                    'id'       => 'small-ico',
                    'type'     => 'media',
                    'title'    => __( 'Add Small Icon', 'redux-framework-demo' ),
                    'subtitle' => __( 'For icon on top slider Fav menu', 'redux-framework-demo' ),
                    // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                ),
            )
        ));
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Description', 'redux-framework-demo' ),
            'id'         => 'ss-desc',
            'desc'       => __( 'Upload for your Description Smoothies', 'redux-framework-demo' ),
            'subsection' => true,
            'fields'     => array(
                // Desc Type 1
                    array(
                        'id'       => 'img-desc1',
                        'type'     => 'media',
                        'title'    => __( 'Desc 1 Icon ', 'redux-framework-demo' ),
                        // 'subtitle' => __( 'For Index / Home', 'redux-framework-demo' ),
                        // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                    ),
                    array(
                        'id'       => 'title-desc1',
                        'type'     => 'text',
                        'title'    => __( 'Title 1', 'redux-framework-demo' ),
                    ),
                    array(
                        'id'       => 'desc1',
                        'type'     => 'textarea',
                        'title'    => __( 'Desc 1 ', 'redux-framework-demo' ),
                    ),
                // Desc Type 2
                    array(
                        'id'       => 'img-desc2',
                        'type'     => 'media',
                        'title'    => __( 'Desc 2 Icon', 'redux-framework-demo' ),
                        // 'subtitle' => __( 'For Index / Home', 'redux-framework-demo' ),
                        // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                    ),
                    array(
                        'id'       => 'title-desc2',
                        'type'     => 'text',
                        'title'    => __( 'Title 2', 'redux-framework-demo' ),
                    ),
                    array(
                        'id'       => 'desc2',
                        'type'     => 'textarea',
                        'title'    => __( 'Desc 2', 'redux-framework-demo' ),
                    ),
                // Desc Type 3
                    array(
                        'id'       => 'img-desc3',
                        'type'     => 'media',
                        'title'    => __( 'Desc 3 Icon ', 'redux-framework-demo' ),
                        // 'subtitle' => __( 'For Index / Home', 'redux-framework-demo' ),
                        // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                    ),
                    array(
                        'id'       => 'title-desc3',
                        'type'     => 'text',
                        'title'    => __( 'Title 3', 'redux-framework-demo' ),
                    ),
                    array(
                        'id'       => 'desc3',
                        'type'     => 'textarea',
                        'title'    => __( 'Desc 3', 'redux-framework-demo' ),
                    ),
            )
        ));
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Best Menu', 'redux-framework-demo' ),
            'id'         => 'ss-bm',
            'desc'       => __( 'Upload your Best Menu', 'redux-framework-demo' ),
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'title-menu',
                    'type'     => 'text',
                    'title'    => __( 'Add Title Best Menu', 'redux-framework-demo' ),
                    'subtitle' => __( 'For Best Menu Title', 'redux-framework-demo' ),
                    // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                ),
                array(
                    'id'       => 'subtitle-menu',
                    'type'     => 'textarea',
                    'title'    => __( 'Sub Title', 'redux-framework-demo' ),
                    'subtitle' => __( 'For Best Menu Sub Title', 'redux-framework-demo' ),
                    // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                ),
                array(
                    'id'       => 'best-menu',
                    'type'     => 'gallery',
                    'title'    => __('Upload your Best Menu Image Here', 'redux-framework-demo'),
                    'subtitle' => __('LMAO','redux-framework-demo'),
                ),
            )
        ));
    // Section Menu
        Redux::setSection( $opt_name, array(
            'title' => __( 'Menu Section', 'redux-framework-demo' ),
            'id'    => 'ms',
            'desc'  => __( '', 'redux-framework-demo' ),
            'icon'  => 'el el-cogs',
            'fields'     => array(
                array(
                    'id'       => 'menu',
                    'type'     => 'slides',
                    'title'    => __( 'Add Juice Menu', 'redux-framework-demo' ),
                    'subtitle' => __( 'Input Price on url columns', 'redux-framework-demo' ),
                    // 'desc'     => __( 'Input Price on url columns', 'redux-framework-demo' ),
                ),
            )

        ) );
    //  Taste Galery
        Redux::setSection( $opt_name, array(
            'title' => __( 'Taste Galery', 'redux-framework-demo' ),
            'id'    => 'tg',
            'desc'  => __( '', 'redux-framework-demo' ),
            'icon'  => 'el el-cogs',
        ) );
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Taste', 'redux-framework-demo' ),
            'id'         => 'tg-wrapper',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id' => 'taste-title',
                    'title' => __('Title', 'redux-framework-demo'),
                    'type' => 'editor'
                ),
                array(
                    'id' => 'taste-subtitle',
                    'title' => __('Subtitle', 'redux-framework-demo'),
                    'type' => 'textarea'
                )
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Galery', 'redux-framework-demo' ),
            'id'         => 'tg-galery',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'    => 'small-ico2',
                    'title' => __('Small Icon', 'redux-framework-demo'),
                    'type'  => 'media'
                ),
                array(
                    'id'    => 'taste-bg',
                    'title' => __('Background', 'redux-framework-demo'),
                    'type'  => 'media'
                ),
                array(
                    'id'    => 'taste-gallery',
                    'title' => __('gallery', 'redux-framework-demo'),
                    'type'  => 'gallery'
                ),
            )
        ) );
    // Social Media
        Redux::setSection( $opt_name, array(
            'title' => __( 'Social Media', 'redux-framework-demo' ),
            'id'    => 'sm',
            'desc'  => __( '', 'redux-framework-demo' ),
            'icon'  => 'el el-address-book',
        ));
        // Facebook
            Redux::setSection( $opt_name, array(
                'title'      => __( 'Facebook', 'redux-framework-demo' ),
                'id'         => 'sm-fb',
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id'       => 'facebook',
                        'type'     => 'text',
                        'title'    => __( 'Facebook', 'redux-framework-demo' ),
                        //'subtitle' => __( 'Submit your facebook link', 'redux-framework-demo' ),
                        'desc'     => __( 'Submit your facebook link without (www / http://)', 'redux-framework-demo' ),
                    ),
                )
            ));
        // Twitter
            Redux::setSection( $opt_name, array(
                'title'      => __( 'Twitter', 'redux-framework-demo' ),
                'id'         => 'sm-tt',
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id'       => 'twitter',
                        'type'     => 'text',
                        'title'    => __( 'Twitter', 'redux-framework-demo' ),
                        //'subtitle' => __( 'Submit your Twitter link', 'redux-framework-demo' ),
                        'desc'     => __( 'Submit your Twitter link without (www / http://)', 'redux-framework-demo' ),
                    ),
                )
            ));
        // Instagram
            Redux::setSection( $opt_name, array(
                'title'      => __( 'Instagram', 'redux-framework-demo' ),
                'id'         => 'sm-ig',
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id'       => 'instagram',
                        'type'     => 'text',
                        'title'    => __( 'Instagram', 'redux-framework-demo' ),
                        //'subtitle' => __( 'Submit your Instagram link', 'redux-framework-demo' ),
                        'desc'     => __( 'Submit your Instagram link without (www / http://)', 'redux-framework-demo' ),
                    ),
                )
            ));    
    // About Us
        Redux::setSection( $opt_name, array(
            'title' => __( 'About Us', 'redux-framework-demo' ),
            'id'    => 'au',
            'desc'  => __( '', 'redux-framework-demo' ),
            'icon'  => 'el el-cogs'
        ) );
        Redux::setSection( $opt_name, array(
            'title' => __( 'Image', 'redux-framework-demo' ),
            'id'    => 'ab-image',
            'desc'  => __( 'Upload All image need in About Us page here', 'redux-framework-demo' ),
            'subsection' => true,
            'fields' => array(
                array(
                    'title'  => __('Background'),
                    'subtitle'   => __( 'HAHAHA', 'redux-framework-demo' ),
                    'id'     => 'ab-bg',
                    'type'   => 'media'
                ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title' => __( 'Type', 'redux-framework-demo' ),
            'desc'   => __( 'just ignore url field ok? >_<'),
            'id'    => 'ab-type-wraper',
            'subsection' => true,
            'fields' => array(
                array(
                    'id'     => 'ab-type',
                    'type'   => 'slides'
                ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title' => __( 'Content', 'redux-framework-demo' ),
            'desc'   => __( ''),
            'id'    => 'ab-content',
            'subsection' => true,
            'fields' => array(
                array(
                    'title'  => __('Smoothies Image'),
                    'subtitle'   => __( '', 'redux-framework-demo' ),
                    'id'     => 'ab-smbg',
                    'type'   => 'media'
                ),
                array(
                    'title'  => __('Smoothies Title'),
                    'id'     => 'ab-cont-title',
                    'type'   => 'text'
                ),
                array(
                    'title'  => __('Smoothies Description'),
                    'id'     => 'ab-cont-desc',
                    'type'   => 'textarea'
                ),
            )
        ) );
    //  Menu
        Redux::setSection( $opt_name, array(
            'title' => __( 'Menu', 'redux-framework-demo' ),
            'id'    => 'menu',
            'desc'  => __( '', 'redux-framework-demo' ),
            'icon'  => 'el el-cogs',
            'fields'=> array(
                array(
                    'title'  => __('Background'),
                    'subtitle'   => __( 'HAHAHA' ),
                    'id'     => 'menu-bg',
                    'type'   => 'media'
                ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title' => __( 'List Menu 1' ),
            'desc'   => __( 'Menu 1'),
            'id'    => 'menu-1',
            'subsection' => true,
            'fields' => array(
                array(
                    'id'     => 'menu-list-title-1',
                    'type'   => 'media'
                ),
                array(
                    'id'     => 'menu-list-1',
                    'type'   => 'slides'
                ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title' => __( 'List Menu 2' ),
            'desc'   => __( 'Menu 2'),
            'id'    => 'menu-2',
            'subsection' => true,
            'fields' => array(
                array(
                    'id'     => 'menu-list-title-2',
                    'type'   => 'media'
                ),
                array(
                    'id'     => 'menu-list-2',
                    'type'   => 'slides'
                ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title' => __( 'List Menu 3' ),
            'desc'   => __( 'Menu 3'),
            'id'    => 'menu-3',
            'subsection' => true,
            'fields' => array(
                array(
                    'id'     => 'menu-list-title-3',
                    'type'   => 'media'
                ),
                array(
                    'id'     => 'menu-list-3',
                    'type'   => 'slides'
                ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title' => __( 'List Menu 4' ),
            'desc'   => __( 'Menu 4'),
            'id'    => 'menu-4',
            'subsection' => true,
            'fields' => array(
                array(
                    'id'     => 'menu-list-title-4',
                    'type'   => 'media'
                ),
                array(
                    'id'     => 'menu-list-4',
                    'type'   => 'slides'
                ),
            )
        ) );
    //  Contact
        Redux::setSection($opt_name, array(
            'title'            =>__('Contact', 'reduxframework'),
            'id'               =>'c',
            'desc'             => __( 'These are really basic fields!' ),
            'icon'             => 'el el-cogs',
            'fields'           => array(
                array(
                    'id'        => 'gm',
                    'type'      => 'textarea',
                    'title'     => 'Google Maps',
                    'desc'      => 'Change Width to 100% if you want it to full screen'
                ),
                array(
                    'id'       => 'c-title',
                    'type'     => 'text',
                    'title'    => 'Title',
                ),
                array(
                    'id'       => 'c-desc',
                    'type'     => 'textarea',
                    'title'    => 'Description',
                ),
                array(
                    'id' => 'c-email',
                    'type'   => 'text',
                    'title' => 'Email',
                ),
                array(
                    'id' => 'c-phone',
                    'type'   => 'text',
                    'title' => 'Phone',
                ),
                array(
                    'id' => 'c-resume',
                    'type'   => 'text',
                    'title' => 'Resume',
                ),
            )
        ));
    // Footer
        Redux::setSection($opt_name, array(
            'title'            =>__('Footer Section', 'reduxframework'),
            'id'               =>'f',
            'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
            'icon'             => 'el el-cogs',
            'fields'           => array(
                array(
                    'title'    => __( 'Number', 'redux-framework-demo' ),
                    'desc'     => __( 'input your phone number here', 'redux-framework-demo' ),
                    'id'       => 'number',
                    'type'     => 'text',
                ),
                array(
                    'title'    => __( 'Email', 'redux-framework-demo' ),
                    'desc'     => __( 'input your email here', 'redux-framework-demo' ),
                    'id'       => 'email',
                    'type'     => 'text',
                ),
            )
        ));
    //Design Fireld
        Redux::setSection( $opt_name, array(
        'title' => __( 'Design Fields', 'redux-framework-demo' ),
        'id'    => 'design',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-wrench'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Background', 'redux-framework-demo' ),
        'id'         => 'design-background',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-background',
                'type'     => 'background',
                'output'   => array( 'body' ),
                'title'    => __( 'Body Background', 'redux-framework-demo' ),
                'subtitle' => __( 'Body background with image, color, etc.', 'redux-framework-demo' ),
                //'default'   => '#FFFFFF',
            ),

        ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/background/" target="_blank">docs.reduxframework.com/core/fields/background/</a>',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Border', 'redux-framework-demo' ),
        'id'         => 'design-border',
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/border/" target="_blank">docs.reduxframework.com/core/fields/border/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-header-border',
                'type'     => 'border',
                'title'    => __( 'Header Border Option', 'redux-framework-demo' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'redux-framework-demo' ),
                'output'   => array( '.site-header' ),
                // An array of CSS selectors to apply this font style to
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'default'  => array(
                    'border-color'  => '#1e73be',
                    'border-style'  => 'solid',
                    'border-top'    => '3px',
                    'border-right'  => '3px',
                    'border-bottom' => '3px',
                    'border-left'   => '3px'
                )
            ),
            array(
                'id'       => 'opt-header-border-expanded',
                'type'     => 'border',
                'title'    => __( 'Header Border Option', 'redux-framework-demo' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'redux-framework-demo' ),
                'output'   => array( '.site-header' ),
                'all'      => false,
                // An array of CSS selectors to apply this font style to
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'default'  => array(
                    'border-color'  => '#1e73be',
                    'border-style'  => 'solid',
                    'border-top'    => '3px',
                    'border-right'  => '3px',
                    'border-bottom' => '3px',
                    'border-left'   => '3px'
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Dimensions', 'redux-framework-demo' ),
        'id'         => 'design-dimensions',
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/dimensions/" target="_blank">docs.reduxframework.com/core/fields/dimensions/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'             => 'opt-dimensions',
                'type'           => 'dimensions',
                'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => __( 'Dimensions (Width/Height) Option', 'redux-framework-demo' ),
                'subtitle'       => __( 'Allow your users to choose width, height, and/or unit.', 'redux-framework-demo' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Width, Height, or Units.', 'redux-framework-demo' ),
                'default'        => array(
                    'width'  => 200,
                    'height' => 100,
                )
            ),
            array(
                'id'             => 'opt-dimensions-width',
                'type'           => 'dimensions',
                'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => __( 'Dimensions (Width) Option', 'redux-framework-demo' ),
                'subtitle'       => __( 'Allow your users to choose width, height, and/or unit.', 'redux-framework-demo' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Width, Height, or Units.', 'redux-framework-demo' ),
                'height'         => false,
                'default'        => array(
                    'width'  => 200,
                    'height' => 100,
                )
            ),
        )
    ) );
        
    // End


    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

