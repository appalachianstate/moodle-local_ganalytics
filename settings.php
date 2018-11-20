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


    // Included from (plugininfo)local::load_settings(). Globals
    // declared: $CFG, $USER, $DB, $OUTPUT, and $PAGE. Three args
    // passed into the function: $adminroot, $parentnodename, and
    // $hassiteconfig. Local scoped variables assigned:
    // $plugininfo = $this,
    // $ADMIN = $adminroot

    if ($hassiteconfig) {

        $pluginname = 'local_ganalytics';

        $settings = new admin_settingpage($pluginname, get_string('settingspage', $pluginname));
        $ADMIN->add('localplugins', $settings);

        $field = "property";
        $adminSetting = new admin_setting_heading(
            "{$pluginname}/{$field}",
            get_string("{$field}_lbl",  $pluginname),
            get_string("{$field}_desc", $pluginname));
        $settings->add($adminSetting);
        unset($adminSetting);

        $field = "propertyid";
        $adminSetting = new admin_setting_configtext_with_maxlength(
            "{$pluginname}/{$field}",
            get_string("{$field}_lbl",  $pluginname),
            get_string("{$field}_desc", $pluginname),
            '', PARAM_ALPHANUMEXT, 20, 20);
        $settings->add($adminSetting);
        unset($adminSetting);

        $field = "template";
        $adminSetting = new admin_setting_configselect(
            "{$pluginname}/{$field}",
            get_string("{$field}_lbl",  $pluginname),
            get_string("{$field}_desc", $pluginname),
            'analyticsjs', array('analyticsjs' => 'Universal Analytics (analyticsjs)', 'gtagjs' => 'Global Site Tag (gtagjs)'));
        $settings->add($adminSetting);
        unset($adminSetting);

        $zerototwenty = [
             0 => '0',   1 => '1',   2 => '2',   3 => '3',   4 => '4',
             5 => '5',   6 => '6',   7 => '7',   8 => '8',   9 => '9',
            10 => '10', 11 => '11', 12 => '12', 13 => '13', 14 => '14',
            15 => '15', 16 => '16', 17 => '17', 18 => '18', 19 => '19',
            20 => '20' ];

        $field = "dimensioncount";
        $adminSetting = new admin_setting_configselect(
            "{$pluginname}/{$field}",
            get_string("{$field}_lbl",  $pluginname),
            get_string("{$field}_desc", $pluginname),
            '0', $zerototwenty);
        $settings->add($adminSetting);
        unset($adminSetting);

        $field = "metriccount";
        $adminSetting = new admin_setting_configselect(
            "{$pluginname}/{$field}",
            get_string("{$field}_lbl",  $pluginname),
            get_string("{$field}_desc", $pluginname),
            '0', $zerototwenty);
        $settings->add($adminSetting);
        unset($adminSetting);

    }
