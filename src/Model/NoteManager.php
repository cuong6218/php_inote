<?php

namespace App\Model;

class NoteManager
{
    private $database;
    function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }
    function getAll()
    {
        $sql = "SELECT * FROM `note`";
        $statement = $this->database->query($sql);
        $data = $statement->fetchAll();
        $notes = [];
        foreach ($data as $item) {
            $note = new Note($item['title'], $item['content'], $item['type_id']);
            $note->setId($item['id']);
            array_push($notes, $note);
        }
        return $notes;
    }
    function add($note)
    {
        $sql = "INSERT INTO `note` (`title`, `content`, `type_id`) VALUES (:title, :content, :type_id)";
        $statement = $this->database->prepare($sql);
        $statement->bindParam(':title', $note->getTitle());
        $statement->bindParam(':content', $note->getContent());
        $statement->bindParam(':type_id', $note->getTypeId());
        $statement->execute();
    }
    function update($note)
    {
        $sql = "UPDATE `note` SET `title`=:title,`content`=:content,`type_id`=:type_id WHERE `id` = :id";
        $statement = $this->database->prepare($sql);
        $statement->bindParam(':id', $note->getId());
        $statement->bindParam(':title', $note->getTitle());
        $statement->bindParam(':content', $note->getContent());
        $statement->bindParam(':type_id', $note->getTypeId());
        $statement->execute();
    }
    function getNoteById($id)
    {
        $sql = "SELECT * FROM `note` WHERE `id` = :id";
        $statement = $this->database->prepare($sql);
        $statement->bindParam('id', $id);
        $statement->execute();
        $note = $statement->fetch();
        return $note;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `note` WHERE `id` = :id";
        $statement = $this->database->prepare($sql);
        $statement->bindParam('id', $id);
        $statement->execute();
    }
    // function show()
    // {
    //     $sql = "SELECT note.id,note.title, note.content, note_type.name FROM note INNER JOIN note_type ON note.type_id = note_type.id";
    //     $statement = $this->database->query($sql);
    //     $statement->execute();
    //     return $statement->fetchAll();
    // }
}
