
var br_mrk = 0;
var mrk = new Array();
var i = 0, j = 0, k = 0;
br_mrk = data2.streets[i].bound.lenght;
console.log(br_mrk);
for (i = 0; i < data2.streets.lenght; i++) {
    for (j = 0; j < data2.streets[i].bound.lenght; j++) {
        mrk[j] = { lat: data2.streets[i].bound.marker[0], lng: data2.streets[i].bound.marker[1] };
    }    
}