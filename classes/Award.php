<?php
// File: classes/Award.php
require_once 'Entity.php';

class Award extends Entity {
    private $name;
    private $description;
    private $date;

    public function __construct($id = null, $name = '', $description = '', $date = '') {
        parent::__construct($id);
        $this->name = $name;
        $this->description = $description;
        $this->date = $date;
    }

    // Getters and setters
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function toArray() {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'date'        => $this->date,
        ];
    }

    public static function fromArray($data) {
        return new self($data['id'], $data['name'], $data['description'], $data['date']);
    }
}
?>
