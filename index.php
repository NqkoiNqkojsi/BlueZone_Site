<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/index.css">
<link rel="stylesheet" href="CSS/Sc_form.css">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 80%; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Map */
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
  display: none;
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
  display: none;
  font-size: 14px;
  width: 14px;
}
</style>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 42.5002278, lng: 27.4724362 },
            zoom: 16,
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
</script>
</head>
<body>

    <h2>Two Equal Columns</h2>

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

            <button class="button" onclick="loadDoc(x, y, z, false)"> vig</button>
            <span id="smpl_res"></span>
        </div>
    </div>


<!--JS scrpts -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCmpm3iJiQfKu3WoVUxPgxdhub37wsp7s&callback=initMap&libraries=&v=weekly"
    async
></script>
<script
    src="JS/REST_request.js"
    async
></script>
<script
    src="JS/Slid_adr.js"
    async
></script>
<script
    src="JS/REST_upd.js"
    async
></script>

</body>
</html>

