$(document).ready(function ($) {
    ymaps.ready(init);
    mapHeight();
    $(window).resize(function() {
        mapHeight();
    });
});

function init() {
    var coordinates = [55.706776, 37.710323];
    var myMap = new ymaps.Map('map', {
        center: coordinates,
        zoom: 15,
        controls: []
    },{
        suppressMapOpenBlock: true
    });

    var icon = ymaps.templateLayoutFactory.createClass('<div class="map-point"></div>');
    addingPoints(myMap, coordinates, icon);

    // myMap.geoObjects.events.add('click', function (e) {
    //     var data = e.get('target').properties._data;
    //     window.location.href = '/' + data.baseType + '?id=' + data.baseId;
    // });
}

function addingPoints(myMap, coordinates, icon) {
    var place = new ymaps.Placemark(coordinates,{
            hintContent: window.address
        },{
            iconLayout: icon,
            iconShape: {
                // type: 'Rectangle',
                // coordinates: [
                //     [-30, -30], [30, 30]
                // ]
                type: 'Circle',
                coordinates: [0, 0],
                radius: 55
            }
        }
    );
    myMap.geoObjects.add(place);
}

function mapHeight() {
    var map = $('#map'),
        windowHeight = $(window).height();
    if (windowHeight < 800) map.css('height',windowHeight);
    else map.css('height',windowHeight/1.5);
}