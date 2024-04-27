//create autocomplete objects for all inputs
var options = {
    fields: ["address_components", "formatted_address", "geometry", "name"],
    strictBounds: false,
    types: ["establishment"],
    componentRestrictions: {country: "in"}
}

var from_input = document.getElementById("from");
var from_autocomplete = new google.maps.places.Autocomplete(from_input, options);
from_autocomplete.addListener("place_changed", from_fillInAddress);
function from_fillInAddress(){
    const place = from_autocomplete.getPlace();
    // console.log(place);

    let address = "";
    let postcode = "";

    for (const component of place.address_components) {
        const componentType = component.types[0];
        switch (componentType) {
            case "street_number":
                address = `${component.long_name} ${address}`;
                break;

            case "route":
                address += component.short_name;
                break;

            case "postal_code": 
                postcode = `${component.long_name}${postcode}`;
                break;

            case "postal_code_suffix": 
                postcode = `${postcode}-${component.long_name}`;
                break;

            case "sublocality":
                document.querySelector("#from_area").value = component.long_name;
                break;

            case "locality":
                document.querySelector("#from_city").value = component.long_name;
                break;

            case "administrative_area_level_3":
                document.querySelector("#from_district").value = component.long_name;
                break;

            case "administrative_area_level_1": 
                document.querySelector("#from_state").value = component.short_name;
                break;

            case "country":
                document.querySelector("#from_country").value = component.long_name;
                break;
        }
    }

    document.querySelector("#from_address").value = address;
    document.querySelector("#from_postcode").value = postcode;
}

var to_input = document.getElementById("to");
var to_autocomplete = new google.maps.places.Autocomplete(to_input, options);
to_autocomplete.addListener("place_changed", to_fillInAddress);
function to_fillInAddress(){
    const place = to_autocomplete.getPlace();
    // console.log(place);

    let address = "";
    let postcode = "";

    for (const component of place.address_components) {
        const componentType = component.types[0];
        switch (componentType) {
            case "street_number":
                address = `${component.long_name} ${address}`;
                break;

            case "route":
                address += component.short_name;
                break;

            case "postal_code": 
                postcode = `${component.long_name}${postcode}`;
                break;

            case "postal_code_suffix": 
                postcode = `${postcode}-${component.long_name}`;
                break;

            case "sublocality":
                document.querySelector("#to_area").value = component.long_name;
                break;

            case "locality":
                document.querySelector("#to_city").value = component.long_name;
                break;

            case "administrative_area_level_3":
                document.querySelector("#to_district").value = component.long_name;
                break;

            case "administrative_area_level_1": 
                document.querySelector("#to_state").value = component.short_name;
                break;

            case "country":
                document.querySelector("#to_country").value = component.long_name;
                break;
        }
    }

    document.querySelector("#to_address").value = address;
    document.querySelector("#to_postcode").value = postcode;
}