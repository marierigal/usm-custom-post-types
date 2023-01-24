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

require_once(plugin_dir_path(__FILE__) . '/config/constants.php');
require_once(plugin_dir_path(__FILE__) . '/php/players/player-post-type.php');
require_once(plugin_dir_path(__FILE__) . '/php/sponsors/sponsor-post-type.php');

// Add inline CSS in the admin head with the style tag
function usmp_admin_styles() {
  global $typenow;
  if ($typenow == 'usmp_player' || $typenow == 'usmp_sponsor') {
    echo '<style type="text/css" id="usmp_admin_styles">
.usmp-form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.usmp-form__control {
  display: flex;
  align-items: center;
  gap: 16px;
}

.usmp-form__control label {
  min-width: 140px;
}

.usmp-form__control input,
.usmp-form__control select,
.usmp-form__control textarea {
  min-width: 280px;
}
</style>';
  }
}
add_action( 'admin_head', 'usmp_admin_styles' );
