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

namespace local_ganalytics\dimension;

defined('MOODLE_INTERNAL') || die();


/**
 * Custom dimension for Google Analytics in index slot 5
 *
 * @copyright   (c) 2018 Appalachian State Universtiy, Boone, NC
 * @license     GNU General Public License version 3
 */
class custom_dimension_5 implements custom_dimension
{

    /**
     * Returns the value for custom_dimension_5
     *
     * @return string The custom_dimension_5 value
     */
    public static function get_dimension_value() : string {
        global $PAGE;

        if (empty($PAGE)) {
            return 'moodle:core';
        }

        $pagetype = $PAGE->pagetype;
        return empty($pagetype) ? 'moodle:core' : $pagetype;

    }

}
