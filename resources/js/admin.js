window.changeLogo = function () {
    document.getElementById("logo").click();
}

window.refreshLogo = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.filename = input.files[0].name;

        reader.onload = function (e) {
            document.getElementById("preview").src = e.target.result;
            document.getElementById("filename").value = e.target.filename;
            document.getElementById("filename").classList.remove("d-none");
        };

        var imgPath = input.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
            reader.readAsDataURL(input.files[0]);
        } else {
            input.value = '';
            alert('Принимаются только файлы форматов gif, png и jpg');
        }
    }
}

window.removeLogo = function (setRemove = false) {
    document.getElementById("filename").value = '';
    document.getElementById("filename").classList.add("d-none");
    document.getElementById("preview").src = '/logo/noimage.jpeg';
    if (setRemove) {
        document.getElementById("remove").value = 1;
    }
}
