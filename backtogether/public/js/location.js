var x = document.getElementById("formContent");

window.onload = function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(setvals);
    }
}

function setvals(user_coords) {
    document.getElementById("latitude").value = user_coords.coords.latitude;
    document.getElementById("longitude").value = user_coords.coords.longitude;
}