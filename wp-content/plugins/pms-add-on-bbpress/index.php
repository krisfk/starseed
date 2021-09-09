<?php
/**
 * Plugin Name: Paid Member Subscriptions - bbPress Add-on
 * Plugin URI: http://www.cozmoslabs.com/
 * Description: Integrates Paid Member Subscriptions with bbPress by allowing you to restrict forums, topics and replies.
 * Version: 1.0.2
 * Author: Cozmoslabs, Mihai Iova
 * Author URI: http://www.cozmoslabs.com/
 * Text Domain: pms-add-on-bbpress
 * License: GPL2
 *
 * == Copyright ==
 * Copyright 2017 Cozmoslabs (www.cozmoslabs.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// Return if PMS is not active
if( ! defined( 'PMS_VERSION' ) ) return;


Class PMS_bbPress {

    /**
     * Constructor
     *
     */
    public function __construct() {

        define( 'PMS_BBPRESS_VERSION', '1.0.2' );
        define( 'PMS_BBPRESS_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
        define( 'PMS_BBPRESS_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

        $this->load_dependencies();
        $this->init();

    }

    /**
     * Initialise plugin components
     *
     */
    private function init() {

    }

    /**
     * Load needed files
     *
     */
    private function load_dependencies() {

    	// Admin pages
    	if( file_exists( PMS_BBPRESS_PLUGIN_DIR_PATH . 'includes/admin/functions-admin-pages.php' ) )
            include PMS_BBPRESS_PLUGIN_DIR_PATH . 'includes/admin/functions-admin-pages.php';

        // Meta-boxes
        if( file_exists( PMS_BBPRESS_PLUGIN_DIR_PATH . 'includes/admin/meta-boxes/functions-meta-box-content-restriction.php' ) )
            include PMS_BBPRESS_PLUGIN_DIR_PATH . 'includes/admin/meta-boxes/functions-meta-box-content-restriction.php';

        // Content restriction
        if( file_exists( PMS_BBPRESS_PLUGIN_DIR_PATH . 'includes/functions-content-restriction.php' ) )
            include PMS_BBPRESS_PLUGIN_DIR_PATH . 'includes/functions-content-restriction.php';

    }

}

// Let's get this party started
function pms_bbp_init() {

	if( class_exists( 'bbPress' ) )
		new PMS_bbPress;

	else
        add_action( 'admin_notices', 'pms_bbp_admin_notice' );

}
add_action( 'plugins_loaded', 'pms_bbp_init', 11 );


/**
 * Admin notice if bbPress plugin is not active
 *
 */
function pms_bbp_admin_notice() {

    echo '<div class="update-nag">';
        echo __( 'bbPress needs to be installed and activated for Paid Member Subscriptions - bbPress Add-on to work as expected!', 'paid-member-subscriptions' );
    echo '</div>';

}


/**
 * Update checker
 *
 */
if( class_exists( 'pms_PluginUpdateChecker' ) ) {
    $slug = 'bbpress';
    $localSerial = get_option( $slug . '_serial_number' );
    $pms_bbpress_update = new pms_PluginUpdateChecker('http://updatemetadata.cozmoslabs.com/?localSerialNumber=' . $localSerial . '&uniqueproduct=CLPMSBBP', __FILE__, $slug );
}
