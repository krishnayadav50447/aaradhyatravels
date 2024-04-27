//javascript.js
//set map options
var myLatLng = { lat: 28.7041, lng: 77.1025 };
var mapOptions = {
    center: myLatLng,
    zoom: 11,
    mapTypeId: google.maps.MapTypeId.ROADMAP

};

//create map
var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();

//bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);


//define calculateRoute function
function calculateRoute(param=""){
    //create request
    // console.log(document.getElementById("from").value);
    // console.log(document.getElementById("to").value);
    var request = {
        origin: document.getElementById("from").value,
        destination: document.getElementById("to").value,
        travelMode: google.maps.TravelMode.DRIVING,     //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.METRIC       //google.maps.UnitSystem.IMPERIAL
    }

    //pass the request to the route method
    directionsService.route(request, function (result, status) {
        if(status == google.maps.DirectionsStatus.OK){
            // console.log(result);

            //Get distance and time
            const output = document.querySelector('#output');
            output.innerHTML =
            "<div class='w-100'>"+
                "<div class='d-none'>"+
                    "<input type='hidden' name='map_distance' id='map_distance' value='"+result.routes[0].legs[0].distance.text+"'>"+
                    "<input type='hidden' name='map_distance' id='map_duration' value='"+result.routes[0].legs[0].duration.text+"'>"+
                "</div>"+
                "<div class='div_from_to'>"+
                    "<i class='fa-solid fa-arrow-down-long'></i>"+
                    "<div class='from_to' style='min-height: 35px;'><strong>From: </strong><p>" + document.getElementById("from").value + ".</p></div>"+
                    "<div class='from_to'><strong>To: </strong><p>" + document.getElementById("to").value + ".</p></div>"+
                "</div>"+
                "<div class='distance_time'>"+
                    "<div><strong>Distance:</strong><p>" + result.routes[0].legs[0].distance.text + ".</p></div>"+
                    "<div><strong><i class='fas fa-clock fs_12'></i></strong><p>" + result.routes[0].legs[0].duration.text + ".</p></div>"+
                "</div>"+
            "</div>";

            //display route
            directionsDisplay.setDirections(result);

            if(param=="fetch_vehicle"){
                get_all_vehicle();
            }

            if(param=="fetch_vehicle_details"){
                get_vehicle_for_details();
            }

            document.getElementById("calculateRouteId").style.display="none";
            document.getElementById("submitFormId").style.display="block";
        }else{
            //delete route from map
            directionsDisplay.setDirections({ routes: [] });
            //center map in London
            map.setCenter(myLatLng);

            //show error message
            output.innerHTML = "<div class='alert-danger'><i class='fas fa-exclamation-triangle'></i> Could not retrieve driving distance.</div>";
            
            document.getElementById("calculateRouteId").style.display="block";
            document.getElementById("submitFormId").style.display="none";
        }
    });
}