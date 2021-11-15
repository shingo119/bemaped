var urlPrm = new Object;
var urlSearch = location.search.substring(1).split('&');
for (i = 0; urlSearch[i]; i++) {
    var kv = urlSearch[i].split('=');
    urlPrm[kv[0]] = kv[1];
}
console.log(urlPrm.sample1);
console.log(urlPrm.sample2);

function GetMap() {
    const map = new Bmap("#myMap");
    map.startMap(Number(urlPrm.sample1), Number(urlPrm.sample2), "canvasLight", 10);
    map.pinIcon(Number(urlPrm.sample1), Number(urlPrm.sample2), "img/red-pin.png", 1.0, 16, 32);
}

