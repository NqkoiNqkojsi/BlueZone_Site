
var br_mrk = 0;
var mrk = new Array();

function loadMrk() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var MrkObj = JSON.parse(this.responseText);
            console.log(MrkObj);
            var sum = 0;
            var i = 0, j = 0, k = 0;
            br_mrk = MrkObj.streets[i].bound.lenght;
            console.log(br_mrk);
            for (i=0; i < MrkObj.streets.lenght; i++) {
                for (j=0; j < MrkObj.streets[i].bound.lenght; j++) {
                    mrk[j] = { lat: MrkObj.streets[i].bound.marker[0], lng: MrkObj.streets[i].bound.marker[1] };
                }    
            }
        }
    };
    xhttp.open("GET", "JSON/streets.json", true);
    xhttp.send();
}