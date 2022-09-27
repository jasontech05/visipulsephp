<?php
/**
 * Visipulse Template Loader
*
 * @link       https://smartan.ca
 * @since      1.0.0
 *
 * @package    Visipulse
 * @subpackage Visipulse/public
 */

if (! class_exists('Visipulse_Template_Loader')) {
  if ( ! class_exists( 'Gamajo_Template_Loader' ) ) {
  require_once VISIPULSE_BASE_DIR . 'vendor/class-gamajo-template-loader.php';
}

/**
 * Template loader for Visipulse.
 *
 */
class Visipulse_Template_Loader extends Gamajo_Template_Loader {
  /**
   * Prefix for filter names.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $filter_prefix = 'visipulse';

  /**
   * Directory name where custom templates for this plugin should be found in the theme.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $theme_template_directory = 'visipulse';

  /**
   * Reference to the root directory path of this plugin.
   *
   * Can either be a defined constant, or a relative reference from where the subclass lives.
   *
   * In this case, `MEAL_PLANNER_PLUGIN_DIR` would be defined in the root plugin file as:
   *
   * ~~~
   * define( 'MEAL_PLANNER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
   * ~~~
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $plugin_directory = VISIPULSE_BASE_DIR ;

  /**
   * Directory name where templates are found in this plugin.
   *
   * Can either be a defined constant, or a relative reference from where the subclass lives.
   *
   * e.g. 'templates' or 'includes/templates', etc.
   *
   * @since 1.1.0
   *
   * @var string
   */
  protected $plugin_template_directory = 'templates';
}
}