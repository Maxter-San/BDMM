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

function validateChecFormSelected(value){
    if(value == ""){
        return "Selecciona una opción valida";
    }

    return '';
}

function validateInfo(){
    let varformWishListId = document.getElementById('formListWishId');
    let varformWishListName = document.getElementById('formWishListName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformWishListDescription = document.getElementById('formWishListDescription');
    let varformWishListType = document.getElementById('formListType');

    varformWishListName.setCustomValidity(validateInput(varformWishListName.value));
    if(varformWishListId.value == ''){
        varformFilePhoto.setCustomValidity(validateImg(varformFilePhoto.value));
    }
    varformWishListDescription.setCustomValidity(validateInput(varformWishListDescription.value));
    varformWishListType.setCustomValidity(validateChecFormSelected(varformWishListType.value));
}

function sendWishListId(listwishId, wishListName, wishListDescription, wishListType){
    let varformWishListId = document.getElementById('formListWishId');
    let varformWishListName = document.getElementById('formWishListName');
    let varformWishListDescription = document.getElementById('formWishListDescription');
    let varformWishListType = document.getElementById('formListType');

    varformWishListId.value = listwishId;
    varformWishListName.value = wishListName;
    varformWishListDescription.value = wishListDescription;
    varformWishListType.value = wishListType;
}

function cancelForm(){
    clearForm();
    disableForm();
    enableButtons();
}

function formAddWishList(){
    document.getElementById('validationText').textContent = "";
    clearForm();
    enableForm();
    disableButtons();
}

function formModifyWishList(){
    if(verifySelection()){
        enableForm();
        disableButtons();
    }
}

function verifySelection(){
    let varformWishListId = document.getElementById('formListWishId');

    if(varformWishListId.value == ''){
        document.getElementById('validationText').textContent = "Selecciona una lista de deseos";
        return false;
    }else{
        document.getElementById('validationText').textContent = "";
        return true;
    }
}

function enableButtons(){
    let varButtonAddWishList = document.getElementById('buttonAddWishList');
    let varButtonModifyWishList = document.getElementById('buttonModifyWishList');

    varButtonAddWishList.disabled = false;
    varButtonModifyWishList.disabled = false;
}

function disableButtons(){
    let varButtonAddWishList = document.getElementById('buttonAddWishList');
    let varButtonModifyWishList = document.getElementById('buttonModifyWishList');

    varButtonAddWishList.disabled = true;
    varButtonModifyWishList.disabled = true;
}

function enableForm(){
    let varformWishListName = document.getElementById('formWishListName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformWishListDescription = document.getElementById('formWishListDescription');
    let varformWishListType = document.getElementById('formListType');
    let varButtonSubmit = document.getElementById('buttonSubmit');
    let varButtonCancel = document.getElementById('buttonCancel');

    varformWishListName.disabled = false;
    varformFilePhoto.disabled = false;
    varformWishListDescription.disabled = false;
    varformWishListType.disabled = false;
    varButtonSubmit.disabled = false;
    varButtonCancel.disabled = false;
}

function disableForm(){
    let varformWishListName = document.getElementById('formWishListName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformWishListDescription = document.getElementById('formWishListDescription');
    let varformWishListType = document.getElementById('formListType');
    let varButtonSubmit = document.getElementById('buttonSubmit');
    let varButtonCancel = document.getElementById('buttonCancel');
    
    varformWishListName.disabled = true;
    varformFilePhoto.disabled = true;
    varformWishListDescription.disabled = true;
    varformWishListType.disabled = true;
    varButtonSubmit.disabled = true;
    varButtonCancel.disabled = true;
}

function clearForm(){
    let varformWishListName = document.getElementById('formWishListName');
    let varformFilePhoto = document.getElementById('formFilePhoto');
    let varformWishListDescription = document.getElementById('formWishListDescription');
    let varformWishListId = document.getElementById('formListWishId');

    varformWishListName.value = '';
    varformFilePhoto.value = '';
    varformWishListDescription.value = '';
    varformWishListId.value = '';
}