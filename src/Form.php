<?php namespace Nitneuqs\DynamicForm;

class Form {
    // Attributes

    public $html = '';

    public $form_fields = [], $form_action = '#', $form_method = 'POST', $form_classes = '';
    public $submit_btn_value = 'Valider', $submit_btn_classes = '';

    // Constructor

    public function __construct($form_fields) {
        $this->form_fields = $form_fields;

        $this->html = $this->toHTMLForm();
    }

    // Getters / Setters

    /**
     * @param mixed $form_fields
     */
    public function setFormFields($form_fields) {
        $this->form_fields = $form_fields;
    }

    /**
     * @param string $form_action
     */
    public function setFormAction($form_action) {
        $this->form_action = $form_action;
    }

    /**
     * @param string $form_method
     */
    public function setFormMethod($form_method) {
        $this->form_method = $form_method;
    }

    /**
     * @param string $form_classes
     */
    public function setFormClasses($form_classes) {
        $this->form_classes = $form_classes;
    }

    /**
     * @param string $submit_btn_value
     */
    public function setSubmitBtnValue($submit_btn_value) {
        $this->submit_btn_value = $submit_btn_value;
    }

    /**
     * @param string $submit_btn_classes
     */
    public function setSubmitBtnClasses($submit_btn_classes) {
        $this->submit_btn_classes = $submit_btn_classes;
    }

    // Functions

    public function addFormField(Field $form_fields) {
       $this->form_fields += $form_fields;
    }

    public function switchFormField($i, $j) {
        $temp = $this->form_fields[$i];
        $this->form_fields[$i] = $this->form_fields[$j];
        $this->form_fields[$j] = $temp;
    }

    public function removeFormField($key) {
        if (null !== $this->form_fields && isset($this->form_fields[$key])) {
            unset($this->form_fields[$key]);
        }
    }

    public function toHTMLForm() {
        $this->html = sprintf('<form action="%s" method="%s" class="%s">\n', $this->form_action, $this->form_method, $this->form_classes);

        foreach ((array) $this->form_fields as $field) {
            $this->html .= $field->toHTMLField() . '\n';
        }

        $this->html .= sprintf('<input type="submit" value="%s" class="%s"/>\n', $this->submit_btn_value, $this->submit_btn_classes);
        $this->html .= '</form>';

        return $this->html;
    }
}