<?php

namespace Modules\Main\Models;

use Phact\Orm\Model;


class Main extends Model
{
	public static function getFields()
	{
		return [];
	}

	public function __toString()
	{
		return (string)$this->name;
	}
}