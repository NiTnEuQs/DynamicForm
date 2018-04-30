<?php namespace Nitneuqs\DynamicForm;

require_once 'BasicEnum.php';

abstract class WeatherType extends BasicEnum {
    const SUNNY = 'Ensoleillé',
        CLOUDY = 'Nuageux',
        RAINY = 'Pluvieux',
        REALLY_RAINY = 'Très pluvieux',
        SNOWY = 'Neigeux';
}