<?php

namespace App\Services;

class Batch extends Service
{
    public function index($schoolId, $filter = [])
    {
        $response = $this->get("/schools/$schoolId/batches", $filter);

        return $this->showResponse($response);
    }

    public function detail($schoolId, $id)
    {
        $response = $this->get("/schools/$schoolId/batches/$id");

        return $this->showResponse($response);
    }
}
