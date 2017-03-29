/**
 * @TODO fix Bug: if table have 0 rows, then can't send new data
 * @TODO clean code: multi XHR (maybe create function);
 */
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
        var tblTh = document.createElement("th");
        tblTh.innerHTML = "Действия";
        tblTr.appendChild(tblTh);

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
            this.Array[this.Array.length] = document.createElement("td");
            this.Array[this.Array.length - 1].innerHTML = "<img style='width: 25px;height: 25px;' src='http://lh5.ggpht.com/7t__9ZQRqNdJwvwMLF5ZPlQlrxGWFLnISZ5t2GNp43IOepCcVIHFUZJelrH7Isj0kA=w256'>";

            this.Array[this.Array.length - 1].addEventListener("click", (function (object) {
                return function () {
                    self.deleteTable(object);
                };
            })(json[i]), true);
            tblTr.appendChild(this.Array[this.Array.length - 1]);
            tblBody.appendChild(tblTr);
        }
        var tblTr = document.createElement("tr");
        this.inputArray = [];
        for (var key in json[i - 1]) {
            this.Array[this.Array.length] = document.createElement("td");
            this.inputArray[key] = document.createElement("input");
            this.Array[this.Array.length - 1].appendChild(this.inputArray[key]);
            tblTr.appendChild(this.Array[this.Array.length - 1]);
        }
        this.Array[this.Array.length] = document.createElement("td");
        this.Array[this.Array.length - 1].innerHTML = "<button>Отправить</button>";
        this.Array[this.Array.length - 1].addEventListener("click", (function (array) {
            return function () {
                self.sendTable(array);
            };
        })(this.inputArray), true);
        tblTr.appendChild(this.Array[this.Array.length - 1]);
        tblBody.appendChild(tblTr);
    }

    deleteTable(object) {
        var self = this;
        var formData = new FormData();
        var xhr = new XMLHttpRequest();
        formData.append("deleteRecord", this.nameTable);
        formData.append("data", JSON.stringify(object));
        xhr.open("POST", "/cars/application/requests/index.php");
        xhr.send(formData);
        xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                console.log(this.responseText);
                var responseJSON = JSON.parse(this.responseText);
                printResponse(responseJSON, self.responsePanel);
                self.getTable();
            }
        }
    }

    editTable(element, object, key) {
        element.innerHTML = "";
        var self = this;
        var textField = document.createElement("input");
        textField.value = object[key];
        element.appendChild(textField);
        textField.focus();
        //textField.select();
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

    sendTable(array) {
        var formData = new FormData();
        var xhr = new XMLHttpRequest();
        var self = this;
        formData.append("addRecord", this.nameTable);
        var data = {};
        for (var key in array) {
            data[key] = array[key].value;
        }
        formData.append("data", JSON.stringify(data));
        xhr.open("POST", "/cars/application/requests/index.php");
        xhr.send(formData);
        xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var responseJSON = JSON.parse(this.responseText);
                printResponse(responseJSON, self.responsePanel);
                self.getTable();
            }
        }
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