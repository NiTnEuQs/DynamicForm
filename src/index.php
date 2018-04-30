<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require 'Form.php';
require 'Fields/Title.php';
require 'Fields/Text.php';
require 'Fields/Weather.php';
require 'Fields/RadioButton.php';
require 'Fields/Checkbox.php';
require 'Fields/Dropdown.php';
require 'Fields/Evaluation.php';
require 'Fields/Interval.php';
require 'Fields/Photo.php';

use Nitneuqs\DynamicForm\Fields\Checkbox;
use Nitneuqs\DynamicForm\Fields\Dropdown;
use Nitneuqs\DynamicForm\Fields\Evaluation;
use Nitneuqs\DynamicForm\Fields\Interval;
use Nitneuqs\DynamicForm\Fields\Photo;
use Nitneuqs\DynamicForm\Fields\RadioButton;
use Nitneuqs\DynamicForm\Fields\Text;
use Nitneuqs\DynamicForm\Fields\Title;
use Nitneuqs\DynamicForm\Fields\Weather;
use Nitneuqs\DynamicForm\Form;

$form_fields = [
    (new Title('Fête des pères')),
    (new Text('Combien de ventes avez-vous fait sur les produits ménagers ?', '', true)),
    (new Weather('Quel temps faisait-il ?')),
    (new RadioButton('Quel a été le secteur dans lequel il y a eu le plus de ventes ?', 'parmis les secteurs proposant les promotions', ['Electronique', 'Jouets', 'Jardinage'])),
    (new Checkbox('Quels sont les articles qui ont été le plus vendus ?', 'parmis les articles en promotion', ['Gel douche', 'Dentifrice', 'Télévision', 'Smartphone'])),
    (new Dropdown('Quel a été l\'article le moins vendu ?', 'parmis les articles en promotion', ['Gel douche', 'Dentifrice', 'Télévision', 'Smartphone'])),
    (new Evaluation('Notez les benefices de la journée')),
    (new Interval('A combien estimez-vous ces bénéfices ?', '', 0, 15000, 10)),
    (new Photo('Envoyez une photo de l\'entrée du magasin')),
];
$form        = new Form($form_fields);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/vendor.css" rel="stylesheet">
    <link href="assets/css/formbuilder.css" rel="stylesheet">
<!--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet"-->
<!--          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #444;
            font-family: sans-serif;
        }

        .formbuilder {
            background-color: #fff;
            border-radius: 5px;
            min-height: 600px;
        }

        input[type=text] {
            height: 26px;
            margin-bottom: 3px;
        }

        select {
            margin-bottom: 5px;
            font-size: 40px;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }
    </style>
</head>
<body>
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/formbuilder.js"></script>
<div>
    <div class="center formbuilder">
        <?php echo $form->enableNewLines()->enableFieldsNum()->toHTMLForm(); ?>
<!--        <div id='formbuilder' class="formbuilder"></div>-->
    </div>

    <script>
        let formbuilder = new Formbuilder({
            selector: '#formbuilder'
        });

        formbuilder.on('save', function(payload){
            console.log(payload);
        })
    </script>

</body>
</html>