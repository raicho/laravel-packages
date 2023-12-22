<?php

namespace Rkstylex\Services;
class Loader
{
    public function __construct()
    {
            echo 'class test';
    }

    public function register()
    {
        echo dd(base_path());
    }
}
new Loader();
