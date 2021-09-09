<?php
/**
 * Plugin Name: Paid Member Subscriptions - Navigation Menu Filtering
 * Plugin URI: https://www.cozmoslabs.com/
 * Description: Dynamically display menu items based on logged-in status as well as selected subscription plans.
 * Version: 1.1.0
 * Author: Cozmoslabs, Madalin Ungureanu
 * Author URI: https://www.cozmoslabs.com
 * License: GPL2
 */
/*  Copyright 2015 Cozmoslabs (www.cozmoslabs.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

    This add-on plugin is based on the "Nav Menu Roles" plugin: https://wordpress.org/plugins/nav-menu-roles/

*/

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) )
    exit;

// Return if PMS is not active
if( ! defined( 'PMS_VERSION' ) )
    return;

/*
* Define plugin path
*/
define( 'PMS_NMF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PMS_NMF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PMS_NMF_VERSION', '1.1.0' );


if( file_exists( PMS_NMF_PLUGIN_DIR . 'class-pms_walker_nav_menu.php' ) )
    include_once PMS_NMF_PLUGIN_DIR . 'class-pms_walker_nav_menu.php';

if( file_exists( PMS_NMF_PLUGIN_DIR . 'class-nav-menu-filtering.php' ) )
    include_once PMS_NMF_PLUGIN_DIR . 'class-nav-menu-filtering.php';

if( class_exists( 'pms_PluginUpdateChecker' ) ) {
    $slug = 'navigation-menu-filtering';
    $localSerial = get_option( $slug . '_serial_number');
    $pms_nmf_update = new pms_PluginUpdateChecker('http://updatemetadata.cozmoslabs.com/?localSerialNumber=' . $localSerial . '&uniqueproduct=CLPMSNMF', __FILE__, $slug );
}
