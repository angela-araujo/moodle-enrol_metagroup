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
 * Metagroup enrolment external functions and service definitions.
 *
 * @package    enrol_metagroup
 * @category   external
 * @copyright  2019 Angela de Araujo <angela@ccead.puc-rio.br>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since      Moodle 3.1
 */

$functions = array(
        
        'enrol_metagroup_get_groupids' => array(
                'classname'   => 'enrol_metagroup_external',
                'methodname'  => 'get_group_ids',
                'description' => 'Return ids of group of course parent selected.',
                'type'        => 'read',
                'services'    => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
        ),
);