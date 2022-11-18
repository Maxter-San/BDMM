function quantityMin(){
    let varQuantity = document.getElementById('formQuantity');

    if(varQuantity.value > 1){
        varQuantity.value --;
    }
}

function quantityPlus(value){
    let varQuantity = document.getElementById('formQuantity');

    if(varQuantity.value < value){
        varQuantity.value ++;
    }
}