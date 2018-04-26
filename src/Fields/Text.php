<?php namespace Nitneuqs\DynamicForm\Fields;

use Nitneuqs\DynamicForm\Field;

class Text extends Field {
    public $numbers_only = false;

    public function __construct($title, $description, $is_needed, $numbers_only = false) {
        parent::__construct($title, $description, $is_needed);
        $this->numbers_only = $numbers_only;

        $this->html = $this->toHTMLField();
    }

    public function toHTMLField() {
        $type = $this->numbers_only ? 'number' : 'text';

        $this->html .= '<div>\n';
        $this->html .= sprintf('<input name="field_text" type="%s" value=""/>\n', $type);
        $this->html .= '</div>';

        return $this->html;
    }
}