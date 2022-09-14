function validateInput(value) {
    if (value === "") {
        return "Completa este campo";
    }
  
    if(value.length < 3){
        return "El nombre es demasiado corto";
    }

    return '';
}

function validateImg(value){
    if (value === "") {
        return "Completa este campo";
    }

    idxDot = value.lastIndexOf(".") + 1,
    extFile = value.substr(idxDot, value.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
        return '';
    }else{
        return "Solo se permiten archivos jpg/jpeg y png"; 
    }
}

function validateInfo(){
    let varformCategoryName = document.getElementById('formCategoryName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformCategoryDescription = document.getElementById('formCategoryDescription');

    varformCategoryName.setCustomValidity(validateInput(varformCategoryName.value));
    varformFilePhoto.setCustomValidity(validateImg(varformFilePhoto.value));
    varformCategoryDescription.setCustomValidity(validateInput(varformCategoryDescription.value));
}

document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("myForm").addEventListener("submit", function(e) {
        e.preventDefault() // Cancel the default action
    });
});

function clearForm(){
    let varformCategoryName = document.getElementById('formCategoryName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformCategoryDescription = document.getElementById('formCategoryDescription');

    varformCategoryName.value = '';
    varformFilePhoto.value = '';
    varformCategoryDescription.value = '';
    myFunction();
}