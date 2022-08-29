function validateName(value) {
    if (value === "") {
        return "Completa este campo";
    }
  
    if(value.length < 3){
        return "El nombre es demasiado corto";
    }

    if (/^(\s+)/g.test(value)) {
        return "El texto no puede tener ningun espacio al inicio\n";
    }
  
    if (/(\s{2,})/g.test(value)) {
        return "El texto no puede tener mas de un espacio entre palabras\n";
    }
  
    if (/(\s+)$/g.test(value)) {
        return "El texto no puede tener ningun espacio al final\n";
    }
  
    if (/\d/g.test(value)) {
        return "El texto no puede tener números\n";
    }
  
    if (/[^a-zA-ZÀ-ÿ\u00f1\u00d1\s\d<\0]/g.test(value)) {
        return "El texto no puede tener caracteres especiales\n";
    }
  //
    //if (/^[A-ZÁÉÍÓÚÑ](?:[a-záéíóúñ]|\b[,.'-]\b)+(?: [A-ZÁÉÍÓÚÑ](?:[a-záéíóúñ]|\b[,.'-]\b)+)*$/g.test(value)) {
    //  return "Todo nombre propio debe iniciar con una mayúscula\n";
    //}
  
    return '';
}

function validateFirstName(value) {
    if (value === "") {
        return "Completa este campo";
    }

    if(value.length < 3){
        return "El apellido es demasiado corto";
    }
  
    if (/^(\s+)/g.test(value)) {
        return "El texto no puede tener ningun espacio al inicio\n";
    }
  
    if (/(\s{2,})/g.test(value)) {
        return "El texto no puede tener mas de un espacio entre palabras\n";
    }
  
    if (/(\s+)$/g.test(value)) {
        return "El texto no puede tener ningun espacio al final\n";
    }
  
    if (/\d/g.test(value)) {
        return "El texto no puede tener números\n";
    }
  
    if (/[^a-zA-ZÀ-ÿ\u00f1\u00d1\s\d<\0]/g.test(value)) {
        return "El texto no puede tener caracteres especiales\n";
    }
  
    //if (/^[A-ZÁÉÍÓÚÑ](?:[a-záéíóúñ]|\b[,.'-]\b)+(?: [A-ZÁÉÍÓÚÑ](?:[a-záéíóúñ]|\b[,.'-]\b)+)*$/g.test(texto)) {
    //  return "Todo nombre propio debe iniciar con una mayúscula\n";
    //}
  
    return '';
}

function validateBirthdate(value){
    var ToDate = new Date();

    if (new Date(value).getTime() >= ToDate.getTime()){
        return "Selecciona una fecha correcta";
    }

    return '';
}

function validateUsername(value) {
    if (value === "") {
        return "Completa este campo";
    }
  
    if(value.length < 3){
        return "El nombre es demasiado corto";
    }

    //if (/^(\s+)/g.test(value)) {
    //    return "El texto no puede tener ningun espacio al inicio\n";
    //}
  
    if (/(\s{1,})/g.test(value)) {
        return "El texto no puede tener espacios\n";
    }
  
    //if (/(\s+)$/g.test(value)) {
    //    return "El texto no puede tener ningun espacio al final\n";
    //}
  
    if (/\d/g.test(value)) {
        return "El texto no puede tener números\n";
    }
  
    if (/[^a-zA-ZÀ-ÿ\u00f1\u00d1\s\d<\0]/g.test(value)) {
        return "El texto no puede tener caracteres especiales\n";
    }
  //
    //if (/^[A-ZÁÉÍÓÚÑ](?:[a-záéíóúñ]|\b[,.'-]\b)+(?: [A-ZÁÉÍÓÚÑ](?:[a-záéíóúñ]|\b[,.'-]\b)+)*$/g.test(value)) {
    //  return "Todo nombre propio debe iniciar con una mayúscula\n";
    //}
  
    return '';
}

function validateMail(value){
    if(value == "") {
        return "Completa este campo\n"
    }
  
    if(!/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/g.test(value)) {
        return "El correo electrónico debe tener un formato válido\n"
    }
  
    if(/(\s)/g.test(value)) {
        return "El texto no puede tener espacios\n"
    }
  
    return "";
}

function validateImg(value){
    if(value == "") {
        return "Completa este campo\n"
    }

    idxDot = value.lastIndexOf(".") + 1,
    extFile = value.substr(idxDot, value.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
        return '';
    }else{
        return "Solo se permiten archivos jpg/jpeg y png"; 
    }
}

function validatePassword(value){  
    if(value == ""){
        return "Completa este campo\n"
    }
  
    if(value.length < 8){
        return "El nombre es demasiado corto";
    }

    // if(!/^(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[0-9]){1})(?=(?:.*[.,\/#!$%\^&\*;:{}=\-_`~()”“…]){1})\S{8,}/g.test(value)){ 
    if(!/(?=(?:.*[A-Z]){1})/g.test(value)){
        return "Debe contener al menos una letra mayúscula\n"
    }
    if(!/(?=(?:.*[a-z]){1})/g.test(value)){
        return "Debe contener al menos una letra minúscula\n"
    }
    if(!/(?=(?:.*[0-9]){1})/g.test(value)){
        return "Debe contener al menos un número";
    }
    if(!/(?=(?:.*[.,\/#!$%\^&\*;:{}=\-_`~()”“…]){1})/g.test(value)){
        return "Debe contener al menos un signo de puntuación";
    }
    if(/(\s)/g.test(value)){
        return "El texto no puede tener espacios";
    }
  
    return '';
}

function validatePasswordConfirmation(original, confirmation){
    if (original == "") {
        return "Completa este campo";
    }
    if (original != confirmation) {
        return "La contraseña debe coincidir";
    }
  
    return '';
}

function validateChecFormSelected(value){
    if(value == ""){
        return "Selecciona una opción valida";
    }

    return '';
}

function validateInfo(){
    let varName = document.getElementById('formName');
    let varLastname = document.getElementById('formLastName');
    let varBirthdate = document.getElementById('formBirthDate');
    let varGender = document.getElementById('formGender');
    let varUsername = document.getElementById('formUserName');
    let varEmail = document.getElementById('formEmail');
    let varImg = document.getElementById('formFile');
    let varRole = document.getElementById('formRole');
    let varPassword = document.getElementById('formPassword');
    let varPasswordConfirm = document.getElementById('formPasswordConfirm');
    
    varName.setCustomValidity(validateName(varName.value));
    varLastname.setCustomValidity(validateFirstName(varLastname.value));
    varBirthdate.setCustomValidity(validateBirthdate(varBirthdate.value));
    varGender.setCustomValidity(validateChecFormSelected(varGender.value));
    varUsername.setCustomValidity(validateUsername(varUsername.value));
    varImg.setCustomValidity(validateImg(varImg.value));
    varEmail.setCustomValidity(validateMail(varEmail.value));
    varRole.setCustomValidity(validateChecFormSelected(varRole.value));
    varPassword.setCustomValidity(validatePassword(varPassword.value));
    varPasswordConfirm.setCustomValidity(validatePasswordConfirmation(varPassword.value, varPasswordConfirm.value));
    
    return false;
    
    //strName.value = "asdf";
}