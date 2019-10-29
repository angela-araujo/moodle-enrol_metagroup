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
 * Strings for component 'enrol_metagroup', language 'pt_br'.
 *
 * @package    enrol_metagroup
 * @copyright  2010 onwards Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['addgroup'] = 'Adicionar ao grupo';
$string['coursesort'] = 'Ordenar lista de curso';
$string['coursesort_help'] = 'This determines whether the list of courses that can be linked are sorted by sort order (i.e. the order set in Site administration > Courses > Manage courses and categories) or alphabetically by course setting.';
$string['creategroup'] = 'Create new group';
$string['defaultgroupnametext'] = '{$a->name} curso {$a->increment}';
$string['enrolmetagroupsynctask'] = 'metagroup enrolment sync task';
$string['linkedcourse'] = 'Link course';
$string['metagroup:config'] = 'Configura instância da incrição metagroup';
$string['metagroup:selectaslinked'] = 'Select course as metagroup linked';
$string['metagroup:unenrol'] = 'Unenrol suspended users';
$string['nosyncroleids'] = 'Roles that are not synchronised';
$string['nosyncroleids_desc'] = 'By default all course level role assignments are synchronised from parent to child courses. Roles that are selected here will not be included in the synchronisation process. The roles available for synchronisation will be updated in the next cron execution.';
$string['pluginname'] = 'Curso meta grupo link';
$string['pluginname_desc'] = 'Plugin de inscrição link de grupo por curso sincroniza inscrições e papeis em dois cursos diferentes por grupo.';
$string['syncall'] = 'Sincronizar todos os usuários inscritos';
$string['syncall_desc'] = 'Se habilitado, todos os usuáris inscritos são sincrozinados mesmo se ele não tiverem papeis no curso pai, se desabilitado, apenas usuários com papel sincronizado são inscritos no curso filho.';
$string['privacy:metagroupdata:core_group'] = 'Enrol metagroup plugin can create a new group or use an existing group to add all the participants of the course linked.';
