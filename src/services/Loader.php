<?php
namespace Rkstylex\Services;
use Illuminate\Support\ServiceProvider;
class Loader extends ServiceProvider
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
