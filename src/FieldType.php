<?php namespace Nitneuqs\DynamicForm;

abstract class FieldType extends BasicEnum {
    const TEXT = 0,
        RADIO_BUTTON = 1,
        DROPDOWN = 2,
        INTERVAL = 3,
        CHECKBOX = 4,
        WEATHER = 5,
        EVALUATION = 6,
        PHOTO = 7;
}