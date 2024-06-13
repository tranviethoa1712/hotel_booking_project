<?php

namespace App\Http\Controllers\Admin;

abstract class BaseAdminController
{
    protected $auth;

    public function __construct() {
        $this->auth = auth()->user();
    }
    
    public abstract function create();
    public abstract function getAll();
    public abstract function update($item);
    public abstract function delete($item);
}
