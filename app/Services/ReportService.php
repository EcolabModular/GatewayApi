<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ReportService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.reports.base_uri');
        $this->secret = config('services.reports.secret');
    }

    public function getAll($query=[]){
        return $this->performRequest('GET', '/reports',$query);
    }

    public function create($data){
        return $this->performRequest('POST', '/reports', $data);
    }

    public function getOne($id){
        //dd($id);
        return $this->performRequest('GET', "/reports/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/reports/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/reports/{$id}");
    }
}
