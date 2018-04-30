<?php namespace Nitneuqs\DynamicForm\Fields;

require_once 'Field.php';

use Nitneuqs\DynamicForm\Field;

class RadioButton extends Field {
    public $input_classes = 'form-check-input';
    public $options = [];

    public function __construct($title, $description = '', $options = []) {
        parent::__construct($title, $description);
        $this->options = $options;
    }

    public function toHTMLField() {
        $html = parent::toHTMLField();

        $html .= sprintf('<div class="%s">', $this->classes);
        foreach ($this->options as $index => $option) {
            $id = str_replace(' ', '_', mb_strtolower(iconv('utf-8', 'ASCII//IGNORE//TRANSLIT', $option)));

            $html .= sprintf('<div class="form-check">');
            $html .= sprintf('<input id="field_radio_%s" class="%s" name="field_radio" type="radio" value="%b" %s/><label class="form-check-label" for="field_radio_%s">%s</label><br/>', $id, $this->input_classes, $index, $this->is_required, $id, $option);
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }

    public function setInputClasses($input_classes) {
        $this->input_classes = $input_classes;
        return $this;
    }
}