<?php

namespace Modules\Main\Commands;

use Phact\Commands\Command;
use Phact\Application\ModulesInterface;
use Phact\Components\PathInterface;

abstract class CreatorCommand extends Command
{
    protected $modules;
    protected $path;

    public function __construct(ModulesInterface $modules, PathInterface $path)
    {
        $this->_modules = $modules;
        $this->_path = $path;
    }



    public function createCreatorEntity($moduleInput, $creatorInput, $content, $verbosePath, $verboseName, $verboseFile)
    {
        $matchesModule = [];
        $filename = $creatorInput . $verboseFile . '.php';
        foreach ($this->_modules->getModules() as $moduleName => $module) {
            if ($moduleName === $moduleInput) {
                array_push($matchesModule, $moduleName);
                $path = $module->getPath() . DIRECTORY_SEPARATOR . $verbosePath;
                if (!file_exists($path)) {
                    mkdir($path);
                }
                $file = $path . DIRECTORY_SEPARATOR . $filename;
                if (file_exists($file)) {
                    echo $this->color($verboseName . ' ' . $creatorInput . " already exist", 'red');
                    echo PHP_EOL;
                } else {
                    file_put_contents($file, $content);
                    echo $this->color($verboseName . ' ' . $creatorInput . ' succesfully created', 'green');
                    echo PHP_EOL;
                }
            }
        }
        if (count($matchesModule) < 1) {
            echo $this->color('Module ' . $moduleInput . ' does not exist', 'red', 'black');
            echo PHP_EOL;
        }
    }
}
