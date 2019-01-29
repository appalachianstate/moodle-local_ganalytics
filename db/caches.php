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


$definitions = array(
    'session' => array(
        'mode'          => cache_store::MODE_SESSION,
        'ttl'           => 1200,
        'simplekeys'    => true,
        'simpledata'    => true
    ),
    'global' => array(
        'mode'          => cache_store::MODE_APPLICATION,
        'simplekeys'    => 'true'
    )
);
