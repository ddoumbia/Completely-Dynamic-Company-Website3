<?php
// File: classes/PageManager.php
require_once 'Page.php';
require_once 'JsonFileHandler.php';

class PageManager {
    private $dataFile = __DIR__ . '/../data/pages.json5';
    private $pages = [];

    public function __construct() {
        $this->loadData();
    }

    private function loadData() {
        $data = JsonFileHandler::readAll($this->dataFile);
        foreach ($data as $item) {
            $this->pages[] = Page::fromArray($item);
        }
    }

    private function saveData() {
        $data = [];
        foreach ($this->pages as $page) {
            $data[] = $page->toArray();
        }
        JsonFileHandler::writeAll($this->dataFile, $data);
    }

    public function getAllPages() {
        return $this->pages;
    }

    public function getPageById($id) {
        foreach ($this->pages as $page) {
            if ($page->getId() === $id) {
                return $page;
            }
        }
        return null;
    }

    public function addPage(Page $page) {
        $this->pages[] = $page;
        $this->saveData();
    }

    public function updatePage(Page $page) {
        foreach ($this->pages as $key => $existingPage) {
            if ($existingPage->getId() === $page->getId()) {
                $this->pages[$key] = $page;
                $this->saveData();
                return true;
            }
        }
        return false;
    }

    public function deletePage($id) {
        foreach ($this->pages as $key => $page) {
            if ($page->getId() === $id) {
                unset($this->pages[$key]);
                $this->pages = array_values($this->pages); // Re-index array
                $this->saveData();
                return true;
            }
        }
        return false;
    }
}
?>
