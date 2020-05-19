<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ReportService{

    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.reports.base_uri');
    }

    public function getAll(){
        return $this->performRequest('GET', '/reports');
    }

    public function create($data){
        return $this->performRequest('POST', '/reports', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/reports/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/reports/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/reports/{$id}");
    }
}
