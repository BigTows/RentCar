/**
 * Created by bigtows on 09/05/2017.
 */

class CarsTable {

    constructor(tableElement, responsePanel) {
        this.tableElement = tableElement;
        this.getCars();
        if (responsePanel == undefined) {
            this.responsePanel = document.getElementById("info")
        } else {
            this.responsePanel = responsePanel;
        }
    }

    getCars() {
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        var self = this;
        formData.append("getTable", "Cars");
        xhr.open("POST", "/cars/application/requests/index.php");
        xhr.send(formData);
        xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                console.log(this.responseText);
                var responseJSON = JSON.parse(this.responseText);
                if (responseJSON.level == 0) {
                    self.jsonToTable(responseJSON.data);
                }
            }
        }
    }


    getBrands(){
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        var self = this;
        formData.append("getTable", "Brands");
        xhr.open("POST", "/cars/application/requests/index.php");
        xhr.send(formData);
        xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                console.log(this.responseText);
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
                console.log(key);

                if (key==="id_brand"){

                }
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
            this.inputArray[key].setAttribute("class", "form-control");

            this.Array[this.Array.length - 1].appendChild(this.inputArray[key]);
            tblTr.appendChild(this.Array[this.Array.length - 1]);
        }
        this.Array[this.Array.length] = document.createElement("td");
        this.Array[this.Array.length - 1].innerHTML = "<button class='btn btn-success'>Отправить</button>";
        this.Array[this.Array.length - 1].addEventListener("click", (function (array) {
            return function () {
                self.sendTable(array);
            };
        })(this.inputArray), true);
        tblTr.appendChild(this.Array[this.Array.length - 1]);
        tblBody.appendChild(tblTr);
    }

    editTable(element, object, key) {
        element.innerHTML = "";
        var self = this;
        var textField = document.createElement("input");
        var tog = false;
        if (key == "hex") {
            textField.type = "color";
            textField.value = object[key];
            textField.addEventListener('focus', function () {
                if (tog === true) {
                    console.log('open');
                } else {
                    self.sendData(object, key, textField);
                }
            });
            textField.click();
            textField.addEventListener('blur', function () {
                tog = !tog;
                if (tog === true) {
                    tog = false;
                    console.log('open');
                } else {
                    console.log('closed');
                }
            });
            element.appendChild(textField);
        } else {
            textField.value = object[key];
            textField.addEventListener("focusout", function () {
                self.sendData(object, key, textField);
            });
            element.appendChild(textField);
            textField.focus();
        }


    }

    sendData(object, key, textField) {
        var newObject = {};
        for (var keys in object) {
            if (keys != key) {
                newObject[keys] = object[keys];
            } else {
                newObject[keys] = textField.value;
            }
        }
        var formData = new FormData();
        var self = this;
        var xhr = new XMLHttpRequest();
        formData.append("oldData", JSON.stringify(object));
        formData.append("newData", JSON.stringify(newObject));
        console.log(object);
        console.log(newObject);
        formData.append("editRecord", "Cars");
        xhr.open("POST", "/cars/application/requests/index.php");
        xhr.send(formData);
        xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var responseJSON = JSON.parse(this.responseText);
                printResponse(responseJSON, self.responsePanel);
                self.getCars();
            }
        }
    }
}