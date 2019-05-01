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
// $('.formSearch').submit(function (event) {
//     event.preventDefault();
//     var Data = $('.formSearch').serialize();
//     if (Data !== "") {
//         $.ajax({
//             url: "dev.php",
//             dataType: 'JSON',
//             type: 'post',
//             data: Data
//         }).done(function (result) {
//             console.log(result);
//             $('.results .title').html('Résultats de votre recherche :');
//             var dataTable = $('#table_id tbody');
//             dataTable.empty();
//             $.each(result,function (i,elem) {
//                 dataTable.append('<tr><td>'+elem.location_name+'</td><td>'+elem.location_category.toUpperCase()+'</td><td>'+elem.location_lat+'</td><td>'+elem.location_long+'</td></tr>')
//             })
//
//         });
//     }
// });

