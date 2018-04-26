<?php namespace Nitneuqs\DynamicForm;

abstract class Field {
    public $html = '';

    public $title, $description;
    public $is_needed = true;

    public function __construct($title, $description, $is_needed = true) {
        $this->title = $title;
        $this->description = $description;
        $this->is_needed = $is_needed;

        $this->html = sprintf('<label>%s</label>', $title);
    }

    abstract public function toHTMLField();
}