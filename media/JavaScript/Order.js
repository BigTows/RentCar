/**
 * Not support mobile platform
 * and Safari (omg)
 */
class Order {
    constructor(elem) {
        this.home = elem;
        this.brandSelect = document.createElement("select");
        this.brandSelect.className = "form-control";
        this.modelSelect = document.createElement("select");
        this.modelSelect.className = "form-control";
        /**
         * Setting Color panel selector
         * @type {Element}
         */
        this.colorSelect = document.createElement("div-colors");
        /**
         * Setting date Picker
         * @type {Element}
         */
        this.datePicker = document.createElement("input");
        this.datePicker.className = "datepicker-here form-control";
        this.datePicker.setAttribute("data-range", true);
        this.datePicker.id = "datePicker";
        this.datePicker.setAttribute("data-multiple-dates-separator", " : ");
        this.price = document.createElement("p");

        this.xhr = new XMLHttpRequest();
        this.xhr.open("POST", "/cars/application/requests/user.php");
        const data = new FormData();
        data.append("getFreeCars", "");
        var self = this;
        this.xhr.onreadystatechange = function () {
            if (this.status === 200 && this.readyState === 4) {
                self.json = JSON.parse(this.responseText);
                self.printBrand();
            }
        };
        this.xhr.send(data);
    }

    printBrand() {
        var self = this;
        this.brandSelect.innerHTML = "";
        var brands = new FormData();
        this.brandSelect.onchange = function () {
            self.brand = self.brandSelect.value;
            self.printModels();
            self.colorSelect.remove();
            self.price.remove();
            self.datePicker.remove();
        };
        var option = document.createElement("option");
        option.textContent = "Выберите Бренд";
        option.selected = true;
        option.disabled = true;
        this.brandSelect.appendChild(option);
        console.log(brands);
        console.log("sd");
        this.json.data.forEach(function (element) {
            if (brands.get(element["name_brand"]) === null) {
                option = document.createElement("option");
                option.value = element["id_brand"];
                option.textContent = element["name_brand"];
                self.brandSelect.appendChild(option);
                brands.append(element["name_brand"], 0);
            }
        });
        this.home.appendChild(this.brandSelect);
    }

    printModels() {
        this.modelSelect.innerHTML = "";
        var self = this;
        var models = new FormData();
        this.modelSelect.onchange = function () {
            self.car = self.modelSelect.value;
            self.datePicker.remove();
            self.price.remove();
            self.printColors();
        };
        var option = document.createElement("option");
        option.textContent = "Выберите Марку";
        option.selected = true;
        option.disabled = true;
        this.modelSelect.appendChild(option);
        this.json.data.forEach(function (element) {
            var option = document.createElement("option");
            if (element["id_brand"] === self.brand && models.get(element["model"]) === null) {
                option.value = element["model"];
                option.textContent = element["model"] + " (За сутки " + element['cost_per_day'] + ")";
                self.modelSelect.appendChild(option);
                models.append(element["model"], 0);
            }
        });
        this.home.appendChild(this.modelSelect);
    }

    printColors() {
        this.colorSelect.innerHTML = "";
        var self = this;
        this.json.data.forEach(function (element) {

            if (element["id_brand"] === self.brand && element["model"] === self.car) {
                var divColor = document.createElement("div");
                divColor.style.backgroundColor = "#" + element["hex_color"];
                divColor.className = "color-pick";
                divColor.onclick = function () {
                    self.datePicker.remove();
                    self.price.remove();
                    const myGeocoder = ymaps.geocode(element["address"]);
                    myGeocoder.then(
                        function (res) {
                            map.geoObjects.removeAll();
                            map.geoObjects.add(res.geoObjects.get(0));
                            map.setCenter([element["latitude"], element["longitude"]], 15, {
                                checkZoomRange: true
                            });
                            self.home.appendChild(self.datePicker);
                            $('#datePicker').datepicker({
                                minDate: new Date(new Date().setDate(new Date().getDate() + 1)),
                                language: {
                                    dateFormat: 'yyyy-mm-dd'
                                },
                                onSelect: function (formattedDatestring, date, inst) {
                                    if (date.length == 2) {
                                        //console.log(date);
                                        var timeDiff = Math.abs(date[1].getTime() - date[0].getTime());
                                        var day = (Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1);
                                        self.price.innerHTML = "Цена за " + day + " дней, составляет " + element["cost_per_day"] * day + "<a class='btn btn-primary'> Купить </a>";
                                        self.home.append(self.price);
                                    } else {
                                        self.price.remove()
                                    }

                                }

                            });
                            console.log($('#datePicker').datepicker.data('datepicker'));
                        },
                        function (err) {
                            console.log(err);
                        }
                    );
                };
                self.colorSelect.appendChild(divColor);
            }
        });
        this.home.appendChild(this.colorSelect);
    }

}


