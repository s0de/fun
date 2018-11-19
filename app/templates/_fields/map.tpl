{include "forms/field/default/input.tpl"}

{$.dependency_js('http://api-maps.yandex.ru/2.1/?lang=ru_RU')}

<div style="height: 350px;margin-top: 20px;margin-bottom: 20px;" id="{$id}-map"></div>
{inline_js}
    {set $form = $field->getForm()}
    {set $latField = $form->getField($field->latField)}
    {set $lngField = $form->getField($field->lngField)}
    {set $zoomField = $form->getField($field->zoomField)}

    {set $center = $field->center}
    {if $latField && $lngField && $latField->getValue() && $lngField->getValue()}
        {set $center = [$latField->getValue(), $lngField->getValue()]}
    {/if}
    {set $zoom = $field->zoom}
    {if $zoomField && $zoomField->getValue()}
        {set $zoom = $zoomField->getValue()}
    {/if}

    <script>

      ymaps.ready(function () {
        var points = new ymaps.GeoObjectCollection({ }, {
          preset: 'islands#redDotIcon'
        });
        var map = new ymaps.Map('{$id}-map', {
          center: {raw $center|json_encode},
          zoom: {$zoom},
          controls: ['zoomControl', 'searchControl']
        });
        map.behaviors.disable('scrollZoom');
        var center = map.getCenter();
        points.add(new ymaps.GeoObject({
          geometry: {
            type: 'Point',
            coordinates: center
          }
        }));
        map.geoObjects.add(points);

        function setCoordinates(lat, lng) {
            {if $lngField && $latField}
          var lngField = document.querySelector('#{$lngField->getHtmlId()}');
          var latField = document.querySelector('#{$latField->getHtmlId()}');

          lngField.value = lng;
          latField.value = lat;
            {/if}
        }

        function setPointTo(coords) {
          points.removeAll();
          points.add(new ymaps.GeoObject({
            geometry: {
              type: 'Point',
              coordinates: coords
            }
          }));
        }

          {if $lngField && $latField}
            var latField = document.querySelector('#{$latField->getHtmlId()}');
            var lngField = document.querySelector('#{$lngField->getHtmlId()}');

              {if $zoomField}
                var zoomField = document.querySelector('#{$zoomField->getHtmlId()}');
              {/if}

            latField.value = center[0].toPrecision(6);
            lngField.value = center[1].toPrecision(6);

          {if $zoomField}
            zoomField.value = map.getZoom();
            map.events.add('boundschange', function (e) {
              zoomField.value = map.getZoom();
            });
          {/if}

        map.events.add('click', function (e) {
          var coords = e.get('coords');

            {if $zoomField}
              zoomField.value = map.getZoom();
                {/if}

              setCoordinates(
                coords[0].toPrecision(6),
                coords[1].toPrecision(6)
              );
              setPointTo(coords);
            });
          {/if}

          {if $field->watch}
            var $address = $('#{$id}');
            function geocode(address) {
              let myGeocoder = ymaps.geocode(address);
              myGeocoder.then((res) => {
                if (res.geoObjects.get(0)) {
                  let coordinates = res.geoObjects.get(0).geometry.getCoordinates();
                  setCoordinates(
                    coordinates[0].toPrecision(6),
                    coordinates[1].toPrecision(6)
                  );
                  map.setCenter(coordinates);
                  setPointTo(coordinates);
                }
              })
            }

          {block 'geocode'}
            $address.on('input', function (e) {
              geocode($address.val());
            });
          {/block}
          {/if}
      });
    </script>
{/inline_js}