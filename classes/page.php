<?php
// File: classes/Page.php
require_once 'Entity.php';

class Page extends Entity {
    private $title;
    private $content;

    public function __construct($id = null, $title = '', $content = '') {
        parent::__construct($id);
        $this->title = $title;
        $this->content = $content;
    }

    // Getters and setters
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function toArray() {
        return [
            'id'      => $this->id,
            'title'   => $this->title,
            'content' => $this->content,
        ];
    }

    public static function fromArray($data) {
        return new self($data['id'], $data['title'], $data['content']);
    }
}
?>
