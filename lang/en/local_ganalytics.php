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

    $string['pluginname']               = 'Google Analytics';
    $string['privacy:metadata']         = 'This plugin does not store any personal data.';
    $string['cachedef_session']         = 'GAnalytics session cache';
    $string['cachedef_global']          = 'GAnalytics global cache';

    $string['settingspage']             = 'GAnalytics settings';
    $string['property_lbl']             = 'Property settings';
    $string['property_desc']            = 'Settings for this website in Google Analytics';
    $string['propertyid_lbl']           = 'Property Id';
    $string['propertyid_desc']          = 'Unique identifier for this site';
    $string['template_lbl']             = 'Google API';
    $string['template_desc']            = 'Select the API to use';
    $string['dimensioncount_lbl']       = 'Custom dimensions';
    $string['dimensioncount_desc']      = 'Number of custom dimensions configured for this property.';
    $string['metriccount_lbl']          = 'Custom metrics';
    $string['metriccount_desc']         = 'Number of custom metrics cofigured for this property.';
