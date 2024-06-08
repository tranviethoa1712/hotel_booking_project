<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public abstract function create();
    public abstract function getAll();
    public abstract function update($item);
    public abstract function delete($item);
}
