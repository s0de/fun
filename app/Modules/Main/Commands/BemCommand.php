<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @company OrderTarget
 * @site http://ordertarget.ru
 * @date 11/03/18 16:33
 */

namespace Modules\Main\Commands;


use Phact\Commands\Command;
use Phact\Components\PathInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class BemCommand extends Command
{
    public $blocks = [];
    /**
     * @var PathInterface
     */
    private $path;

    public function __construct(PathInterface $path)
    {
        $this->path = $path;
    }

    public function handle($arguments = [])
    {
        $templatesPath = realpath($this->path->get('base.templates'));
        $blocksPath = realpath($this->path->get('root.static.scss._blocks'));

        $this->collectBlocks($templatesPath);
        $this->makeScss($blocksPath);
    }

    public function collectBlocks($path)
    {
        $blocks = [];
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($rii as $file) {
            if ($file->isDir()){
                continue;
            }

            $this->collectBlocksFromFile($file->getPathname());
        }
    }

    public function collectBlocksFromFile($path)
    {
        $templateData = file_get_contents($path);
        if (preg_match_all('/([a-z\-0-9]+)__([a-z\-0-9]+)(_([a-z\-0-9]+)(_([a-z\-0-9]+))?)?/', $templateData, $out)) {
            foreach ($out[0] as $key => $item) {
                $blockName = $out[1][$key];
                $elementName = $out[2][$key];

                if (!isset($this->blocks[$blockName])) {
                    $this->blocks[$blockName] = [];
                }
                if (!array_key_exists($elementName, $this->blocks[$blockName])) {
                    $this->blocks[$blockName][$elementName] = [];
                }
                if (isset($out[4][$key]) && $out[4][$key]) {
                    $elementModifierName = $out[4][$key];
                    if (!array_key_exists($elementModifierName, $this->blocks[$blockName][$elementName])) {
                        $this->blocks[$blockName][$elementName][$elementModifierName] = [];
                    }
                    if (isset($out[6][$key]) && $out[6][$key]) {
                        $elementModifierValue = $out[6][$key];
                        if (!in_array($elementModifierValue, $this->blocks[$blockName][$elementName][$elementModifierName])) {
                            $this->blocks[$blockName][$elementName][$elementModifierName][] = $elementModifierValue;
                        }
                    }
                }
            }
        }
    }

    public function makeScss($path)
    {
        $files = scandir($path);
        $index = $path . DIRECTORY_SEPARATOR . '__index.scss';

        foreach ($this->blocks as $block => $elements) {
            $filename = "_{$block}.scss";
            if (!in_array($filename, $files)) {
                $content = "";
                $content .= ".{$block} {\n";
                $firstElement = true;
                foreach ($elements as $element => $modifiers) {
                    if ($firstElement) {
                        $firstElement = false;
                    } else {
                        $content .= "\n";
                    }
                    $content .= "  &__{$element} {\n";
                    if ($modifiers) {
                        $firstModifier = true;
                        foreach ($modifiers as $modifierName => $modifierValues) {
                            if ($firstModifier) {
                                $firstModifier = false;
                            } else {
                                $content .= "\n";
                            }
                            $content .= "    &_{$modifierName} {\n";
                            if ($modifierValues) {
                                $firstModifierValue = true;
                                foreach ($modifierValues as $modifierValue) {
                                    if ($firstModifierValue) {
                                        $firstModifierValue = false;
                                    } else {
                                        $content .= "\n";
                                    }
                                    $content .= "      &_{$modifierValue} {\n";
                                    $content .= "\n";
                                    $content .= "      }\n";
                                }
                            } else {
                                $content .= "\n";
                            }
                            $content .= "    }\n";
                        }
                    } else {
                        $content .= "\n";
                    }
                    $content .= "  }\n";
                }
                $content .= "}";
                file_put_contents($path . DIRECTORY_SEPARATOR . $filename, $content);
                file_put_contents($index, "\n@import \"{$block}\";", FILE_APPEND);
            }
        }
    }
}