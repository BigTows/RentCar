 <div class="form-group">
        <label for="name">Добавить новый Брэнд</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Брэнд" required>
    </div>
    <button class="btn btn-success" id="addRecord" name="addRecord" value="Brands">Добавить</button>
 <hr>
<table id="brandTable" class="table table-hover">

</table>

<script>
    var btn = document.getElementById("addRecord");
    btn.addEventListener("click", function () {
        new Binding({
            url: "../application/requests/index.php",
            action: "addRecord",
            responsePanel: document.getElementById("info"),
            data: ["name","addRecord"],

        },function () {
            initBrands();
        });
    });
    function initBrands() {
        new Table("Brands",document.getElementById("brandTable"));
    }
    initBrands();
</script>