<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/index.css">
<link rel="stylesheet" href="CSS/Sc_form.css">
<script type="text/javascript" src="JSON/streets.js"></script>
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 600px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Map */
html,
body,
#map {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

#data-box {
  top: 10px;
  left: 500px;
  height: 45px;
  line-height: 45px;
  display: block;
}

#data-value {
  font-size: 2em;
  font-weight: bold;
}

#data-label {
  font-size: 2em;
  font-weight: normal;
  padding-right: 10px;
}

#data-label:after {
  content: ":";
}

#data-caret {
  margin-left: -5px;
  display: block;
  font-size: 14px;
  width: 14px;
}

.nicebox {
    position: absolute;
    text-align: center;
    font-family: "Roboto", "Arial", sans-serif;
    font-size: 13px;
    z-index: 5;
    box-shadow: 0 4px 6px -4px #333;
    padding: 5px 10px;
    background: white;
    background: linear-gradient(to bottom, white 0%, whitesmoke 100%);
    border: #e5e5e5 1px solid;
}
</style>
</head>
<body>

    <h2>Намиране на парко място</h2>

    <div class="row">
        <div class="column" style="background-color:#aaa;">
            <div id="data-box" class="nicebox">
                <label id="data-label" for="data-value">Име на улица:</label>
                <span id="data-value"></span>
            </div>
            <div id="map"></div>
        </div>
        <div onload="loadStr()" class="column" style="background-color:#bbb;">
            <select class="sl" id="sl_ulc">
                
            </select>
            <select class="sl" id="sl_adr">
                
            </select>

            <button class="button" onclick="loadDoc2(x, y, z)"> vig</button>
            <h3 id="smpl_res"></h3>
        </div>
    </div>


<!--JS scrpts -->
<script>
console.log(data2)
console.log(data2.streets[0].bound.length);
//Load the markers
var br_mrk = 0;
var mrk = new Array();
var i = 0, j = 0, k = 0;
console.log(br_mrk);
for (street in data2.streets) {
    for (bound in street.bound) {
        mrk[j] = { lat: bound.marker[0], lng: bound.marker[1] };
        br_mrk=br_mrk+1;
    }    
}
var x = "";
var y = "";
var z = "";
var Update = false;
var res_id="";
function loadDoc1(adr_start, adr_end) {
    var street = "";
    for (street1 in data2.streets) {
        for (bound in street1.bound) {
            if (adr_start == bound.marker[0]) {
                if (adr_end == bound.marker[1]) {
                    street = streets1.name;
                    console.log(street);
                }
            }
        }
    }


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

    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 42.5002278, lng: 27.4724362 },
            zoom: 16,
        });

        var i=0;
        var mrk_map;
        /*for(i=0;i<br_mrk;i++){
            // Add a marker at the center of the map.
            mrk_map=addMarker(mrk[i], map);
            google.maps.event.addListener(mrk_map, "click", (event) => {
                loadDoc1(mrk[i].lat, mrk[i].lng);
            });
        }*/
        mrk_map=addMarker(lat: 42.497897, lng: 27.474230, map);
        google.maps.event.addListener(mrk_map, "click", (event) => {
            loadDoc1(42.497897, 27.474230);
        });

        mrk_map=addMarker(lat: 42.498452, lng: 27.475315, map);
        google.maps.event.addListener(mrk_map, "click", (event) => {
            loadDoc1(42.498452, 27.475315);
        });


        var mapStyle = [{
            'featureType': 'all',
            'elementType': 'all',
            'stylers': [{'visibility': 'off'}]
        }, {
            'featureType': 'landscape',
            'elementType': 'geometry',
            'stylers': [{'visibility': 'on'}, {'color': '#fcfcfc'}]
        }, {
            'featureType': 'water',
            'elementType': 'labels',
            'stylers': [{'visibility': 'off'}]
        }, {
            'featureType': 'water',
            'elementType': 'geometry',
            'stylers': [{'visibility': 'on'}, {'hue': '#5f94ff'}, {'lightness': 60}]
        }];
    }

function loadAdr(street) {
    x = street;
    var sum = 0;
    var i = 0, j=0;
    for (street1 in data2.streets) {
        for (bound in street1.bound) {
            var opt = document.createElement("option");
            var node = document.createTextNode("От " + bound.start + " до " + bound.end);
            var node1 = para.addEventListener("click", "x=" + bound.start + "y=" + bound.end)
            para.appendChild(node);

            var element = document.getElementById("sl_adr");
            element.appendChild(para);
        }
    }
}

//Load the Street
var sum = 0;
var i = 0, j = 0;
for (street in data2.streets) {
    var opt = document.createElement("option");
    var node = document.createTextNode("Ул. " + street.name);
    var node1 = para.addEventListener("click", "loadAdr('" + street.name+"')")
    para.appendChild(node);

    var element = document.getElementById("sl_ulc");
    element.appendChild(para);
}
</script>
<script
    src="JS/REST_upd.js"
></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCmpm3iJiQfKu3WoVUxPgxdhub37wsp7s&callback=initMap&libraries=&v=weekly"
    async
></script>
</body>
</html>

