class Order {
    constructor(elem) {
        this.home = elem;
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
        let select = document.getElementById("brands");
        select.innerHTML = "";
        let brands = new FormData();
        select.onchange = function () {
            self.brand = select.value;
            self.printModels();
        };
        let option = document.createElement("option");
        option.textContent = "Выберите Бренд";
        option.selected = true;
        option.disabled = true;
        select.appendChild(option);

        this.json.data.forEach(function (element) {
            if (brands.get(element["name_brand"]) === null) {
                option = document.createElement("option");
                option.value = element["id_brand"];
                option.textContent = element["name_brand"];
                select.appendChild(option);
                brands.append(element["name_brand"], 0);
            }
        });
        this.home.appendChild(select);
        select.className = "form-control";
    }

    printModels() {
        let select = document.getElementById("models");
        select.innerHTML = "";
        let self = this;
        let models = new FormData();
        select.onchange = function () {
            self.car = select.value;
            self.printColors();
        };
        let option = document.createElement("option");
        option.textContent = "Выберите Марку";
        option.selected = true;
        option.disabled = true;
        select.appendChild(option);
        this.json.data.forEach(function (element) {
            let option = document.createElement("option");
            if (element["id_brand"] === self.brand && models.get(element["model"]) === null) {
                option.value = element["model"];
                option.textContent = element["model"];
                select.appendChild(option);
                models.append(element["model"], 0);
            }
        });
        this.home.appendChild(select);
        select.className = "form-control";
    }

    printColors() {
        let div = document.getElementById("div-colors");
        div.innerHTML = "";
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
                            // var point = new YMaps.GeoPoint(element["latitude"],element["longitude"]); // Координаты центра Москвы
                            map.setCenter([element["latitude"], element["longitude"]], 15, {
                                checkZoomRange: true
                            });
                        },
                        function (err) {
                            console.log(err);
                        }
                    );
                };
                div.appendChild(divColor);
            }
        });
        this.home.appendChild(div);
    }


}