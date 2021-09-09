<?php
/**
 * Plugin Name: Paid Member Subscriptions - Fixed Period Membership
 * Plugin URI: http://www.cozmoslabs.com/
 * Description: The Fixed Period Membership Add-On allows your Subscriptions to end at a specific date, no matter when a client subscribes to it.
 * Version: 1.0.2
 * Author: Cozmoslabs, Mihai Iova
 * Author URI: http://www.cozmoslabs.com/
 * Text Domain: paid-member-subscriptions
 * License: GPL2
 *
 * == Copyright ==
 * Copyright 2018 Cozmoslabs (www.cozmoslabs.com)
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

Class PMS_Member_Subscriptions_Fixed_Period {

    /**
     * Constructor
     *
     */
    public function __construct() {

        define( 'PMS_MSFP_VERSION', '1.0.2' );
        define( 'PMS_MSFP_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
        define( 'PMS_MSFP_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

        $this->load_dependencies();
        $this->init();

    }

    private function init() {

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

    }


    /**
     * Load needed files
     *
     */
    private function load_dependencies() {

        // Admin page
        if( file_exists( PMS_MSFP_PLUGIN_DIR_PATH . 'includes/admin/functions-admin-pages.php' ) )
            include PMS_MSFP_PLUGIN_DIR_PATH . 'includes/admin/functions-admin-pages.php';

        // Gateway class and gateway functions
        if( file_exists( PMS_MSFP_PLUGIN_DIR_PATH . 'includes/functions.php' ) )
            include PMS_MSFP_PLUGIN_DIR_PATH . 'includes/functions.php';

    }


    /**
     * Enqueue admin scripts
     *
     */
    public function enqueue_admin_scripts( $hook ) {

        if( get_post_type() == 'pms-subscription' ) {

            wp_enqueue_script( 'jquery-ui-datepicker' );
            wp_enqueue_style( 'jquery-ui-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css', array(), PMS_MSFP_VERSION );

            wp_enqueue_script( 'pms-msfed-admin-script', PMS_MSFP_PLUGIN_DIR_URL . 'assets/js/admin.js', array('jquery'), PMS_MSFP_VERSION );

        }

    }

}

// Let's get this party started
new PMS_Member_Subscriptions_Fixed_Period;


if( class_exists( 'pms_PluginUpdateChecker' ) ) {
    $slug = 'fixed-period-membership';
    $localSerial = pms_get_serial_number();
    $pms_stripe_update = new pms_PluginUpdateChecker('http://updatemetadata.cozmoslabs.com/?localSerialNumber=' . $localSerial . '&uniqueproduct=CLPMSFPM', __FILE__, $slug );
}
