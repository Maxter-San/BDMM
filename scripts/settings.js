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
  
    return "";
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
  
    return "";
}

function validateBirthdate(value){
    var ToDate = new Date();

    if (new Date(value).getTime() >= ToDate.getTime()){
        return "Selecciona una fecha correcta";
    }

    return "";
}

function validateStreetNum(value) {
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
  
    if (!/\d/g.test(value)) {
        return "Debes ingresar tu número de casa\n";
    }
  
    if (/[^a-zA-ZÀ-ÿ\u00f1\u00d1\s\d<\0]/g.test(value)) {
        return "El texto no puede tener caracteres especiales\n";
    }
  //
    //if (/^[A-ZÁÉÍÓÚÑ](?:[a-záéíóúñ]|\b[,.'-]\b)+(?: [A-ZÁÉÍÓÚÑ](?:[a-záéíóúñ]|\b[,.'-]\b)+)*$/g.test(value)) {
    //  return "Todo nombre propio debe iniciar con una mayúscula\n";
    //}
  
    return "";
}

function validatePostCode(value){
    if(value == "") {
      return "Completa este campo\n"
    }
  
    if(!/[0-9]/g.test(value)) {
      return "El texto solo puede contener números\n"
    }
  
    if(!/^\d{5}$/g.test(value)) {
      return "El texto tiene que contener 5 dígitos numéricos\n"
    }
  
    if(/(\s)/g.test(value)) {
      return "El texto no puede tener espacios\n"
    }
  
    return "";
}

function validateDebitCard(value){
    if(value == "") {
      return "Completa este campo\n"
    }
  
    if(!/[0-9]/g.test(value)) {
      return "El texto solo puede contener números\n"
    }
  
    if(!/^\d{16}$/g.test(value)) {
      return "El texto tiene que contener 16 dígitos numéricos\n"
    }
  
    if(/(\s)/g.test(value)) {
      return "El texto no puede tener espacios\n"
    }
  
    return "";
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
    if(value == ""){
    return '';
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

function validateDuplicatePassword(actualPassword, newPassword){
    if (actualPassword == newPassword) {
        return "La nueva contraseña no debe ser igual a la anterior";
    }

    return '';
}

function validateInfo(userType){
    let varName = document.getElementById('formName');
    let varLastname = document.getElementById('formLastName');
    let varBirthdate = document.getElementById('formBirthDate');
    let varGender = document.getElementById('formGender');

    let varStreetNum = document.getElementById('formStreetNum');
    let varPostalCode = document.getElementById('formPostalCode');
    let varCity = document.getElementById('formCity');
    let varState = document.getElementById('formState');

    let varflexCheckDebitCard = document.getElementById('flexCheckDebitCard');
    let varDebitCard = document.getElementById('formDebitCard');

    let varUsername = document.getElementById('formUserName');
    let varEmail = document.getElementById('formEmail');
    let varImg = document.getElementById('formFile');
    let varRole = document.getElementById('formRole');
    let varformFrontPage = document.getElementById('formFrontPage');
    let varPassword = document.getElementById('formPassword');
    let varPasswordConfirm = document.getElementById('formPasswordConfirm');

    let varFlexSwitchCheckPassword = document.getElementById('flexSwitchCheckPassword');
    let varActualPassword = document.getElementById('formActualPassword');
    

    varName.setCustomValidity(validateName(varName.value));
    varLastname.setCustomValidity(validateFirstName(varLastname.value));
    varBirthdate.setCustomValidity(validateBirthdate(varBirthdate.value));
    varGender.setCustomValidity(validateChecFormSelected(varGender.value));

    if(userType == 'Comprador' || userType == 'Vendedor'){
        if(userType == 'Comprador'){
            varStreetNum.setCustomValidity(validateStreetNum(varStreetNum.value));
            varPostalCode.setCustomValidity(validatePostCode(varPostalCode.value));
        }
        varCity.setCustomValidity(validateName(varCity.value));
        varState.setCustomValidity(validateName(varState.value));

        if(varflexCheckDebitCard.checked == true){
            varDebitCard.setCustomValidity(validateDebitCard(varDebitCard.value));
        }
    }

    varUsername.setCustomValidity(validateName(varUsername.value));
    
    varImg.setCustomValidity(validateImg(varImg.value)); 

    varformFrontPage.setCustomValidity(validateImg(varformFrontPage.value)); 
    
    varEmail.setCustomValidity(validateMail(varEmail.value));
    varRole.setCustomValidity(validateChecFormSelected(varRole.value));
    varPassword.setCustomValidity(validatePassword(varPassword.value));
    
    if(varFlexSwitchCheckPassword.checked == true){
        varPasswordConfirm.setCustomValidity(validatePasswordConfirmation(varPassword.value, varPasswordConfirm.value));
        varActualPassword.setCustomValidity(validatePassword(varActualPassword.value));
    }
    
    //strName.value = "asdf";
}

function formPasswordDisable(){
    let varPassword = document.getElementById('formPassword');
    let varPasswordConfirm = document.getElementById('formPasswordConfirm');
    let varFlexSwitchCheckPassword = document.getElementById('flexSwitchCheckPassword');

    if(varFlexSwitchCheckPassword.checked == true){
        varPassword.disabled = false;
        varPasswordConfirm.disabled = false;
    }else{
        varPassword.disabled = true;
        varPasswordConfirm.disabled = true;
    }
}

function formCardDisable(){
    let varFlexCheckDebitCard = document.getElementById('flexCheckDebitCard');
    let varFormDebitCard = document.getElementById('formDebitCard');

    if(varFlexCheckDebitCard.checked == true){
        varFormDebitCard.disabled = false;
    }else{
        varFormDebitCard.disabled = true;
    }
}

function setDummyInfo(){
    let varName = document.getElementById('formName');
    let varLastname = document.getElementById('formLastName');
    let varBirthdate = document.getElementById('formBirthDate');
    let varGender = document.getElementById('formGender');

    let varStreetNum = document.getElementById('formStreetNum');
    let varPostalCode = document.getElementById('formPostalCode');
    let varCity = document.getElementById('formCity');
    let varState = document.getElementById('formState');

    let varflexCheckDebitCard = document.getElementById('flexCheckDebitCard');
    let varDebitCard = document.getElementById('formDebitCard');
    let varflexCheckPaypal = document.getElementById('flexCheckPaypal');

    let varUsername = document.getElementById('formUserName');
    let varEmail = document.getElementById('formEmail');
    let varRole = document.getElementById('formRole');
    

    varName.value = "Maxter";
    varLastname.value = "asdf";
    var dateDummy = new Date();
    dateDummy.setFullYear(2000,03-1,09);
    varBirthdate.valueAsDate = dateDummy;
    varGender.value = 'Mujer';

    varStreetNum.value = "calle 1234";
    varPostalCode.value = "12345";
    varCity.value = "Monterrey";
    varState.value = "Nuevo León";


    varflexCheckDebitCard.checked = true;
    varflexCheckPaypal.checked = true;
    varDebitCard.disabled = false;
    varDebitCard.value = "1234567890123456";

    varUsername.value = "MaxterSan";
    varEmail.value = "correo@hotmail.com";
    varRole.value = 'Comprador';
}

//document.addEventListener('DOMContentLoaded', (event) => {
//    document.getElementById("myForm").addEventListener("submit", function(e) {
//        e.preventDefault() // Cancel the default action
//    });
//});