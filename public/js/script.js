function geoloc() {
    var geoSuccess = function (position) {
        startPos = position;
        userlat = startPos.coords.latitude;
        userlon = startPos.coords.longitude;
        $('#currentLat').text(userlat);
        $('#currentLon').text(userlon);
        $('input[name="currentLat"]').val(userlat);
        $('input[name="currentLon"]').val(userlon);
    };
    var geoFail = function () {
        $('.currentPosition').html('<p style="color: red">Vous devez autoriser la position</p>')
    };
    navigator.geolocation.getCurrentPosition(geoSuccess, geoFail);
}

