class Table {

    constructor(nameTable, tableElement, responsePanel) {

        this.nameTable = nameTable;
        this.tableElement = tableElement;
        this.getTable(this.nameTable);
        if (responsePanel == undefined) {
            this.responsePanel = document.getElementById("info")
        } else {
            this.responsePanel = responsePanel;
        }
    }

    getTable() {
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        var self = this;
        formData.append("getTable", this.nameTable);
        xhr.open("POST", "/cars/application/requests/index.php");
        xhr.send(formData);
        xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var responseJSON = JSON.parse(this.responseText);
                if (responseJSON.level == 0) {
                    self.jsonToTable(responseJSON.data);
                }
            }
        }
    }

    jsonToTable(json) {
        this.Array = [];
        var self = this;
        this.tableElement.innerHTML = "";
        var tblHead = document.createElement("thead");
        var tblTr = document.createElement("tr");
        this.tableElement.appendChild(tblHead);
        tblHead.appendChild(tblTr);
        for (var key in json[0]) {
            var tblTh = document.createElement("th");
            tblTh.innerHTML = key;
            tblTr.appendChild(tblTh);
        }
        var tblBody = document.createElement("tbody");
        this.tableElement.appendChild(tblBody);
        for (var i = 0; i < json.length; i++) {
            var tblTr = document.createElement("tr");
            for (var key in json[i]) {
                this.Array[this.Array.length] = document.createElement("td");
                this.Array[this.Array.length - 1].innerHTML = json[i][key];

                this.Array[this.Array.length - 1].addEventListener("click", (function (element, object, keyA) {
                    return function () {
                        self.editTable(element, object, keyA);
                    };
                })(this.Array[this.Array.length - 1], json[i], key), true);
                tblTr.appendChild(this.Array[this.Array.length - 1]);
            }
            tblBody.appendChild(tblTr);
        }
    }

    editTable(element, object, key) {
        element.innerHTML = "";
        var self = this;
        var textField = document.createElement("input");
        element.appendChild(textField);
        textField.focus();
        textField.addEventListener("focusout", function () {
            var newObject = {};
            for (var keys in object) {
                if (keys != key) {
                    newObject[keys] = object[keys];
                } else {
                    newObject[keys] = textField.value;
                }
            }
            var formData = new FormData();
            var xhr = new XMLHttpRequest();
            formData.append("oldData", JSON.stringify(object));
            formData.append("newData", JSON.stringify(newObject));
            formData.append("editRecord", self.nameTable);
            xhr.open("POST", "/cars/application/requests/index.php");
            xhr.send(formData);
            xhr.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    var responseJSON = JSON.parse(this.responseText);
                    printResponse(responseJSON, self.responsePanel);
                    self.getTable();
                }
            }
        });

    }
}


function jsonToTable(json, table) {
    var tblHead = document.createElement("thead");
    var tblTr = document.createElement("tr");
    table.appendChild(tblHead);
    tblHead.appendChild(tblTr);
    for (var key in json[0]) {
        var tblTh = document.createElement("th");
        tblTh.innerHTML = key;
        tblTr.appendChild(tblTh);
    }
    var tblBody = document.createElement("tbody");
    table.appendChild(tblBody);
    for (var i = 0; i < json.length; i++) {
        var tblTr = document.createElement("tr");
        for (var key in json[i]) {
            var tblTd = document.createElement("td");
            tblTd.innerHTML = json[i][key];
            tblTr.appendChild(tblTd);
        }
        tblBody.appendChild(tblTr);
    }
}