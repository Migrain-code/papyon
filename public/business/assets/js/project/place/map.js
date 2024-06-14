let map;
let marker = null;

function initAutocomplete() {
    // Harita başlatma kodu burada
    var businessLat = '41.0250244963033';
    var businessLong = '40.51829611874486';
    if (isNaN(businessLat) || isNaN(businessLong)) {
        businessLat = 41.0250244963033; // Varsayılan enlem
        businessLong = 40.51829611874486; // Varsayılan boylam
    }
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: parseFloat(businessLat), lng: parseFloat(businessLong) },
        zoom: 12,
        mapTypeId: "roadmap",
    });

    // Harita üzerine tıklama olayı
    google.maps.event.addListener(map, 'click', function(event) {
        if (marker !== null) {
            marker.setMap(null);
        }

        var latitude = event.latLng.lat();
        var longitude = event.latLng.lng();

        addEmbed(latitude, longitude);

        reverseGeocode(latitude, longitude);

        marker = new google.maps.Marker({
            position: { lat: latitude, lng: longitude },
            map: map,
            title: 'Selected Location'
        });

        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;

    });

    // Sayfa yüklendiğinde işletme konumu veya varsayılan konumu göster
    $(function () {
        marker = new google.maps.Marker({
            position: { lat: parseFloat(businessLat), lng: parseFloat(businessLong) },
            map: map,
            title: 'Selected Location'
        });
    });

    // Adres arama işlevselliği
    const input = document.getElementById("searchInput");
    const searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
    });

    searchBox.addListener("places_changed", () => {
        const places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        if (marker !== null) {
            marker.setMap(null);
        }

        const bounds = new google.maps.LatLngBounds();

        places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) {
                console.log("Returned place contains no geometry");
                return;
            }
            const latitude = place.geometry.location.lat();
            const longitude = place.geometry.location.lng();

            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
            addEmbed(latitude, longitude);
            reverseGeocode(latitude, longitude);
            marker = new google.maps.Marker({
                map: map,
                title: place.name,
                position: place.geometry.location,
            });

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });

        map.fitBounds(bounds);
    });
}
function addEmbed(latitude,longitude){
    var embedUrl = `https://www.google.com/maps/embed/v1/place?q=${latitude},${longitude}&key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U`;
    var embed = `<iframe width="100%" height="350" frameborder="0" style="border:0;border-radius: 15px"
                    src="${embedUrl}" allowfullscreen></iframe>`
    $('#embed').val(embed);

}
function reverseGeocode(latitude, longitude) {
    var geocodingUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=AIzaSyBcMXrk2ldIslFsanG5wUm5EuuTjkLfl8U`;

    fetch(geocodingUrl)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if (data.status === "OK") {
                var selectedAddress = data.results[0].formatted_address;
                $('#address').text(selectedAddress);
            } else {
                console.log("Adres alınamadı.");
            }
        })
        .catch(error => {
            console.log("Hata Adres Alınamadı");
        });
}

// Enter tuşunu engelleme işlemi
document.getElementById("searchInput").addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        return false;
    }
});
