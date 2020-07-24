<?php

namespace App\Controller;

use App\Model\Type;
use App\Model\TypeManager;

class TypeController
{
    private $typeManager;
    function __construct()
    {
        $this->typeManager = new TypeManager();
    }
    function viewType()
    {
        $types = $this->typeManager->getAll();
        include_once('src/View/type/list-type.php');
    }
    function addType()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            include_once('src/View/type/add-type.php');
        else {
            $name = $_REQUEST['name'];
            $desc = $_REQUEST['desc'];
            $type = new Type($name, $desc);
            $this->typeManager->add($type);
            header('location:index.php?page=list-type');
        }
    }
    function updateType()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $type = $this->typeManager->getTypeById($id);
            include_once('src/View/type/update-type.php');
        } else {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $desc = $_REQUEST['desc'];
            $type = new Type($name, $desc);
            $type->setId($id);
            $this->typeManager->update($type);
            header('location:index.php?page=list-type');
        }
    }
    function deleteType()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $this->typeManager->delete($id);
            header('location:index.php?page=list-type');
        }
    }
    function searchType()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $keyword = $_POST['keyword'];
            $types = $this->typeManager->search($keyword);
            include_once('src/View/type/list-type.php');
        }
    }
}
