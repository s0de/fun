<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 21/01/2019 16:28
 */

namespace Modules\Main\Admin;

use Modules\Admin\Contrib\Admin;
use Modules\Main\Models\Review;

class ReviewAdmin extends Admin
{
    public function getSearchColumns()
    {
        return ['name'];
    }

    public function getModel()
    {
        return new Review;
    }

    public function getName()
    {
        return 'Отзывы';
    }

    public function getItemName()
    {
        return 'Отзыв';
    }
}