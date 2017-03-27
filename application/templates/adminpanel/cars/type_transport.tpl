<div class="form-group">
    <label for="name">Добавить новый вид транспорта</label>
    <input type="text" class="form-control" id="nameTypeTransport" name="name" placeholder="Тип транспорта" required>
</div>
<button class="btn btn-success" id="addTypeTransport" name="addRecord" value="Type_transport">Добавить</button>
<hr>
<table id="typeTransportTable" class="table table-hover">

</table>

<script>
    var btn = document.getElementById("addTypeTransport");
    btn.addEventListener("click", function () {
        new Binding({
            url: "../application/requests/index.php",
            action: "addRecord",
            responsePanel: document.getElementById("info"),
            data: ["nameTypeTransport"],
            dataValue: {
                "addRecord": "Type_transport"
            }

        },function () {
            initTypeTransport();
        });
    });
    function initTypeTransport() {
        new Binding({
            url: "../application/requests/index.php",
            action: "getTable",
            data: [],
            dataValue: {
                "getTable": "Type_transport"
            }
        }, function (data) {
            //replace this line
            document.getElementById("typeTransportTable").innerHTML="";
            jsonToTable(data, document.getElementById("typeTransportTable"));
        })
    }
    initTypeTransport();
</script>