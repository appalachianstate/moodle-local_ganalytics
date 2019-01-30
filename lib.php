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


/**
 * Called by the core outputrender's standard_head_html().
 *
 * @return string Markup to be included in page's HTML head element
 */
function local_ganalytics_before_standard_html_head() : string {
    global $OUTPUT;

    // Get the config info, get out if missing, is admin user.
    $config = get_config('local_ganalytics');
    if (empty($config->propertyid) || is_siteadmin()) {
        return '';
    }

    if (empty($config->template)) {
        $config->template = 'analyticsjs';
    }

    // Collect up the dimensions and metrics we want to push over
    // to Google Analytics for this page request.
    $context = new stdClass();
    $context->propertyid = $config->propertyid;

    // Possible for up to 20 custom dimensions for std UA accounts
    // and likewise for custom metrics. Configs tell us how many
    // of each to anticipate.
    if (!empty($config->dimensioncount)) {
        $context->dimensions = array();
        for ($index = 1; $index <= $config->dimensioncount; $index++) {
            $classname = "local_ganalytics\dimension\custom_dimension_{$index}";
            if (class_exists($classname)) {
                $context->dimensions[] = [ 'index' => $index, 'value' => $classname::get_dimension_value() ];
            }
        }
    }
    if (!empty($config->metriccount)) {
        $context->metrics = array();
        for ($index = 1; $index <= $config->metriccount; $index++) {
            $classname = "local_ganalytics\metric\custom_metric_{$index}";
            if (class_exists($classname)) {
                $context->metrics[] = [ 'index' => $index, 'value' => $classname::get_metric_value() ];
            }
        }
    }

    // Render and return the <script> element we want in the page's
    // head element.
    return $OUTPUT->render_from_template("local_ganalytics/{$config->template}", $context) . "\n";

}
