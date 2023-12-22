<?php
namespace Rkstylex\Services;
use Illuminate\Support\ServiceProvider;
class Loader extends ServiceProvider
{
    /**
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function register()
    {
        // Check if the base directory bundles exists
        $dir = base_path('bundles');
        !is_dir($dir) ? mkdir($dir) : null;
        array_filter(scandir($dir), function ($item) use ($dir) {
            if( !in_array($item, ['.', '..'])) {
                $bundleDirectory = $dir.'\\'.$item;
                is_dir($bundleDirectory) ? $this->loadBundle($bundleDirectory)  : null;
            }
        });

    }

    /**
     * @param $bundleDirectory
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function loadBundle($bundleDirectory): void
    {
        $initFile = $bundleDirectory.'\\init.php';
        is_file($initFile) ? require_once($initFile): throw new \Illuminate\Contracts\Filesystem\FileNotFoundException($initFile .' | file not found');
    }
}

new Loader();
