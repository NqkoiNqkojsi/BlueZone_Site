function loadAdr(street) {
    x = street;
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var StrObj = JSON.parse(this.responseText);
            var sum = 0;
            var i = 0, j=0;
            for (i; i < StrObj.streets.lenght; i++) {
                for (j; j < StrObj.streets[i].bound.lenght; j++) {
                    var opt = document.createElement("option");
                    var node = document.createTextNode("От " + StrObj.streets[i].bound[j].start + " до " + StrObj.streets[i].bound[j].end);
                    var node1 = para.addEventListener("click", "x=" + StrObj.streets[i].bound[j].start + "y=" + StrObj.streets[i].bound[j].end)
                    para.appendChild(node);

                    var element = document.getElementById("sl_adr");
                    element.appendChild(para);
                }
            }
        }
    };
    xhttp.open("GET", "JSON/streets.json", true);
    xhttp.send();
}

function loadStr() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var StrObj = JSON.parse(this.responseText);
            var sum = 0;
            var i = 0, j = 0;
            for (i; i < StrObj.streets.lenght; i++) {
                var opt = document.createElement("option");
                var node = document.createTextNode("Ул. " + StrObj.streets[i].name);
                var node1 = para.addEventListener("click", "loadAdr('" + StrObj.streets[i].name+"')")
                para.appendChild(node);

                var element = document.getElementById("sl_ulc");
                element.appendChild(para);
            }
        }
    };
    xhttp.open("GET", "JSON/streets.json", true);
    xhttp.send();
}