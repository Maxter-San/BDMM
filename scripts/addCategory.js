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

function formAddCategory(){
    document.getElementById('validationText').textContent = "";
    clearForm();
    enableForm();
    disableButtons();
}

function formModifyCategory(){
    if(verifySelection()){
        enableForm();
        disableButtons();
    }
}

function cancelForm(){
    clearForm();
    disableForm();
    enableButtons();
}

function sendCategoryId(categoryId, categoryName, categoryDescription){
    let varformCategoryId = document.getElementById('formCategoryId');
    let varformCategoryName = document.getElementById('formCategoryName');
    let varformCategoryDescription = document.getElementById('formCategoryDescription');

    varformCategoryId.value = categoryId;
    varformCategoryName.value = categoryName;
    varformCategoryDescription.value = categoryDescription;
}

function verifySelection(){
    let varformCategoryId = document.getElementById('formCategoryId');

    if(varformCategoryId.value == ''){
        document.getElementById('validationText').textContent = "Selecciona una categoría";
        return false;
    }else{
        document.getElementById('validationText').textContent = "";
        return true;
    }
}

function enableForm(){
    let varformCategoryName = document.getElementById('formCategoryName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformCategoryDescription = document.getElementById('formCategoryDescription');
    let varButtonSubmit = document.getElementById('buttonSubmit');
    let varButtonCancel = document.getElementById('buttonCancel');

    varformCategoryName.disabled = false;
    varformFilePhoto.disabled = false;
    varformCategoryDescription.disabled = false;
    varButtonSubmit.disabled = false;
    varButtonCancel.disabled = false;
}

function disableForm(){
    let varformCategoryName = document.getElementById('formCategoryName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformCategoryDescription = document.getElementById('formCategoryDescription');
    let varButtonSubmit = document.getElementById('buttonSubmit');
    let varButtonCancel = document.getElementById('buttonCancel');
    
    varformCategoryName.disabled = true;
    varformFilePhoto.disabled = true;
    varformCategoryDescription.disabled = true;
    varButtonSubmit.disabled = true;
    varButtonCancel.disabled = true;
}

function enableButtons(){
    let varButtonAddCategory = document.getElementById('buttonAddCategory');
    let varButtonModifyCategory = document.getElementById('buttonModifyCategory');

    varButtonAddCategory.disabled = false;
    varButtonModifyCategory.disabled = false;
}

function disableButtons(){
    let varButtonAddCategory = document.getElementById('buttonAddCategory');
    let varButtonModifyCategory = document.getElementById('buttonModifyCategory');

    varButtonAddCategory.disabled = true;
    varButtonModifyCategory.disabled = true;
}

function clearForm(){
    let varformCategoryName = document.getElementById('formCategoryName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformCategoryDescription = document.getElementById('formCategoryDescription');
    let varformCategoryId = document.getElementById('formCategoryId');

    varformCategoryName.value = '';
    varformFilePhoto.value = '';
    varformCategoryDescription.value = '';
    varformCategoryId.value = '';
}