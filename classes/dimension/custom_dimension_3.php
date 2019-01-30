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
 * Custom dimension for Google Analytics in index slot 3
 *
 * @copyright   (c) 2018 Appalachian State Universtiy, Boone, NC
 * @license     GNU General Public License version 3
 */
class custom_dimension_3 implements custom_dimension
{

    /**
     * @var array Range labels and their upper bound values.
     */
    const RANGES    = [ 'na' => 0,  'xs' => 10, 'sm' => 20,
                        'md' => 35, 'lg' => 50, 'xl' => -1 ];


    /**
     * Returns the value for custom_dimension_3
     *
     * @return string The custom_dimension_3 value
     */
    public static function get_dimension_value() : string {
        global $COURSE, $DB;

        if ($COURSE->id == SITEID) {
            return 'na';
        }

        $cache = \cache::make('local_ganalytics', 'session');
        $enrols = $cache->get("enrols_{$COURSE->id}");
        if ($enrols === false) {
            try {
                $sql = "SELECT COUNT(DISTINCT ue.userid) AS usercount
                          FROM {user_enrolments} ue
                          JOIN {enrol} e ON e.id = ue.enrolid
                         WHERE e.courseid   = :p1
                           AND ue.status    = :p2
                           AND e.status     = :p3
                           AND ue.timestart < :p4
                           AND (ue.timeend  > :p5 OR ue.timeend = 0)";

                $now = round(time(), -2);
                $params = [
                    'p1' => $COURSE->id,
                    'p2' => ENROL_USER_ACTIVE,
                    'p3' => ENROL_INSTANCE_ENABLED,
                    'p4' => $now, 'p5' => $now ];

                $row = $DB->get_record_sql($sql, $params);
                $enrols = $row->usercount;
                $cache->set("enrols_{$COURSE->id}", $enrols);
            } catch (\Exception $exc) {
                $enrols = 0;
            }
        }

        foreach (self::RANGES as $label => $max) {
            if ($enrols > $max) {
                continue;
            }
            return $label;
        }

        return 'xl';

    }

}
