<?php namespace Nitneuqs\DynamicForm\Fields;

require_once 'LureField.php';

use Nitneuqs\DynamicForm\LureField;

class Title extends LureField {
    public $title_classes = 'h2';
    public $description_classes = 'h3';

    public function __construct($title, $description = '') {
        parent::__construct($title, $description);
    }

    public function toHTMLField() {
        $html = sprintf('<div class="%s">', $this->classes);
        $html .= sprintf('<span class="%s">%s</span>', $this->title_classes, $this->title);
        if (isset($this->description) && $this->description != '') $html .= sprintf('<br/><span class="%s">%s</span>', $this->description_classes, $this->description);
        $html .= '</div>';

        return $html;
    }

    public function setTitleClasses($title_classes) {
        $this->title_classes = $title_classes;
        return $this;
    }

    public function setDescriptionClasses($description_classes) {
        $this->description_classes = $description_classes;
        return $this;
    }
}