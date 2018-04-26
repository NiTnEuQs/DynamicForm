<?php namespace Nitneuqs\DynamicForm\Fields;

use Nitneuqs\DynamicForm\Field;
use Nitneuqs\DynamicForm\WeatherType;

class Weather extends Field {
    public $options = [
        WeatherType::SUNNY,
        WeatherType::CLOUDY,
        WeatherType::RAINY,
        WeatherType::REALLY_RAINY,
        WeatherType::SNOWY,
    ];

    public function __construct($title, $description, $is_needed) {
        parent::__construct($title, $description, $is_needed);

        $this->toHTMLField();
    }

    public function toHTMLField() {
        $this->html .= '<label></label>';
        $this->html .= '<div>\n';
        foreach ($this->options as $index => $option) {
            $id = str_replace(' ', '_', mb_strtolower(iconv('utf-8','ASCII//IGNORE//TRANSLIT', $option)));

            $this->html .= sprintf('<label for="field_weather_%s">%s</label><input id="field_weather_%s" name="field_weather" type="radio" value="%b"/>\n', $id, $option, $id, $index);
        }
        $this->html .= '</div>';

        return $this->html;
    }
}