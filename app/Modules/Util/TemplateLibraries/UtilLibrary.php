<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 26/07/2018 16:40
 */

namespace Modules\Util\TemplateLibraries;

use Modules\Text\Models\InfoBlock;
use Phact\Template\TemplateLibrary;

class UtilLibrary extends TemplateLibrary
{
    /**
     * @name tel
     * @kind modifier
     */
    public static function tel($phone)
    {
        return preg_replace('/[^0-9\+]/', '', $phone);
    }

    /**
     * @name fetch_text_block
     * @kind accessorFunction
     * @return InfoBlock|null
     */
    public static function fetchTextBlock($key = null)
    {
        $filter = [];
        if ($key) {
            $filter['key'] = $key;
        }
        $block = InfoBlock::objects()->filter($filter)->get();
        if (!$block) {
            $block = new InfoBlock();
            $block->key = $key;
            $block->save();
        }
        return $block;
    }
}