<?php
// File: classes/Entity.php

abstract class Entity {
    protected $id;

    public function __construct($id = null) {
        $this->id = $id ?? uniqid();
    }

    public function getId() {
        return $this->id;
    }

    abstract public function toArray();
}
?>
