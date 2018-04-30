<?php namespace Nitneuqs\DynamicForm\Fields;

require_once 'Field.php';

use Nitneuqs\DynamicForm\Field;

class Interval extends Field {
    public $minimum = 0, $maximum = 10, $step = 1;

    public function __construct($title, $description = '', $minimum = 0, $maximum = 100, $step = 1) {
        parent::__construct($title, $description);
        $this->minimum = $minimum;
        $this->maximum = $maximum;
        $this->step = $step;
    }

    public function toHTMLField() {
        $html = parent::toHTMLField();

        // TODO: Implement toHTMLField() method.

        return $html;
    }
}