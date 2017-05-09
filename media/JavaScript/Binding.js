/**
 * This class need to Send POST or GET req
 */
class Binding {
    constructor(obj, success) {
        this.xhr = new XMLHttpRequest();
        if (obj.method==undefined) {
            obj.method = "POST";
            console.log("Binding: method undefined set default (POST)");
        }

        this.xhr.open(obj.method, obj.url);
        this.data = new FormData();
        this.data.append(obj.action, null);
        for (var i = 0; i < obj.data.length; i++)
            this.data.append(document.getElementById(obj.data[i]).getAttribute("name"), document.getElementById(obj.data[i]).value);
        for (var key in obj.dataValue){
            this.data.append(key,obj.dataValue[key]);
        }
        this.xhr.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                console.log(this.responseText);
                var responseJSON = JSON.parse(this.responseText);
                if (obj.responsePanel!=undefined) printResponse(responseJSON, obj.responsePanel);
                if (responseJSON.level == 0) success(responseJSON.data);
            }
        }
        this.xhr.send(this.data);
    }

}

function printResponse(json, element) {
    if (element==undefined){
        return;
    }
    element.innerHTML = "";
    var styleClass = "alert alert-";
    switch (json.level) {
        case 0:
            styleClass += "success";
            break;
        case 1:
            styleClass += "warning";
            break;
        case 2:
            styleClass += "danger";
            break;
        default:
            styleClass += "alert-info";
            console.log("Level: " + json.level + " not found");
    }
    element.setAttribute("class", styleClass);
    var date = "["+new Date().getHours()+":"+new Date().getMinutes()+":"+new Date().getSeconds()+"] ";
    element.innerHTML = "<strong>"+date + json.messages.short + "</strong> <br>" + json.messages.full;
}