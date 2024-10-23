<?php
// File: classes/AwardManager.php
require_once 'Award.php';
require_once 'JsonFileHandler.php';

class AwardManager {
    private $dataFile = __DIR__ . '/../data/awards.json5';
    private $awards = [];

    public function __construct() {
        $this->loadData();
    }

    private function loadData() {
        $data = JsonFileHandler::readAll($this->dataFile);
        foreach ($data as $item) {
            $this->awards[] = Award::fromArray($item);
        }
    }

    private function saveData() {
        $data = [];
        foreach ($this->awards as $award) {
            $data[] = $award->toArray();
        }
        JsonFileHandler::writeAll($this->dataFile, $data);
    }

    public function getAllAwards() {
        return $this->awards;
    }

    public function getAwardById($id) {
        foreach ($this->awards as $award) {
            if ($award->getId() === $id) {
                return $award;
            }
        }
        return null;
    }

    public function addAward(Award $award) {
        $this->awards[] = $award;
        $this->saveData();
    }

    public function updateAward(Award $award) {
        foreach ($this->awards as $key => $existingAward) {
            if ($existingAward->getId() === $award->getId()) {
                $this->awards[$key] = $award;
                $this->saveData();
                return true;
            }
        }
        return false;
    }

    public function deleteAward($id) {
        foreach ($this->awards as $key => $award) {
            if ($award->getId() === $id) {
                unset($this->awards[$key]);
                $this->awards = array_values($this->awards); // Re-index array
                $this->saveData();
                return true;
            }
        }
        return false;
    }
}
?>
