<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class FileService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.files.base_uri');
        $this->secret = config('services.files.secret');
    }

    public function getAll($query=[]){
        return $this->performRequest('GET', '/files',$query);
    }

    public function create($data){
        //dd($data);
        return $this->performRequestWithFile('POST', '/files', $data);
    }

    public function createReport($data){
        return $this->performRequest('POST', '/files/makereport', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/files/{$id}");
    }

    public function edit($data, $id){
        //dd(in_array('0',$data));
        //dd($data);
        return $this->performRequest('PUT', "/files/{$id}", $data);
    }

    public function editWithFile($data,$id){
        return $this->performRequestWithFile('POST', "/files/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/files/{$id}");
    }
}
