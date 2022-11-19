function quantityMin(idForm){
    let varQuantity = document.getElementById(idForm);

    if(varQuantity.value > 1){
        varQuantity.value --;
    }
}

function quantityPlus(idForm, value){
    let varQuantity = document.getElementById(idForm);

    if(varQuantity.value < value){
        varQuantity.value ++;
    }
}