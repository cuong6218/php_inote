<?php

use App\Controller\NoteController;
use App\Controller\TypeController;

require __DIR__ . "/vendor/autoload.php";
include_once('src/View/menu/menu.php');
$typeController = new TypeController();
$noteController = new NoteController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    switch ($page) {
        case 'list-type':
            $typeController->viewType();
            break;
        case 'add-type':
            $typeController->addType();
            break;
        case 'update-type':
            $typeController->updateType();
            break;
        case 'delete-type':
            $typeController->deleteType();
            break;
        case 'list-note':
            $noteController->viewNote();
            break;
        case 'add-note':
            $noteController->addNote();
            break;
        case 'update-note':
            $noteController->updateNote();
            break;
        case 'delete-note':
            $noteController->deleteNote();
            break;
        default:
            $noteController->viewNote();
    }
    ?>
</body>

</html>