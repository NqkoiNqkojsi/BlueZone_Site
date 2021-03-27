var x = "";
var y = "";
var z = "";
var Update = false;
var res_id="";
function loadDoc1(adr_start, adr_end) {
    var street = "";
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var MrkObj = JSON.parse(this.responseText);
            console.log(MrkObj);
            var i = 0, j = 0, k = 0;
            br_mrk = MrkObj.streets[i].bound.lenght;
            console.log(br_mrk);
            for (i = 0; i < MrkObj.streets.lenght; i++) {
                for (j = 0; j < MrkObj.streets[i].bound.lenght; j++) {
                    if (adr_start == MrkObj.streets[i].bound.marker[0]) {
                        if (adr_end == MrkObj.streets[i].bound.marker[1]) {
                            street = MrkObj.streets[i].name;
                            console.log(street);
                        }
                    }
                }
            }
        }
    };
    xhttp.open("GET", "JSON/streets.json", true);
    xhttp.send();


    res_id = "data-value";
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var jsonObj = JSON.parse(this.responseText);
            var sum = 0;
            var i = 0;
            for (i; i < jsonObj.br; i++) {
                sum = sum + jsonObj.space;
            }
            document.getElementById(res_id).innerHTML = sum;
        }
    };
    xhttp.open("GET", "" + "?str=" + street + "&adr_st=" + adr_start + "&adr_end" + adr_end, true);
    xhttp.send();
}


function loadDoc2(street, adr_start, adr_end) {

    res_id = "data-value";
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var jsonObj = JSON.parse(this.responseText);
            var sum = 0;
            var i = 0;
            for (i; i < jsonObj.br; i++) {
                sum = sum + jsonObj.space;
            }
            document.getElementById(res_id).innerHTML = sum;
        }
    };
    xhttp.open("GET", "" + "?str=" + street + "&adr_st=" + adr_start + "&adr_end" + adr_end, true);
    xhttp.send();
}
