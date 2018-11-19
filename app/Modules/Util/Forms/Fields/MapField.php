<?php

namespace Modules\Util\Forms\Fields;

use Phact\Form\Fields\CharField;

class MapField extends CharField
{
    public $inputTemplate = "_fields/map.tpl";

    public $watch = false;

    public $latField = 'address_lat';
    public $lngField = 'address_lng';
    public $zoomField = 'address_zoom';

    public $zoom = 14;
    public $center = [55.753564, 37.621085];

    protected $_hint = "Чтобы указать координаты - щелкните на карту в нужном месте. При необходимости можно воспользоваться поиском в левом верхнем углу. После поиска не забудьте щелкнуть в необходимое здание";
}