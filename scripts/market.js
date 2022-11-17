var validations;

function integerNum(){
    var tecla = event.key;
    if (['.','e'].includes(tecla))
    event.preventDefault();

    const input = document.querySelector('#formProductStock');

    input.addEventListener('change', e => {
        e.currentTarget.value = parseFloat(e.currentTarget.value).toFixed(0);
        if(e.currentTarget.value < 0){
            e.currentTarget.value = 0;
        }
    });
}

function floatingNum(){
    var tecla = event.key;
    if (['e'].includes(tecla)){
        event.preventDefault();
    }
    

    const input = document.querySelector('#formProductPrice');

    input.addEventListener('change', e => {
        e.currentTarget.value = parseFloat(e.currentTarget.value).toFixed(2)

        if(e.currentTarget.value < 0){
            e.currentTarget.value = 0;
        }
    });
}

function validateEmptyField(value){
    if(value == "") {
        validations++;
        return "Completa este campo\n";
    }

    return '';
}

function validateNumber(value){
    if(value == "") {
        validations++;
        return "Completa este campo\n";
    }

    if(value <= 0) {
        validations++;
        return "El valor no puede ser igual o menor a 0\n";
    }

    return '';
}

function validateChecFormSelected(value){
    if(value == ""){
        validations++;
        return "Selecciona una opción valida";
    }

    return '';
}

function validateCheckCategories(value){
    var group = value;
    var counter = 0;
    for (var i=0; i<group.length; i++) {
        if (group[i].checked) {
            counter++;
        }
    }

    if(counter === 0){
        return "Selecciona al menos una categoría";
    }else{
        return '';
    }
}

function countCheckCategories(){
    let varFormControlCategory= document.getElementById('numCheckCategory');
    let varFormCheckCategory= document.getElementsByClassName('checkCategories');

    var group = varFormCheckCategory;
    var counter = 0;
    for (var i=0; i<group.length; i++) {
        if (group[i].checked) {
            counter++;
        }
    }
    varFormControlCategory.value = counter;
}

function validateImg(value){
    if(value == "") {
        validations++;
        return "Completa este campo\n";
    }

    let validation = '';

    for (let index = 0; index < value.length; index++) {

        let itemValue = value.item(index).name;
        
        idxDot = itemValue.lastIndexOf(".") + 1,
        extFile = itemValue.substr(idxDot, itemValue.length).toLowerCase();

        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //validation = validation + " " + value.item(index).name;
        }else{
            validations++;
            return "Solo se permiten archivos jpg/jpeg y png";
        }
 
    }

    return validation;
}

function validateMov(value){
    if(value == "") {
        validations++;
        return "Completa este campo\n";
    }

    let validation = '';

    for (let index = 0; index < value.length; index++) {

        let itemValue = value.item(index).name;
        
        idxDot = itemValue.lastIndexOf(".") + 1,
        extFile = itemValue.substr(idxDot, itemValue.length).toLowerCase();

        if (extFile=="mp4"){
            //validation = validation + " " + value.item(index).name;
        }else{
            validations++;
            return "Solo se permiten archivos mp4";
        }

        if(value.item(index).size >= 20971520){
            validations++;
            return "Video "+ itemValue + " demasiado largo. Máximo de 20MB\n";
        }
 
    }

    return validation;
}

function minFiles(value) {
    if(value.length < 3){
        validations++;
        return ("Sube mínimo 3 imagenes");
    }
    return '';
}

function validateProduct(){
    validations = 0;
    let varFormProductName = document.getElementById('formProductName');
    let varFormProductDescription = document.getElementById('formProductDescription');
    let varFormControlCategory= document.getElementById('numCheckCategory');
    let varFormCheckCategory= document.getElementsByClassName('checkCategories');

    let varFormProductStock = document.getElementById('formProductStock');
    let varFormSellType = document.getElementById('formSellType');
    let varFormProductPrice = document.getElementById('formProductPrice');
    let varFormFilePhoto = document.getElementById('formFilePhoto');
    let varFormFileClip = document.getElementById('formFileClip');
    
    varFormProductName.setCustomValidity(validateEmptyField(varFormProductName.value));
    varFormProductDescription.setCustomValidity(validateEmptyField(varFormProductDescription.value));
    varFormControlCategory.setCustomValidity(validateCheckCategories(varFormCheckCategory));
    varFormProductStock.setCustomValidity(validateNumber(varFormProductStock.value));
    varFormSellType.setCustomValidity(validateChecFormSelected(varFormSellType.value));
    varFormProductPrice.setCustomValidity(validateNumber(varFormProductPrice.value));
    varFormFilePhoto.setCustomValidity(validateImg(varFormFilePhoto.files));
    varFormFilePhoto.setCustomValidity(minFiles(varFormFilePhoto.files));
    varFormFileClip.setCustomValidity(validateMov(varFormFileClip.files));
}

function clear(){
    alert("A");
    document.getElementById('formProductName').value = '';
    document.getElementById('formProductDescription').value = '';

    document.getElementById('flexCheckHogar').checked = false;
    document.getElementById('flexCheckTecnologia').checked = false;
    document.getElementById('flexCheckOtros').checked = false;

    document.getElementById('formProductStock').value = '';
    document.getElementById('formSellType').value = '';
    document.getElementById('formProductPrice').value = '';
    document.getElementById('formFilePhoto').value = '';
    document.getElementById('formFileClip').value = '';
};