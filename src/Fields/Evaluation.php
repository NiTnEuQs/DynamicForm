<?php namespace Nitneuqs\DynamicForm\Fields;

require_once 'Field.php';

use Nitneuqs\DynamicForm\Field;

class Evaluation extends Field {
    public $nb_stars = 5;

    public function __construct($title, $description = '', $nb_stars = 5) {
        parent::__construct($title, $description);
        $this->nb_stars = $nb_stars;
    }

    public function toHTMLField() {
        $html = parent::toHTMLField();

        // TODO: Implement toHTMLField() method.

        return $html;
    }
}