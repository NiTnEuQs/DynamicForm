<?php namespace Nitneuqs\DynamicForm\Fields;

require_once 'Field.php';

use Nitneuqs\DynamicForm\Field;

class Photo extends Field {
    public $input_classes = 'form form-control';

    public function __construct($title, $description = '') {
        parent::__construct($title, $description);
    }

    public function toHTMLField() {
        $html = parent::toHTMLField();

        $html .= sprintf('<div class="%s">', $this->classes);
        $html .= sprintf('<input class="%s" name="field_photo" type="file" value="" %s/>', $this->input_classes, $this->is_required);
        $html .= '</div>';

        return $html;
    }

    public function setInputClasses($input_classes) {
        $this->input_classes = $input_classes;
        return $this;
    }
}