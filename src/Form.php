<?php namespace Nitneuqs\DynamicForm;

//require_once 'Fields/Title.php';

class Form {
    // Attributes

    public $new_lines = false, $fields_num = false;
    public $fields_num_char = '.';

    public $form_fields = [], $form_action = '#', $form_method = 'POST', $form_classes = 'form-group';
    public $submit_btn_value = 'Valider', $submit_btn_classes = 'form form-control';

    // Constructor

    public function __construct($form_fields) {
        $this->form_fields = $form_fields;
    }

    // Getters / Setters

    public function setFormFields($form_fields) {
        $this->form_fields = $form_fields;
        return $this;
    }

    public function setFormAction($form_action) {
        $this->form_action = $form_action;
        return $this;
    }

    public function setFormMethod($form_method) {
        $this->form_method = $form_method;
        return $this;
    }

    public function setFormClasses($form_classes) {
        $this->form_classes = $form_classes;
        return $this;
    }

    public function setSubmitBtnValue($submit_btn_value) {
        $this->submit_btn_value = $submit_btn_value;
        return $this;
    }

    public function setSubmitBtnClasses($submit_btn_classes) {
        $this->submit_btn_classes = $submit_btn_classes;
        return $this;
    }

    public function enableNewLines() {
        $this->new_lines = true;
        return $this;
    }

    public function enableFieldsNum($fields_num_char = null) {
        if (isset($fields_num_char)) $this->fields_num_char = $fields_num_char;
        $this->fields_num = true;
        return $this;
    }

    // Functions

    public function addFormField(Field $form_fields) {
       array_push($this->form_fields, $form_fields);
    }

//    public function switchFormField($i, $j) {
//        $temp = $this->form_fields[$i];
//        $this->form_fields[$i] = $this->form_fields[$j];
//        $this->form_fields[$j] = $temp;
//    }

//    public function removeFormField($key) {
//        if (null !== $this->form_fields && isset($this->form_fields[$key])) {
//            unset($this->form_fields[$key]);
//        }
//    }

    public function toHTMLForm() {
        $html = sprintf('<form action="%s" method="%s" class="%s">', $this->form_action, $this->form_method, $this->form_classes);

        $field_num = 0;
        foreach ($this->form_fields as $field) {
            $is_lure = $field instanceof LureField;

            if (!$is_lure) {
                if ($this->fields_num) $field->title = (++$field_num) . $this->fields_num_char . ' ' . $field->title;
            }

            $html .= $field->toHTMLField();

            if ($this->new_lines) $html .= '<br/>';
        }

        $html .= sprintf('<input type="submit" value="%s" class="%s"/><br/>', $this->submit_btn_value, $this->submit_btn_classes);
        $html .= '</form>';

        return $html;
    }
}