<?php namespace Nitneuqs\DynamicForm\Fields;

require_once 'Field.php';

use Nitneuqs\DynamicForm\Field;

class Text extends Field {
    public $input_classes = 'form form-control';
    public $numbers_only = false;

    public function __construct($title, $description = '', $numbers_only = false) {
        parent::__construct($title, $description);
        $this->numbers_only = $numbers_only;
    }

    public function toHTMLField() {
        $html = parent::toHTMLField();

        $type = $this->numbers_only ? 'number' : 'text';

        $html .= sprintf('<div class="%s">', $this->classes);
        $html .= sprintf('<input class="%s" name="field_text" type="%s" value="" %s/>', $this->input_classes, $type, $this->is_required);
        $html .= '</div>';

        return $html;
    }

    public function enableNumbersOnly() {
        $this->numbers_only = true;
        return $this;
    }

    public function setInputClasses($input_classes) {
        $this->input_classes = $input_classes;

        return $this;
    }
}