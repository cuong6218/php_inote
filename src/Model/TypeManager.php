<?php

namespace App\Model;

class TypeManager
{
    private $database;
    function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }
    function getAll()
    {
        $sql = "SELECT * FROM note_type";
        $statement = $this->database->query($sql);
        $data = $statement->fetchAll();
        $types = [];
        foreach ($data as $item) {
            $type = new Type($item['name'], $item['description']);
            $type->setId($item['id']);
            array_push($types, $type);
        }
        return $types;
    }
    function add($type)
    {
        $sql = "INSERT INTO `note_type`(`name`, `description`) VALUES (:name, :desc)";
        $statement = $this->database->prepare($sql);
        $statement->bindParam(':name', $type->getName());
        $statement->bindParam(':desc', $type->getDesc());
        $statement->execute();
    }
    function update($type)
    {
        $sql = "UPDATE `note_type` SET `name`=:name,`description`=:desc WHERE `id` = :id";
        $statement = $this->database->prepare($sql);
        $statement->bindParam(':id', $type->getId());
        $statement->bindParam(':name', $type->getName());
        $statement->bindParam(':desc', $type->getDesc());
        $statement->execute();
    }
    function getTypeById($id)
    {
        $sql = "SELECT * FROM `note_type` WHERE `id` = :id";
        $statement = $this->database->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $type = $statement->fetch();
        return $type;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `note_type` WHERE `id` = :id";
        $statement = $this->database->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
    function search($keyword)
    {
        $sql = "SELECT * FROM `note_type` WHERE `name` LIKE :keyword";
        $statement = $this->database->prepare($sql);
        $statement->bindValue(':keyword', '%' . $keyword . '%');
        $statement->execute();
        $data = $statement->fetchAll();
        $types = [];
        foreach ($data as $item) {
            $type = new Type($item['name'], $item['description']);
            $type->setId($item['id']);
            array_push($types, $type);
        }
        return $types;
    }
}
