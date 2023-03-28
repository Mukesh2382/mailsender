<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mukesh.com
 * @since             1.0.0
 * @package           Mailsender
 *
 * @wordpress-plugin
 * Plugin Name:       mailsender
 * Plugin URI:        https://mymailsender.com
 * Description:       This plugin sends daily mail reminder
 * Version:           1.0.0
 * Author:            Mukesh
 * Author URI:        https://mukesh.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mailsender
 * Domain Path:       /languages
 */
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('MAILSENDER_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mailsender-activator.php
 */
function activate_mailsender()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-mailsender-activator.php';
	Mailsender_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mailsender-deactivator.php
 */
function deactivate_mailsender()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-mailsender-deactivator.php';
	Mailsender_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_mailsender');
register_deactivation_hook(__FILE__, 'deactivate_mailsender');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-mailsender.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */



function run_mailsender()
{

	$plugin = new Mailsender();
	$plugin->run();
}
run_mailsender();
