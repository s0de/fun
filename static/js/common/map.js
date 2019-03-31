function initMapGoogle()
{
  /*
  let infowindow = new google.maps.InfoWindow({
    content: '<div class="contacts-lines popup">' + $('.contacts-lines').html() + '</div>'
  });
  */

  let customMapType = new google.maps.StyledMapType([
    {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#e9e9e9"
        },
        {
          "lightness": 17
        }
      ]
    },
    {
      "featureType": "landscape",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#f5f5f5"
        },
        {
          "lightness": 20
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry.fill",
      "stylers": [
        {
          "color": "#ffffff"
        },
        {
          "lightness": 17
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry.stroke",
      "stylers": [
        {
          "color": "#ffffff"
        },
        {
          "lightness": 29
        },
        {
          "weight": 0.2
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#ffffff"
        },
        {
          "lightness": 18
        }
      ]
    },
    {
      "featureType": "road.local",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#ffffff"
        },
        {
          "lightness": 16
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#f5f5f5"
        },
        {
          "lightness": 21
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#dedede"
        },
        {
          "lightness": 21
        }
      ]
    },
    {
      "elementType": "labels.text.stroke",
      "stylers": [
        {
          "visibility": "on"
        },
        {
          "color": "#ffffff"
        },
        {
          "lightness": 16
        }
      ]
    },
    {
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "saturation": 36
        },
        {
          "color": "#333333"
        },
        {
          "lightness": 40
        }
      ]
    },
    {
      "elementType": "labels.icon",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "transit",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#f2f2f2"
        },
        {
          "lightness": 19
        }
      ]
    },
    {
      "featureType": "administrative",
      "elementType": "geometry.fill",
      "stylers": [
        {
          "color": "#fefefe"
        },
        {
          "lightness": 20
        }
      ]
    },
    {
      "featureType": "administrative",
      "elementType": "geometry.stroke",
      "stylers": [
        {
          "color": "#fefefe"
        },
        {
          "lightness": 17
        },
        {
          "weight": 1.2
        }
      ]
    }
  ], {
    name: 'Custom Style'
  });
  let customMapTypeId = 'custom_style';

  document.querySelectorAll('[data-map]').forEach(function initMapElement(mapElement) {
    let map = new google.maps.Map(mapElement, {
      zoom: 14,
      center: {
        lat: parseFloat(mapElement.dataset.lat),
        lng: parseFloat(mapElement.dataset.lng)
      },
      mapTypeControlOptions: {
        mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
      },
      panControl: false,
      zoomControl: true,
      scaleControl: false,
      streetViewControl: false,
      scrollwheel: false,
      mapTypeControl: false
    });

    // map.mapTypes.set(customMapTypeId, customMapType);
    // map.setMapTypeId(customMapTypeId);

    let marker = new google.maps.Marker({
      position: {
        lat: parseFloat(mapElement.dataset.lat),
        lng: parseFloat(mapElement.dataset.lng)
      },
      icon: mapElement.dataset.mark,
      map: map
    });
  });
  /*
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
  */
}

function initMapYandex() {
  document.querySelectorAll('[data-map]').forEach(function initMapElement(mapElement) {
    let myMap = new ymaps.Map(mapElement, {
      center: [parseFloat(mapElement.dataset.lat), parseFloat(mapElement.dataset.lng)],
      zoom: mapElement.dataset.zoom,
      controls: ['zoomControl', 'fullscreenControl']
    }, {
      searchControlProvider: 'yandex#search'
    });

    let myPlacemark = new ymaps.Placemark(myMap.getCenter(), {}, {
      // Опции.
      // Необходимо указать данный тип макета.
      iconLayout: 'default#image',
      // Своё изображение иконки метки.
      iconImageHref: mapElement.dataset.mark,
      // Размеры метки.
      iconImageSize: [43, 57],
      // Смещение левого верхнего угла иконки относительно
      // её "ножки" (точки привязки).
      iconImageOffset: [-21, -57]
    });

    myMap.behaviors.disable('scrollZoom');
    if (window.innerWidth <= 1024) {
      myMap.behaviors.disable('drag');
    }
    myMap.geoObjects.add(myPlacemark);
  });
}
// google.maps.event.addDomListener(window, 'load', initMap);

window.addEventListener('load', () => {
  if (window.google) {
    initMapGoogle();
  }
  if (window.ymaps) {
    ymaps.ready(initMapYandex);
  }
});
