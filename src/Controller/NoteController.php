<?php

namespace App\Controller;

use App\Model\NoteManager;
use App\Model\Note;
use App\Model\Type;
use App\Model\TypeManager;

class NoteController
{
    private $noteManager;
    private $typeManager;
    function __construct()
    {
        $this->noteManager = new NoteManager();
        $this->typeManager = new TypeManager();
    }
    function viewNote()
    {
        $notes = $this->noteManager->getAll();
        include_once('src/View/note/list-note.php');
    }
    function addNote()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $types = $this->typeManager->getAll();
            include_once('src/View/note/add-note.php');
        } else {
            $title = $_REQUEST['title'];
            $content = $_REQUEST['content'];
            $type_id = $_REQUEST['type_id'];
            $note = new Note($title, $content, $type_id);
            $this->noteManager->add($note);
            header('location:index.php?list-note');
        }
    }
    function updateNote()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $types = $this->typeManager->getAll();
            $note = $this->noteManager->getNoteById($id);
            include_once('src/View/note/update-note.php');
        } else {
            $id = $_REQUEST['id'];
            $title = $_REQUEST['title'];
            $content = $_REQUEST['content'];
            $type_id = $_REQUEST['type_id'];
            $note = new Note($title, $content, $type_id);
            $this->noteManager->update($note);
            header('location:index.php?page=list-note');
        }
    }
    function deleteNote()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $this->noteManager->delete($id);
            header('location:index.php?page=list-note');
        }
    }
}
