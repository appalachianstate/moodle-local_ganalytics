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

namespace local_ganalytics\metric;

defined('MOODLE_INTERNAL') || die();


/**
 * Interface used by each custom_metric_n class.
 */
interface custom_metric
{

    /**
     * Returns the value for custom_metric_n
     *
     * @return int The custom_metric_n value
     */
    public static function get_metric_value() : int;

}
