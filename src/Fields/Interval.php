<?php namespace Nitneuqs\DynamicForm\Fields;

use Nitneuqs\DynamicForm\Field;

class Interval extends Field {
    public $minimum = 0, $maximum = 10, $step = 1;

    public function toHTMLField()
    {
        // TODO: Implement toHTMLField() method.
    }
}