function setStars(votosTotales, votosAprovatorios, location){
    var estrellas = (votosAprovatorios/votosTotales) * 5;
    var decimales = Math.floor(estrellas);
    decimales = estrellas - decimales;

    var counter = 0;

    for (let index = 0; index < Math.floor(estrellas); index++) {
        //document.documentElement.innerHTML += '<i class="bi bi-star-fill"></i>';
        document.getElementById(location).innerHTML += '<i class="bi bi-star-fill"></i>';
        counter ++;
    }

    if(0.4 < decimales){
        document.getElementById(location).innerHTML += '<i class="bi bi-star-half"></i>';
        counter ++;
    }

    if(counter < 5){
        var diference = 5 - counter;

        for (let index = 0; index < diference; index++) {
            document.getElementById(location).innerHTML += '<i class="bi bi-star"></i>';         
        }
    }
}