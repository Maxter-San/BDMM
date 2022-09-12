function validateEmptyField(value){
    if(value == "") {
        return "Completa este campo\n"
    }

    return '';
}

function validateEmptyCheck(value){
    if(value == "") {
        return "Selecciona una opción\n"
    }
    
    return '';
}

function validateInfo(){
    let varUsername = document.getElementById('formControlUserName');
    let varPassword = document.getElementById('formControlPassword');
    let varUserType = document.getElementById('formControlTypeUser');
    let varRemember = document.getElementById('flexCheckRememberUser');

    varUsername.setCustomValidity(validateEmptyField(varUsername.value));
    varPassword.setCustomValidity(validateEmptyField(varPassword.value));
    varUserType.setCustomValidity(validateEmptyCheck(varUserType.value));
}