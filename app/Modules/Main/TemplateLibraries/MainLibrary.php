<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 21/01/2019 16:34
 */

namespace Modules\Main\TemplateLibraries;

use Modules\Main\Models\Review;
use Phact\Template\TemplateLibrary;

class MainLibrary extends TemplateLibrary
{
    /**
     * @name get_reviews_columns
     * @kind accessorFunction
     */
    public static function getReviewsColumns()
    {
        $reviews = Review::objects()->order(['position'])->all();
        return array_chunk($reviews, ceil(count($reviews)/2));
    }
}