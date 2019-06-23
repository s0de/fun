<?php

namespace Modules\Main\Commands;


class ModelCommand extends CreatorCommand
{
    public function handle()
    {
        //Имя для папки в которой находится объект
        $verbosePath = 'Models';
        //Имя для логов в консоли
        $verboseName = 'Model';
        //Имя для создания файла(добавляется к введенному значению...Например User + $verboseFile='Admin'.php => UserAdmin.php)
        $verboseFile = null;
        $moduleName = readline('name of module: ');
        $modelName = readline('name of model: ');
        $isAdminCreate = readline('create admin model?[Y/n]: ');

        $adminContent = null;

        if ($isAdminCreate === 'y' || $isAdminCreate === 'Y') {
            $adminListName = readline('name list in admin: ');
            $adminItemName = readline('name item in admin: ');
            $adminContent = "<?php\n\nnamespace Modules\\" . $moduleName . "\\Admin;\n\nuse Modules\\Admin\\Contrib\\Admin;\nuse Modules\\" . $moduleName . "\\Models\\" . $modelName . ";\n\nclass " . $modelName . "Admin extends Admin\n{\n\tpublic function getSearchColumns()\n\t{\n\t\treturn ['name'];\n\t}\n\n\tpublic function getModel()\n\t{\n\t\treturn new " . $modelName . ";\n\t}\n\n\tpublic function getName()\n\t{\n\t\treturn '" . $adminListName . "';\n\t}\n\n\tpublic function getItemName()\n\t{\n\t\treturn '" . $adminItemName . "';\n\t}\n}";
            $this->createCreatorEntity($moduleName, $modelName, $adminContent, 'Admin', 'AdminModel', 'Admin');
        }

        $content = "<?php\n\nnamespace Modules\\" . $moduleName . "\\Models;\n\nuse Phact\\Orm\\Model;\n\n\nclass " . $modelName . " extends Model\n{\n\tpublic static function getFields()\n\t{\n\t\treturn [];\n\t}\n}";

        $this->createCreatorEntity($moduleName, $modelName, $content, $verbosePath, $verboseName, $verboseFile);
    }
}
