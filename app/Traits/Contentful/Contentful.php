<?php

namespace App\Traits\Contentful;

trait Contentful {

    public function getEntriesUrl() {
        return "spaces/{$this->space_id}/environments/master/entries";
    }

    public function getAllEntries()
    {
        $this->get($this->getEntriesUrl()."?access_token=$this->access_token");
        return $this->response;
    }

    public function getSingleEntry()
    {
        $this->get($this->getEntriesUrl()."/{entry_id}?access_token={access_token}");
        return $this->response;
    }
}