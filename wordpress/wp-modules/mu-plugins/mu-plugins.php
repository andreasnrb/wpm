<?php

class MU_Plugins extends WP_Module {
    function run() {
    }
    /**
     * Load the Must User Plugins
     */
    function load_mu_plugins() {
        /**
         * Load must-use plugins.
         */
        foreach ( self::get_mu_plugins() as $mu_plugin ) {
            include_once( $mu_plugin );
        }
        /**
         * Load network activated plugins.
         */
        if ( is_multisite() ) {
            foreach( wp_get_active_network_plugins() as $network_plugin ) {
                wp_register_plugin_realpath( $network_plugin );
                include_once( $network_plugin );
            }
        }
        /**
         * Fires once all must-use and network-activated plugins have loaded.
         *
         * @since 2.8.0
         */
        do_action( 'muplugins_loaded' );
    }

    static function get_mu_plugins() {
        $mu_plugins = array();
        if ( !is_dir( WPMU_PLUGIN_DIR ) )
            return $mu_plugins;
        if ( ! $dh = opendir( WPMU_PLUGIN_DIR ) )
            return $mu_plugins;
        while ( ( $plugin = readdir( $dh ) ) !== false ) {
            if ( substr( $plugin, -4 ) == '.php' )
                $mu_plugins[] = WPMU_PLUGIN_DIR . '/' . $plugin;
        }
        closedir( $dh );
        sort( $mu_plugins );

        return $mu_plugins;
    }
}

/**
 * Retrieve an array of must-use plugin files.
 *
 * The default directory is wp-content/mu-plugins. To change the default
 * directory manually, define `WPMU_PLUGIN_DIR` and `WPMU_PLUGIN_URL`
 * in wp-config.php.
 *
 * @since 3.0.0
 * @access private
 *
 * @return array Files to include.
 */
function wp_get_mu_plugins() {
    return MU_Plugins::get_mu_plugins();
}