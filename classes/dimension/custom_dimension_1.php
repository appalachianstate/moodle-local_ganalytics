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
 * Custom dimension for Google Analytics in index slot 1
 *
 * @copyright   (c) 2018 Appalachian State Universtiy, Boone, NC
 * @license     GNU General Public License version 3
 */
class custom_dimension_1 implements custom_dimension
{

    /**
     * Returns the value for custom_dimension_1
     *
     * @return string The custom_dimension_1 value
     */
    public static function get_dimension_value() : string {
        global $USER, $COURSE;

        $guestrolestr = get_string('guest');

        if (empty($USER->access) || empty($USER->access['ra'])) {
            // Unauthenticated.
            return $guestrolestr;
        }

        try {
            $roles = self::get_roles_from_cache();
            if (!$roles) {
                return $guestrolestr;
            }
        } catch (\Throwable $exc) {
            return $guestrolestr;
        }

        // Use the current course context path to find the
        // role assignment in the user's ra array and return
        // the role id. If more than one, get the first.
        $context = $COURSE->id == SITEID
                 ? \context_system::instance()
                 : \context_course::instance($COURSE->id);

        $roleids = array_keys($USER->access['ra'][$context->path]);
        if (empty($roleids) || empty($roles[$roleids[0]])) {
            return $guestrolestr;
        }

        return $roles[$roleids[0]]->shortname;

    }


    /**
     * Get roles from the cache, fetch from DB if needed.
     *
     * @return array
     */
    private static function get_roles_from_cache() {
        global $DB;

        $cache = \cache::make('local_ganalytics', 'global');
        $roles = $cache->get('roles');
        if (empty($roles)) {
            $roles = $DB->get_records('role');
            $cache->set('roles', $roles);
        }

        return $roles;

    }

}
