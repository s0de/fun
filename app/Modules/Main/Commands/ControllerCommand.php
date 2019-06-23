<?php


namespace Modules\Main\Commands;

use Phact\Commands\Command;
use Phact\Application\ModulesInterface;
use Phact\Components\PathInterface;

class ControllerCommand extends Command
{
    protected $modules;
    protected $path;

    public function __construct(ModulesInterface $modules, PathInterface $path)
    {
        $this->_modules = $modules;
        $this->_path = $path;
    }
    public function handle()
    {
        $nameModule = readline('name of module: ');
        $nameController = readline('name of controller: ');

        $this->create($nameModule, $nameController);
    }

    public function create($inputModule, $inputController)
    {
        $content = "<?php\n\nnamespace Modules\\" . $inputModule . "\\Controllers;\n\nuse Phact\\Controller\\Controller;\n\n\nclass " . $inputController . "Controller extends Controller\n{\n\tpublic function index()\n\t{\n\n\t}\n}";
        $matchesModule = [];
        $filename = $inputController . 'Controller.php';
        foreach ($this->_modules->getModules() as $moduleName => $module) {
            if ($moduleName === $inputModule) {
                array_push($matchesModule, $moduleName);
                $path = $module->getPath() . DIRECTORY_SEPARATOR . 'Controllers';
                if (!file_exists($path)) {
                    mkdir($path);
                }
                $file = $path . DIRECTORY_SEPARATOR . $filename;
                if (file_exists($file)) {
                    echo $this->color($inputController . 'Controller already exist', 'red');
                    echo PHP_EOL;
                } else {
                    file_put_contents($file, $content);
                    echo $this->color($inputController . 'Controller succesfully created', 'green');
                    echo PHP_EOL;
                }
            }
        }
        if (count($matchesModule) < 1) {
            echo $this->color('Module ' . $inputModule . ' does not exist', 'red', 'black');
            echo PHP_EOL;
        }
    }

    public function getDescription()
    {
        return 'CreateController';
    }
}
