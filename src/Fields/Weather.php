<?php namespace Nitneuqs\DynamicForm\Fields;

require_once 'Field.php';
require_once 'WeatherType.php';

use Nitneuqs\DynamicForm\Field;
use Nitneuqs\DynamicForm\WeatherType;

class Weather extends Field {
    public $input_classes = 'form-check-input';
    public $options = [
        WeatherType::SUNNY,
        WeatherType::CLOUDY,
        WeatherType::RAINY,
        WeatherType::REALLY_RAINY,
        WeatherType::SNOWY,
    ];

    public function __construct($title, $description = '') {
        parent::__construct($title, $description);
    }

    public function toHTMLField() {
        $html = parent::toHTMLField();

        $html .= sprintf('<div class="%s">', $this->classes);
        foreach ($this->options as $index => $option) {
            $id = str_replace(' ', '_', mb_strtolower(iconv('utf-8', 'ASCII//IGNORE//TRANSLIT', $option)));

            $html .= sprintf('<div class="form-check">');
            $html .= sprintf('<input id="field_weather_%s" class="%s" name="field_weather" type="radio" value="%b" %s/><label class="form-check-label" for="field_weather_%s">%s</label><br/>', $id, $this->input_classes, $index, $this->is_required, $id, $option);
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }

    public function setInputClasses($input_classes) {
        $this->input_classes = $input_classes;
        return $this;
    }

    public function setOptions($options) {
        $this->options = $options;
        return $this;
    }
}