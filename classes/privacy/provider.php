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

namespace local_ganalytics\privacy;
use core_privacy\local\metadata\collection;

defined('MOODLE_INTERNAL') || die();


/**
 * Metadata provider for Moodle Privacy API
 *
 * @package     local_ganalytics
 * @copyright   (c) 2018 Appalachian State Universtiy, Boone, NC
 * @license     GNU General Public License version 3
 */
class provider implements \core_privacy\local\metadata\provider, \core_privacy\local\request\data_provider
{

    /**
     * Returns meta data about this system.
     *
     * @param   collection     $items The initialised collection to add items to.
     * @return  collection     A listing of user data stored through this system.
     */
    public static function get_metadata(collection $items) : collection {

        $items->add_external_location_link(
            get_string('privacy:externlink', 'local_ganalytics'),
            [
                'userrole'   => 'privacy:metadata:userrole',
                'coursename' => 'privacy:metadata:coursename',
                'coursesize' => 'privacy:metadata:coursesize',
                'coursecat'  => 'privacy:metadata:coursecat',
                'pagetype'   => 'privacy:metadata:pagetype',
                'module'     => 'privacy:metadata:module',
                'instance'   => 'privacy:metadata:instance',
            ],
            'privacy:metadata'
        );

        return $items;

    }

}
