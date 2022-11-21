function clickStar(btn){
    let hBtn1 = document.getElementById('btn1');
    let hBtn2 = document.getElementById('btn2');
    let hBtn3 = document.getElementById('btn3');
    let hBtn4 = document.getElementById('btn4');
    let hBtn5 = document.getElementById('btn5');

    let star1 = document.getElementById('star1');
    let star2 = document.getElementById('star2');
    let star3 = document.getElementById('star3');
    let star4 = document.getElementById('star4');
    let star5 = document.getElementById('star5');

    let valoration = document.getElementById('formValoration');
    let check = document.getElementById('formCheck');

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

function handleHover(btn) {
    let hBtn1 = document.getElementById('btn1');
    let hBtn2 = document.getElementById('btn2');
    let hBtn3 = document.getElementById('btn3');
    let hBtn4 = document.getElementById('btn4');
    let hBtn5 = document.getElementById('btn5');

    let star1 = document.getElementById('star1');
    let star2 = document.getElementById('star2');
    let star3 = document.getElementById('star3');
    let star4 = document.getElementById('star4');
    let star5 = document.getElementById('star5');

    let valoration = document.getElementById('formValoration');
    let check = document.getElementById('formCheck');

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