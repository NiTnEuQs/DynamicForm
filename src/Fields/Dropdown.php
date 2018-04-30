<?php namespace Nitneuqs\DynamicForm\Fields;

require_once 'Field.php';

use Nitneuqs\DynamicForm\Field;

class Dropdown extends Field {
    public $select_classes = 'form form-control';
    public $option_classes = '';
    public $options = [''];

    public function __construct($title, $description = '', $options = []) {
        parent::__construct($title, $description);
        $this->options = $options;
    }

    public function toHTMLField() {
        $html = parent::toHTMLField();

        $html .= sprintf('<div class="%s">', $this->classes);
        $html .= sprintf('<select class="%s" %s>', $this->select_classes, $this->is_required);
        $html .= sprintf('<option id="field_item_0" class="%s" name="field_item" value=""/><label for="field_item_0"></label><br/>', $this->classes);
        foreach ($this->options as $index => $option) {
            $id = str_replace(' ', '_', mb_strtolower(iconv('utf-8', 'ASCII//IGNORE//TRANSLIT', $option)));

            $html .= sprintf('<option id="field_item_%s" class="%s" name="field_item" value="%b"/><label for="field_item_%s">%s</label><br/>', $id, $this->option_classes, $index, $id, $option);
        }
        $html .= '</select></div>';

        return $html;
    }

    public function setSelectClasses($select_classes) {
        $this->select_classes = $select_classes;
        return $this;
    }

    public function setOptionClasses($option_classes) {
        $this->option_classes = $option_classes;
        return $this;
    }
}