<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire dynamique</title>
    <link href="src/assets/css/admin.css" rel="stylesheet">
    <link href="src/assets/css/vendor.css" rel="stylesheet">
    <link href="src/assets/css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->

    <style>
        body {
            background-color: #444;
            font-family: sans-serif;
        }

        #formbuilder {
            background-color: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<script src="src/assets/js/vendor.js"></script>
<script src="src/assets/js/draggableformbuilder.js"></script>
<script src="src/assets/js/fields.js"></script>
<script src="src/assets/js/vue.js"></script>

<div id="formbuilder" class="center" style="width: 80%"></div>

<script>
    new DraggableFormBuilder({
        selector: '#formbuilder',
        addComponent: [
            new Component('weather', 'Météo', 'fa fa-cloud', DynamicText),
        ],
        removeComponent: [
            // 'text',
            // 'radio',
        ],
    }).draw();
</script>

</body>
</html>