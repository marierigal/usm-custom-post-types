<?php
/**
 * USM Plugin
 *
 * @package      USMPlugin
 * @author       Marie Rigal
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:  USM Plugin
 * Author:       Marie Rigal
 * Description:  Custom post types for the USM website
 * Author URI:   https://github.com/marierigal
 * Version:      1.0.0
 * License:      GNU General Public License v3
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:  usm-plugin
 * Domain Path:  /languages
 */

require_once(plugin_dir_path( __FILE__ ) . '/config/constants.php');
require_once(plugin_dir_path(__FILE__) . '/php/players/player-post-type.php');

function usmp_admin_styles(){
  global $typenow;
  if ($typenow == 'usmp_player') {
    wp_enqueue_style('usmp_meta_box_styles', plugin_dir_url(__FILE__) . '/assets/css/meta-box-styles.css');
  }
}
add_action('admin_print_styles', 'usmp_admin_styles');
