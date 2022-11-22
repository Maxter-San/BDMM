//document.addEventListener('DOMContentLoaded', (event) => {
//    document.getElementById("myForm").addEventListener("submit", function(e) {
//        e.preventDefault() // Cancel the default action
//    });
//});

function floatingNum(productQuotationId){
    var tecla = event.key;
    if (['e'].includes(tecla)){
        event.preventDefault();
    }
    

    const input = document.querySelector('#productPriceQuotation'+productQuotationId);

    input.addEventListener('change', e => {
        e.currentTarget.value = parseFloat(e.currentTarget.value).toFixed(2)

        if(e.currentTarget.value < 0){
            e.currentTarget.value = 0;
        }
    });
}

function multiplyQuantityProducts(productQuotationId){
    let varproductPriceQuotation = document.getElementById('productPriceQuotation'+productQuotationId);
    let varproductCuantityQuotation = document.getElementById('productCuantityQuotation'+productQuotationId);
    let vartotalPriceQuotation = document.getElementById('totalPriceQuotation'+productQuotationId);

    vartotalPriceQuotation.value = "$ " + parseFloat(parseFloat(varproductPriceQuotation.value).toFixed(2) * varproductCuantityQuotation.value).toFixed(2);
}

function validateCuotation(productQuotationId){
    let varproductPriceQuotation = document.getElementById('productPriceQuotation'+productQuotationId);

    if(varproductPriceQuotation.value <= 0 || varproductPriceQuotation.value == null){
        varproductPriceQuotation.setCustomValidity('Ingresa un precio valido');
    }else{
        varproductPriceQuotation.setCustomValidity('');
    }
}