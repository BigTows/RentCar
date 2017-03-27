function jsonToTable(json,table) {
    var tblHead = document.createElement("thead");
    var tblTr = document.createElement("tr");
    table.appendChild(tblHead);
    tblHead.appendChild(tblTr);
    for (var key in json[0]){
        var tblTh = document.createElement("th");
        tblTh.innerHTML=key;
        tblTr.appendChild(tblTh);
    }
    var tblBody = document.createElement("tbody");
    table.appendChild(tblBody);
    for (var i = 0; i< json.length;i++){
        var tblTr = document.createElement("tr");
        for (var key in json[i]){
            var tblTd = document.createElement("td");
            tblTd.innerHTML=json[i][key];
            tblTr.appendChild(tblTd);
        }
        tblBody.appendChild(tblTr);
    }
}