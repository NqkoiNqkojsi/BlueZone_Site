function loadAdr(street) {
    x = street;
    var sum = 0;
    var i = 0, j=0;
    for (i; i < data2.streets.lenght; i++) {
        for (j; j < data2.streets[i].bound.lenght; j++) {
            var opt = document.createElement("option");
            var node = document.createTextNode("От " + data2.streets[i].bound[j].start + " до " + data2.streets[i].bound[j].end);
            var node1 = para.addEventListener("click", "x=" + data2.streets[i].bound[j].start + "y=" + data2.streets[i].bound[j].end)
            para.appendChild(node);

            var element = document.getElementById("sl_adr");
            element.appendChild(para);
        }
    }
}


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