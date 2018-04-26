<?php

$form_fields = [
    new \Nitneuqs\DynamicForm\Fields\Text('Test', 'Un petit test', true),
    new \Nitneuqs\DynamicForm\Fields\Weather('Quel temps fait-il actuellement ?', '', true),
];
$form = new \Nitneuqs\DynamicForm\Form($form_fields);

?>
<html>
    <head>
        <title>Formulaire</title>
    </head>
    <body>
        <?php $form->toHTMLForm() ?>
    </body>
</html>