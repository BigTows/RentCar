
<div class="form-group">
    <label for="name">Добавить классификацию машины</label>
    <input type="text" class="form-control" id="nameClassificationСars" name="name" placeholder="Классификация" required>
</div>
<button class="btn btn-success" id="addClassificationСars" name="addRecord" value="Classification_cars">Добавить</button>
<hr>
<table id="ClassificationСarsTable" class="table table-hover">

</table>

<script>
    var btn = document.getElementById("addClassificationСars");
    btn.addEventListener("click", function () {
        new Binding({
            url: "../application/requests/index.php",
            action: "addRecord",
            responsePanel: document.getElementById("info"),
            data: ["nameClassificationСars","addClassificationСars"]

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
                "getTable": "Classification_cars"
            }
        }, function (data) {
            //replace this line
            document.getElementById("ClassificationСarsTable").innerHTML="";
            jsonToTable(data, document.getElementById("ClassificationСarsTable"));
        })
    }
    initTypeTransport();
</script>