<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * local_ganalytics
 *
 * @author      Fred Woolard <woolardfa@appstate.edu>
 * @copyright   (c) 2018 Appalachian State Universtiy, Boone, NC
 * @license     GNU General Public License version 3
 * @package     local_ganalytics
 */

defined('MOODLE_INTERNAL') || die();


/* Included from (plugininfo)local::load_settings(). Globals
 * declared: $CFG, $USER, $DB, $OUTPUT, and $PAGE. Three args
 * passed into the function: $adminroot, $parentnodename, and
 * $hassiteconfig. Local scoped variables assigned:
 * $plugininfo = $this,
 * $ADMIN = $adminroot.
 */

if ($hassiteconfig) {

    $settings = new admin_settingpage('local_ganalytics', get_string('settingspage', 'local_ganalytics'));
    $ADMIN->add('localplugins', $settings);

    $adminsetting = new admin_setting_heading(
        'local_ganalytics/property',
        get_string('property_lbl',  'local_ganalytics'),
        get_string('property_desc', 'local_ganalytics'));
    $settings->add($adminsetting);
    unset($adminsetting);

    $adminsetting = new admin_setting_configtext_with_maxlength(
        'local_ganalytics/propertyid',
        get_string('propertyid_lbl',  'local_ganalytics'),
        get_string('propertyid_desc', 'local_ganalytics'),
        '', PARAM_ALPHANUMEXT, 20, 20);
    $settings->add($adminsetting);
    unset($adminsetting);

    $adminsetting = new admin_setting_configselect(
        'local_ganalytics/template',
        get_string('template_lbl',  'local_ganalytics'),
        get_string('template_desc', 'local_ganalytics'),
        'analyticsjs', array('analyticsjs' => 'Universal Analytics (analyticsjs)', 'gtagjs' => 'Global Site Tag (gtagjs)'));
    $settings->add($adminsetting);
    unset($adminsetting);

    $zerototwenty = [
         0 => '0',   1 => '1',   2 => '2',   3 => '3',   4 => '4',
         5 => '5',   6 => '6',   7 => '7',   8 => '8',   9 => '9',
        10 => '10', 11 => '11', 12 => '12', 13 => '13', 14 => '14',
        15 => '15', 16 => '16', 17 => '17', 18 => '18', 19 => '19',
        20 => '20' ];

    $adminsetting = new admin_setting_configselect(
        'local_ganalytics/dimensioncount',
        get_string('dimensioncount_lbl',  'local_ganalytics'),
        get_string('dimensioncount_desc', 'local_ganalytics'),
        '0', $zerototwenty);
    $settings->add($adminsetting);
    unset($adminsetting);

    $adminsetting = new admin_setting_configselect(
        'local_ganalytics/metriccount',
        get_string('metriccount_lbl',  'local_ganalytics'),
        get_string('metriccount_desc', 'local_ganalytics'),
        '0', $zerototwenty);
    $settings->add($adminsetting);
    unset($adminsetting);

}
