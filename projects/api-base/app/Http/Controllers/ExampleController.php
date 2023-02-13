<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Function that show an example to implement a new function
     * 
     * @return object
     */
    public function index()
    {
        return $this->defaultResponse();
    }
}
