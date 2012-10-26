<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 */
class FoundationThemeOptions 
{
    
    /**
     * Registers the settings with WordPress.
     * 
     * Used by hook: 'customize_register'
     * 
     * @see add_action('customize_register',$func)
     * @param WP_Customize_Manager $wp_customize
     */
    public static function register( $wp_customize )
    {

        $wp_customize->add_setting('header_bgcolor', array(
                'default'   => '#bbbbbb',
                //'transport' => 'postMessage',
        ) );
        //link colour
           $wp_customize->add_setting('link_color', array(
                'default'   => '#111',
                //'transport' => 'postMessage',
        ) );
           //highlight colour (alert-box)
           $wp_customize->add_setting('standard_box_color', array(
           		'default'   => '#2BA6CB',
           		//'transport' => 'postMessage',
           ) );
         $wp_customize->add_setting('footer_bgcolor', array(
                'default'   => '#bbbbbb',
                //'transport' => 'postMessage',
        ) );
           $wp_customize->add_setting('body_bgcolor', array(
                'default'   => '#ffffff',
                //'transport' => 'postMessage',
        ) );
         $wp_customize->add_setting('footer_textcolor', array(
                'default'   => '#ffffff',
                //'transport' => 'postMessage',
        ) );
         $wp_customize->add_setting('nav_color', array(
         		'default'   => '#333333',
         		//'transport' => 'postMessage',
         ) );
         $wp_customize->add_setting('nav_active_color', array(
         		'default'   => '#444444',
         		//'transport' => 'postMessage',
         ) );
         $wp_customize->add_setting('nav_text_color', array(
         		'default'   => '#FFFFFF',
         		//'transport' => 'postMessage',
         ) );
        $wp_customize->add_setting('header_hlcolor', array(
                'default'   => '#fffffb',
                //'transport' => 'postMessage',
        ) );
          $wp_customize->add_setting('display_header_area_on_frontpage', array(
                'default'   => true,
                'type'      => 'option'
                //'transport' => 'postMessage',
        ) );#
          $wp_customize->add_setting('hide_comments_closed_msg', array(
          		'default'   => false,
          		'type'      => 'option'
          		//'transport' => 'postMessage',
          ) );#
          $wp_customize->add_setting('hide_byline', array(
          		'default'   => false,
          		'type'      => 'option'
          		//'transport' => 'postMessage',
          ) );#
          
        $wp_customize->add_setting('display_header_area_on_subpages', array(
                'default'   => false,
                'type'      => 'option'
                //'transport' => 'postMessage',
        ) );#
          $wp_customize->add_setting('display_top_bar', array(
          		'default'   => true,
          		'type'      => 'option'
          		//'transport' => 'postMessage',
          ) );
        $wp_customize->add_setting('topbar_is_fixed', array(
                'default'   => true,
                'type'      => 'option'
                //'transport' => 'postMessage',
        ) );
         $wp_customize->add_setting('footer_is_fixed', array(
                'default'   => true,
                'type'      => 'option'
                //'transport' => 'postMessage',
        ) );
       // $wp_customize->remove_control('display_header_text');
      
$wp_customize->add_section( 'theme_header_settings', array(
        'title'          => 'Header and Footer',
        'priority'       => 2,
    ) );
$wp_customize->add_section( 'theme_element_settings', array(
		'title'          => 'Elements',
		'priority'       => 20,
) );

$wp_customize->add_control( 'hide_comments_closed_msg', array(
		'label'   => 'Hide "Comments closed" Message',
		'section' => 'theme_element_settings',
		'type'    => 'checkbox',
) );
$wp_customize->add_control( 'hide_byline', array(
		'label'   => 'Hide ByLine',
		'section' => 'theme_element_settings',
		'type'    => 'checkbox',
) );
    $wp_customize->add_control( 'display_header_area_on_frontpage', array(
        'label'   => 'Show Header on Home Page',
        'section' => 'theme_header_settings',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'display_header_area_on_subpages', array(
        'label'   => 'Show Header on other pages',
        'section' => 'theme_header_settings',
        'type'    => 'checkbox',
    ) );
    $wp_customize->add_control( 'display_top_bar', array(
    		'label'   => 'Display Top Bar',
    		'section' => 'theme_header_settings',
    		'type'    => 'checkbox',
    ) );
     $wp_customize->add_control( 'topbar_is_fixed', array(
        'label'   => 'Fixed Top bar',
        'section' => 'theme_header_settings',
        'type'    => 'checkbox',
    ) );
     $wp_customize->add_control( 'footer_is_fixed', array(
        'label'   => 'Fixed Footer',
        'section' => 'theme_header_settings',
        'type'    => 'checkbox',
    ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
                'label'      => __( 'Link Color' ),
                'section'    => 'colors',
                'settings'   => 'link_color',
        ) ) );
        //standard_box_color
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_box_color', array(
        		'label'      => __( 'Box Color' ),
        		'section'    => 'colors',
        		'settings'   => 'standard_box_color',
        ) ) );
        //nav color
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_color', array(
        		'label'      => __( 'Main Navigation Color' ),
        		'section'    => 'colors',
        		'settings'   => 'nav_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_text_color', array(
        		'label'      => __( 'Main Navigation Text Color' ),
        		'section'    => 'colors',
        		'settings'   => 'nav_text_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_active_color', array(
        		'label'      => __( 'Main Navigation Active Color' ),
        		'section'    => 'colors',
        		'settings'   => 'nav_active_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor', array(
                'label'      => __( 'Header Background Color' ),
                'section'    => 'theme_header_settings',
                'settings'   => 'header_bgcolor',
        ) ) );
             $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color', array(
                'label'      => __( 'Header Text Color' ),
                'section'    => 'theme_header_settings',
                'settings'   => 'header_hlcolor',
        ) ) );
         $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bgcolor', array(
                'label'      => __( 'Footer Background Color' ),
                'section'    => 'coltheme_header_settingsors',
                'settings'   => 'footer_bgcolor',
        ) ) );
          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_bgcolor', array(
                'label'      => __( 'Body Background Color' ),
                'section'    => 'colors',
                'settings'   => 'body_bgcolor',
        ) ) );
         $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_textcolor', array(
                'label'      => __( 'Footer Text Color' ),
                'section'    => 'theme_header_settings',
                'settings'   => 'footer_textcolor',
        ) ) );

        
    }
    
    /**
     * This will output the custom WordPress settings to the theme's WP head.
     * 
     * Used by hook: 'wp_head'
     * 
     * @see add_action('wp_head',$func)
     */
    public static function render()
    {
        ?>
        <!--Customizer CSS--> 
        <style type="text/css">
                 <?php self::generate_css('.header-wrapper', 'background-color', 'header_bgcolor'); ?>
                 <?php self::generate_css('#footer', 'background-color', 'footer_bgcolor'); ?>
                 <?php self::generate_css('#footer, #footer a', 'color', 'footer_textcolor'); ?>
                 <?php self::generate_css('div.alert-box',  'background-color', 'standard_box_color'); ?>           
                 <?php self::generate_css('ul.sub-nav li.current_page_item', 'border-color', 'header_bgcolor'); ?>
                 <?php self::generate_css('a, a:visited, a:active, a:hover', 'color', 'link_color'); ?>
                 <?php self::generate_css('.header-wrapper .header-name a, .header-wrapper .header-description', 'color', 'header_hlcolor'); ?>
       			 <?php self::generate_css('ul.nav-bar, ul.nav-bar li', 'background-color', 'nav_color'); ?>
       			 <?php self::generate_css('ul.nav-bar, ul.nav-bar li a,  ul.nav-bar li.active a:hover ', 'color', 'nav_text_color'); ?>
       			 <?php self::generate_css('ul.nav-bar li.active, ul.nav-bar li.active:hover, ul.nav-bar li:hover', 'background-color', 'nav_active_color'); ?>
       			 <?php self::generate_css('ul.nav-bar li.active, ul.nav-bar li.active:hover, ul.nav-bar li:hover, .nav-bar li:last-child', 'border-color', 'nav_active_color'); ?>
     			 <?php self::generate_css('ul.nav-bar li', 'border-color', 'nav_color'); ?>
     			 <?php self::generate_css('body, html', 'background-color', 'body_bgcolor'); ?>
     			 
        <?php
           if (get_option( 'hide_comments_closed_msg') == 1){
        	?>
        	.nocomments{
        		display:none;
        	}
        	<?php } 
        	 if (get_option( 'footer_is_fixed') == 1){
            ?>
            .footer{
                position: fixed;
                bottom:0px;
                left:0px;
                right:0px;
                z-index:100;
            }
            <?php } ?>
       			 <?php
           if (get_option( 'hide_byline') == 1){
        	?>
        	.byline{
        		display:none;
        	}
        	<?php } ?>
        </style> 
        <!--/Customizer CSS-->
        <?php  
        
             if (get_option( 'footer_is_fixed') == 1){
            ?>
            <script type="text/javascript">
                jQuery('document').ready(function(){
                    jQuery('body').css('margin-bottom', jQuery('#footer').height()+'px');
                });
            </script>
            <?php } ?>
            
            
       <?php 
    }
	
	
	
        /**
         * This will generate a line of CSS for use in header output. If the setting
         * ($mod_name) has no defined value, the CSS will not be output.
         *
         * A custom helper function used within this class to keep code clean.
         *
         * @uses get_theme_mod()
         * @param string $selector CSS selector
         * @param string $style The name of the CSS property to modify
         * @param string $mod_name The name of the theme_mod option to fetch
         * @param string $prefix Optional. Anything that needs to be output before the CSS property
         * @param string $postfix Optional. Anything that needs to be output after the CSS property
         * @param bool $echo Optional. Whether to print directly to the page (default: true).
         * @return string Returns a single line of CSS with selectors and a property.
         * @since Nouveau 1.0
         */
        public static function generate_css($selector,$style,$mod_name,$prefix='',$postfix='',$echo=true)
        {
        	$return = '';
        	$mod = get_theme_mod($mod_name);
        	if ( ! empty( $mod ) )
        	{
        		$return = sprintf('%s { %s:%s; }',
        				$selector,
        				$style,
        				$prefix.$mod.$postfix
        		);
        		if ( $echo )
        		{
        			echo $return . "\n\r";
        		}
        	}
        	return $return;
        }

}
add_action( 'customize_register'    , array( 'FoundationThemeOptions' , 'register' ) );
add_action( 'wp_head'               , array( 'FoundationThemeOptions' , 'render' ) );
