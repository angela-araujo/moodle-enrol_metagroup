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
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>;


defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

/**
 * Plugin editform file.
 *
 * @package    enrol_metagroup
 * @copyright  2019 Angela de Araujo
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class enrol_metagroup_edit_form extends moodleform {
    
    public function definition() {
        $mform = $this->_form;
        
        list($instance, $plugin, $context) = $this->_customdata;
        

        $mform->addElement('select', 'status', get_string('linkcourse', 'enrol_metagroup'));
        
        $mform->addElement('text', 'name', get_string('custominstancename', 'enrol'));
        $mform->setType('name', PARAM_TEXT);
        
        if ($plugin->get_config('subscriptions')) {
            $mform->addElement('text', 'cost', get_string('cost', 'enrol_metagroup'), array('size' => 4));
            $mform->setType('cost', PARAM_TEXT);
            $mform->setDefault('cost', '0,00');
            $mform->addHelpButton('cost', 'cost', 'enrol_paymentpagseguro');
            
            $mform->addElement('text', 'customint1', get_string('months', 'enrol_paymentpagseguro'), array('size' => 4));
            $mform->setType('customint1', PARAM_INT);
            $mform->setDefault('customint1', 3);
            $mform->addHelpButton('customint1', 'months', 'enrol_paymentpagseguro');
            
            $options = array(0 => get_string('yes'), 1 => get_string('no'));
            $mform->addElement('select', 'customint2', get_string('faulback', 'enrol_paymentpagseguro'), $options);
            $mform->addHelpButton('customint2', 'faulback', 'enrol_paymentpagseguro');
        } else {
            $mform->addElement('text', 'cost', get_string('cost2', 'enrol_paymentpagseguro'), array('size' => 4));
            $mform->setType('cost', PARAM_INT);
            $mform->setDefault('cost', '0,00');
            $mform->addHelpButton('cost', 'cost2', 'enrol_paymentpagseguro');
            
            $mform->addElement('hidden', 'customint1');
            $mform->setDefault('customint1', 0);
            
            $mform->addElement('hidden', 'customint2');
            $mform->setDefault('customint2', 1);
        }
        
        if ($instance->id) {
            $roles = get_default_enrol_roles($context, $instance->roleid);
        } else {
            $roles = get_default_enrol_roles($context, 5);
        }
        $mform->addElement('select', 'roleid', get_string('defaultrole', 'enrol_paymentpagseguro'), $roles);
        $mform->setDefault('roleid', 5);
        $mform->addHelpButton('roleid', 'defaultrole', 'enrol_paymentpagseguro');
        
        $mform->addElement('duration', 'enrolperiod', get_string('enrolperiod', 'enrol_paymentpagseguro'),
                array('optional' => true, 'defaultunit' => 86400));
        $mform->setDefault('enrolperiod', 0);
        $mform->addHelpButton('enrolperiod', 'enrolperiod', 'enrol_paymentpagseguro');
        
        $options = array('optional' => true);
        $mform->addElement('date_time_selector', 'enrolstartdate',
                get_string('enrolstartdate', 'enrol_paymentpagseguro'), $options);
        $mform->setDefault('enrolstartdate', 0);
        $mform->addHelpButton('enrolstartdate', 'enrolstartdate', 'enrol_paymentpagseguro');
        
        $options = array('optional' => true);
        $mform->addElement('date_time_selector', 'enrolenddate',
                get_string('enrolenddate', 'enrol_paymentpagseguro'), $options);
        $mform->setDefault('enrolenddate', 0);
        $mform->addHelpButton('enrolenddate', 'enrolenddate', 'enrol_paymentpagseguro');
        
        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);
        
        $mform->addElement('hidden', 'courseid');
        $mform->setType('courseid', PARAM_INT);
        
        $this->add_action_buttons(true, ($instance->id ? null : get_string('addinstance', 'enrol')));
        
        $this->set_data($instance);
    }
    
    /**
     * Sets up moodle form validation.
     * @param stdClass $data
     * @param stdClass $files
     * @return $error error list
     */
    public function validation($data, $files) {
        $errors = parent::validation($data, $files);
        
        $cost = str_replace(get_string('decsep', 'langconfig'), '.', $data['cost']);
        if (!is_numeric($cost)) {
            $errors['cost'] = get_string('costerror', 'enrol_paymentpagseguro');
        }
        
        $months = str_replace(get_string('decsep', 'langconfig'), '.', $data['customint1']);
        if (!is_numeric($months)) {
            $errors['months'] = get_string('monthserror', 'enrol_paymentpagseguro');
        }
        
        if ($data['customint1'] > 24) {
            $errors['months'] = get_string('monthsmaxerror', 'enrol_paymentpagseguro');
        }
        
        return $errors;
    }
}