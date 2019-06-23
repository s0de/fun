<?php

namespace Modules\Main\Commands;

class AdminModelCommand extends CreatorCommand
{
    public function handle()
    {
        //Имя для папки в которой находится объект
        $verbosePath = 'Admin';
        //Имя для логов в консоли
        $verboseName = 'AdminModel';
        //Имя для создания файла(добавляется к введенному значению...Например User + 'Admin'.php)
        $verboseFile = 'Admin';

        $moduleName = readline('name of module: ');
        $modelName = readline('name of model: ');
        $adminListName = readline('name list in admin: ');
        $adminItemName = readline('name item in admin: ');

        $content = "<?php\n\nnamespace Modules\\" . $moduleName . "\\Admin;\n\nuse Modules\\Admin\\Contrib\\Admin;\nuse Modules\\" . $moduleName . "\\Models\\" . $modelName . ";\n\nclass " . $modelName . "Admin extends Admin\n{\n\tpublic function getSearchColumns()\n\t{\n\t\treturn ['name'];\n\t}\n\n\tpublic function getModel()\n\t{\n\t\treturn new " . $modelName . ";\n\t}\n\n\tpublic function getName()\n\t{\n\t\treturn '" . $adminListName . "';\n\t}\n\n\tpublic function getItemName()\n\t{\n\t\treturn '" . $adminItemName . "';\n\t}\n}";

        $this->createCreatorEntity($moduleName, $modelName, $content, $verbosePath, $verboseName, $verboseFile);
    }
}
