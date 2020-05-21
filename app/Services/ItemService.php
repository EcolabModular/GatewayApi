<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ItemService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.items.base_uri');
        $this->secret = config('services.items.secret');
    }

    public function getAll(){
        return $this->performRequest('GET', '/items');
    }

    public function create($data){
        return $this->performRequest('POST', '/items', $data);
    }

    public function getOne($id){
        return $this->performRequest('GET', "/items/{$id}");
    }

    public function edit($data, $id){
        return $this->performRequest('PUT', "/items/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/items/{$id}");
    }
}
