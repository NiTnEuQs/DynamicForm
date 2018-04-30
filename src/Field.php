<?php namespace Nitneuqs\DynamicForm;

abstract class Field {
    public $title, $description;
    public         $is_required = '';
    public         $classes     = '';

    public function __construct($title, $description = '') {
        $this->title       = $title;
        $this->description = $description;
    }

    public function toHTMLField() {
        $html = sprintf('<label style="font-size: large">%s</label><br/>', $this->title);
        if (isset($description) && $this->description != '') $html .= sprintf('<label style="font-size: medium">%s</label>', $this->description);

        return $html;
    }

    public function isRequired() {
        $this->is_required = "required";
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setClasses($classes) {
        $this->classes = $classes;
        return $this;
    }
}