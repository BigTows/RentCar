class Order {
    constructor(elem) {
        this.home = elem;
        this.brandSelect = document.createElement("select");
        this.brandSelect.className = "form-control";
        this.modelSelect = document.createElement("select");
        this.modelSelect.className = "form-control";
        this.colorSelect = document.createElement("div-colors");
        this.xhr = new XMLHttpRequest();
        this.xhr.open("POST", "/cars/application/requests/buy.php");
        const data = new FormData();
        data.append("getFreeCars", "");
        let self = this;
        this.xhr.onreadystatechange = function () {
            if (this.status === 200 && this.readyState === 4) {
                self.json = JSON.parse(this.responseText);
                self.printBrand();
            }
        };
        this.xhr.send(data);
    }

    printBrand() {
        console.log(this.json);
        let self = this;
        this.brandSelect.innerHTML = "";
        let brands = new FormData();
        this.brandSelect.onchange = function () {
            self.brand = self.brandSelect.value;
            self.printModels();
            self.colorSelect.remove();
        };
        let option = document.createElement("option");
        option.textContent = "Выберите Бренд";
        option.selected = true;
        option.disabled = true;
        this.brandSelect.appendChild(option);

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
        let self = this;
        let models = new FormData();
        this.modelSelect.onchange = function () {
            self.car = self.modelSelect.value;
            self.printColors();
        };
        let option = document.createElement("option");
        option.textContent = "Выберите Марку";
        option.selected = true;
        option.disabled = true;
        this.modelSelect.appendChild(option);
        this.json.data.forEach(function (element) {
            let option = document.createElement("option");
            if (element["id_brand"] === self.brand && models.get(element["model"]) === null) {
                option.value = element["model"];
                option.textContent = element["model"];
                self.modelSelect.appendChild(option);
                models.append(element["model"], 0);
            }
        });
        this.home.appendChild(this.modelSelect);
    }

    printColors() {
        this.colorSelect.innerHTML = "";
        let self = this;
        this.json.data.forEach(function (element) {

            if (element["id_brand"] === self.brand && element["model"] === self.car) {
                let divColor = document.createElement("div");
                divColor.style.backgroundColor = "#" + element["hex_color"];
                divColor.className = "color-pick";
                divColor.onclick = function () {
                    const myGeocoder = ymaps.geocode(element["address"]);
                    myGeocoder.then(
                        function (res) {
                            map.geoObjects.removeAll();
                            map.geoObjects.add(res.geoObjects.get(0));
                            map.setCenter([element["latitude"], element["longitude"]], 15, {
                                checkZoomRange: true
                            });
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