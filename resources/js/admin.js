window.changeLogo = function() {
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

window.removeLogo = function(setRemove = false) {
    document.getElementById("filename").value = '';
    document.getElementById("filename").classList.add("d-none");
    document.getElementById("preview").src = '/img/noimage-200x200.jpeg';
    if (setRemove) {
        document.getElementById("remove").value = 1;
    }
}

window.changeImage = function(elementId) {
    document.querySelector(`div#${elementId} > input[type=file]`).click();
}

window.refreshImage = function(input) {

    if (input.files && input.files[0]) {
        const elementId = input.parentNode.id;

        const reader = new FileReader();
        reader.filename = input.files[0].name;

        reader.onload = function (e) {
            document.querySelector(`div#${elementId} > img`).src = e.target.result;
            const inputText = document.querySelector(`div#${elementId} > input[type=text]`);
            inputText.value = e.target.filename;
            inputText.classList.remove("d-none");
        };

        const imgPath = input.value;
        const ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
            reader.readAsDataURL(input.files[0]);
        } else {
            input.value = '';
            alert('Принимаются только файлы форматов gif, png и jpg');
        }
    }
}

window.removeImage = function(elementId) {
    const element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}

window.addImage = function (parentId) {
    const parent = document.getElementById(parentId);

    let position = null;
    const lastChild = parent.lastChild;
    if (lastChild) {
        position = parseInt(lastChild.id.split('-')[1]) + 1;
    } else {
        position = 1;
    }

    const elementId = 'image-' + position;

    const inputFile = document.createElement("INPUT");
    inputFile.type = "file";
    inputFile.name = `image[${position}]`;
    inputFile.onchange = function() { window.refreshImage(this) };
    inputFile.classList.add("d-none");

    const inputText = document.createElement("INPUT");
    inputText.type = "text";
    inputText.name = `filename[${position}]`;
    inputText.classList.add("form-control");
    inputText.classList.add("mb-3");
    inputText.classList.add("d-none");

    const imageDiv = document.createElement("DIV");
    imageDiv.classList.add("mb-4");
    imageDiv.id = elementId;

    const img = document.createElement("IMG");
    img.width = 300;
    img.height = 300;
    img.classList.add('img-fluid');
    img.src = '/img/noimage-300x300.jpeg';

    const br = document.createElement("BR");

    const changeLink = document.createElement("A");
    changeLink.href="#";
    changeLink.onclick = function() { window.changeImage(elementId) };
    const changeText = document.createTextNode("Изменить");
    changeLink.appendChild(changeText);

    const seporatorText = document.createTextNode(" | ");

    const removeLink = document.createElement("A");
    removeLink.href="#";
    const removeText = document.createTextNode("Удалить");
    removeLink.appendChild(removeText);
    removeLink.onclick = function() { window.removeImage(elementId) };

    imageDiv.appendChild(inputFile);
    imageDiv.appendChild(inputText);
    imageDiv.appendChild(img);
    imageDiv.appendChild(br);
    imageDiv.appendChild(changeLink);
    imageDiv.appendChild(seporatorText);
    imageDiv.appendChild(removeLink);

    parent.appendChild(imageDiv);
}

window.removeExistedImage = function(obj, imageId) {
    const imageWrapper = obj.parentNode;
    const parent = imageWrapper.parentNode;
    parent.removeChild(imageWrapper);

    const inputHidden = document.createElement("INPUT");
    inputHidden.type = "hidden";
    inputHidden.name = `remove[]`;
    inputHidden.value = imageId;

    parent.appendChild(inputHidden);
}