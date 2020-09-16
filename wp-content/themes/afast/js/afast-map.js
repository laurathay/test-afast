    google.maps.event.addDomListener(window, 'load', initMap);
    var map;
    // https://www.google.fr/maps/@46.903623,6.354928,3a,75y,211.54h,84.88t/data=!3m5!1e1!3m3!1s9yHS2-Fq5QMAAAQZLDMeRQ!2e0!3e2!6m1!1e1
    // https://www.google.fr/maps/place/45%C2%B056'08.5%22N+4%C2%B039'19.2%22E/@45.9356926,4.6378237,5098m/data=!3m2!1e3!4b1!4m2!3m1!1s0x0:0x0?hl=fr
    // 45.935692, 4.655336
    var myPos = new google.maps.LatLng(45.935692,4.655336);
    function initMap() {
        var mapOptions = {

            center: myPos,
            zoom: 9,
            zoomControl: true,
            zoomControlOptions: {
                // style : google.maps.ZoomControlStyle.LARGE
               style: google.maps.ZoomControlStyle.SMALL
                 // position: google.maps.ControlPosition.LEFT_CENTER
                // style: google.maps.ZoomControlStyle.SMALL,
            },
            disableDoubleClickZoom: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                // style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            },
            scaleControl: true,
            scrollwheel: false,
            panControl: true,
            streetViewControl: false,
            draggable : true,
            overviewMapControl: false,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{"stylers":[{"visibility":"on"},{"saturation":-100},{"gamma":0.54}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#4d4946"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"gamma":0.48}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"gamma":7.18}]}],
        }
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var pinColor = "e6222e";
        var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor);

        // var image = 'http://www.bijouterie-lorade.fr/wp-content/themes/lorade/images/marker.png';
        // var locations = [
// ['Bijouterie L\'Orade', 'Bijouterie & Joaillerie – Pontarlier<br /><br />Au centre-ville de Pontarlier, L’Orade présente un choix exceptionnel de  bagues, bracelets, colliers, boucles d’oreilles, gourmettes et montres dans un large éventail de prix. De la création fantaisie aux très grandes pièces de prestige.<br />Tous deux joailliers et bijoutiers de métier, Adeline et Laurent Lambert ont l’art de composer tout au long de l’année de sublimes sélections «Plaisir et Emotion ». Des collections Tradition, Glamour et Fashion.', '+33 3 81 39 19 52', 'undefined', 'www.bijouterie-lorade.fr', 46.9034811, 6.3548135, 'http://www.bijouterie-lorade.fr/wp-content/themes/lorade/images/marker.png']
        // ];
        // for (i = 0; i < locations.length; i++) {
        //     if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
        //     if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
        //     if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
        //    if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
        //    if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
            var marker = new google.maps.Marker({
                // icon: markericon,
                icon: pinImage,
                position: myPos,
                map: map
                // title: locations[i][0],
                // desc: description,
                // tel: telephone,
                // email: email,
                // web: web
            });
// link = '';     
// }

}
