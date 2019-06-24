<?php


namespace Modules\Main\Commands;

class ControllerCommand extends CreatorCommand
{
    public function handle()
    {
        //Имя для папки в которой находится объект
        $verbosePath = 'Controllers';
        //Имя для логов в консоли
        $verboseName = 'Controller';
        //Имя для создания файла(добавляется к введенному значению...Например User + $verboseFile='Admin'.php => UserAdmin.php)
        $verboseFile = 'Controller';
        $moduleName = readline('name of module: ');
        $controllerName = readline('name of controller: ');
        $content = "<?php\n\nnamespace Modules\\" . $moduleName . "\\Controllers;\n\nuse Phact\\Controller\\Controller;\n\n\nclass " . $controllerName . "Controller extends Controller\n{\n\tpublic function index()\n\t{\n\n\t}\n}";

        $this->createCreatorEntity($moduleName, $controllerName, $content, $verbosePath, $verboseName, $verboseFile);
    }
}
