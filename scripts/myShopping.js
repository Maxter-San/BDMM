function clickStar(btn, recordId){
    let hBtn1 = document.getElementById('btn1-'+recordId);
    let hBtn2 = document.getElementById('btn2-'+recordId);
    let hBtn3 = document.getElementById('btn3-'+recordId);
    let hBtn4 = document.getElementById('btn4-'+recordId);
    let hBtn5 = document.getElementById('btn5-'+recordId);

    let star1 = document.getElementById('star1-'+recordId);
    let star2 = document.getElementById('star2-'+recordId);
    let star3 = document.getElementById('star3-'+recordId);
    let star4 = document.getElementById('star4-'+recordId);
    let star5 = document.getElementById('star5-'+recordId);

    let valoration = document.getElementById('formValoration-'+recordId);
    let check = document.getElementById('formCheck-'+recordId);

    check.checked = true;
    
    if(btn == hBtn1){
        star1.className = "bi bi-star-fill";
        star2.className = "bi bi-star";
        star3.className = "bi bi-star";
        star4.className = "bi bi-star";
        star5.className = "bi bi-star";
        valoration.value = 1;
    }
    if(btn == hBtn2){
        star1.className = "bi bi-star-fill";
        star2.className = "bi bi-star-fill";
        star3.className = "bi bi-star";
        star4.className = "bi bi-star";
        star5.className = "bi bi-star";
        valoration.value = 2;
    }
    if(btn == hBtn3){
        star1.className = "bi bi-star-fill";
        star2.className = "bi bi-star-fill";
        star3.className = "bi bi-star-fill";
        star4.className = "bi bi-star";
        star5.className = "bi bi-star";
        valoration.value = 3;
    }
    if(btn == hBtn4){
        star1.className = "bi bi-star-fill";
        star2.className = "bi bi-star-fill";
        star3.className = "bi bi-star-fill";
        star4.className = "bi bi-star-fill";
        star5.className = "bi bi-star";
        valoration.value = 4;
    }
    if(btn == hBtn5){
        star1.className = "bi bi-star-fill";
        star2.className = "bi bi-star-fill";
        star3.className = "bi bi-star-fill";
        star4.className = "bi bi-star-fill";
        star5.className = "bi bi-star-fill";
        valoration.value = 5;
    }
}

function handleHover(btn, recordId) {
    let hBtn1 = document.getElementById('btn1-'+recordId);
    let hBtn2 = document.getElementById('btn2-'+recordId);
    let hBtn3 = document.getElementById('btn3-'+recordId);
    let hBtn4 = document.getElementById('btn4-'+recordId);
    let hBtn5 = document.getElementById('btn5-'+recordId);

    let star1 = document.getElementById('star1-'+recordId);
    let star2 = document.getElementById('star2-'+recordId);
    let star3 = document.getElementById('star3-'+recordId);
    let star4 = document.getElementById('star4-'+recordId);
    let star5 = document.getElementById('star5-'+recordId);

    let valoration = document.getElementById('formValoration-'+recordId);
    let check = document.getElementById('formCheck-'+recordId);

    if(!check.checked){
        if(btn == hBtn1){
            star1.className = "bi bi-star-fill";
            star2.className = "bi bi-star";
            star3.className = "bi bi-star";
            star4.className = "bi bi-star";
            star5.className = "bi bi-star";
            valoration.value = 1;
        }
        if(btn == hBtn2){
            star1.className = "bi bi-star-fill";
            star2.className = "bi bi-star-fill";
            star3.className = "bi bi-star";
            star4.className = "bi bi-star";
            star5.className = "bi bi-star";
            valoration.value = 2;
        }
        if(btn == hBtn3){
            star1.className = "bi bi-star-fill";
            star2.className = "bi bi-star-fill";
            star3.className = "bi bi-star-fill";
            star4.className = "bi bi-star";
            star5.className = "bi bi-star";
            valoration.value = 3;
        }
        if(btn == hBtn4){
            star1.className = "bi bi-star-fill";
            star2.className = "bi bi-star-fill";
            star3.className = "bi bi-star-fill";
            star4.className = "bi bi-star-fill";
            star5.className = "bi bi-star";
            valoration.value = 4;
        }
        if(btn == hBtn5){
            star1.className = "bi bi-star-fill";
            star2.className = "bi bi-star-fill";
            star3.className = "bi bi-star-fill";
            star4.className = "bi bi-star-fill";
            star5.className = "bi bi-star-fill";
            valoration.value = 5;
        }
    }

}