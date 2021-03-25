var x = "";
var y = "";
var z = "";
var res_id="";
function loadDoc(street, address_start, addres_end, wh) {
    if (wh == true) {
        res_id = "data-value";
    } else {
        res_id = "smpl_res";
    }
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var jsonObj = JSON.parse(this.responseText);
            var sum = 0;
            var i = 0;
            for (i; i < jsonObj.br; i++) {
                sum = sum + jsonObj.str;
            }
            document.getElementById(res_id).innerHTML = jsonObj.space;
        }
    };
    xhttp.open("GET", "" + "?str=" + street + "&adr="+address, true);
    xhttp.send();
}
