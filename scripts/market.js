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

function validateCheck(value1, value2, value3){
    if(value1.checked == false && value2.checked == false && value3.checked == false) {
        validations++;
        return "Selecciona al menos una categoría\n";
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

function validateImg(value){
    if(value == "") {
        validations++;
        return "Completa este campo\n";
    }

    idxDot = value.lastIndexOf(".") + 1,
    extFile = value.substr(idxDot, value.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
        return '';
    }else{
        validations++;
        return "Solo se permiten archivos jpg/jpeg y png";
    }
}

function validateMov(value){
    if(value == "") {
        validations++;
        return "Completa este campo\n";
    }

    idxDot = value.lastIndexOf(".") + 1,
    extFile = value.substr(idxDot, value.length).toLowerCase();
    if (extFile=="mp4" || extFile=="MOV" || extFile=="avi"){
        return '';
    }else{
        validations++;
        return "Solo se permiten archivos mp4, MOV y avi"; 
    }
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
    let varFormControlCategory= document.getElementById('formControlCategory');

    let varFlexCheckHogar = document.getElementById('flexCheckHogar');
    let varFlexCheckTecnologia = document.getElementById('flexCheckTecnologia');
    let varFlexCheckOtros = document.getElementById('flexCheckOtros');

    let varFormProductStock = document.getElementById('formProductStock');
    let varFormSellType = document.getElementById('formSellType');
    let varFormProductPrice = document.getElementById('formProductPrice');
    let varFormFilePhoto = document.getElementById('formFilePhoto');
    let varFormFileClip = document.getElementById('formFileClip');
    
    varFormProductName.setCustomValidity(validateEmptyField(varFormProductName.value));
    varFormProductDescription.setCustomValidity(validateEmptyField(varFormProductDescription.value));

    varFormProductName.setCustomValidity(validateCheck(varFlexCheckHogar, varFlexCheckTecnologia, varFlexCheckOtros));

    varFormProductStock.setCustomValidity(validateNumber(varFormProductStock.value));
    varFormSellType.setCustomValidity(validateChecFormSelected(varFormSellType.value));
    varFormProductPrice.setCustomValidity(validateNumber(varFormProductPrice.value));
    varFormFilePhoto.setCustomValidity(validateImg(varFormFilePhoto.value));
    varFormFilePhoto.setCustomValidity(minFiles(varFormFilePhoto.files));
    varFormFileClip.setCustomValidity(validateMov(varFormFileClip.value));

    //const myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {});
    //myModal.show();
    //$('#staticBackdrop').modal('show');
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

document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("myForm").addEventListener("submit", function(e) {
        e.preventDefault() // Cancel the default action
    });
});