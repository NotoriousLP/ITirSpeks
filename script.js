let bildesPorins = ['images/slideshow1.jpg', 'images/slideshow2.jpg', 'images/slideshow3.jpg', 'images/slideshow4.jpg']; //Masīvs ar 4 attēliem.
let i=0;

function slaiderisPorins(){ //funkcija, kas samainīs bildes.
    document.slide.src = bildesPorins[i]; //Tā ir viena no funckijām, kur dabū tās bildes no masīva.

    if(i< bildesPorins.length - 1){ //ja 0 < 3, tad bilde samainīsies
        i++;
        console.log("Nomainās bilde");
    }else{ //ja 3<3, tad jau bilde sāksies no 0, jeb no jauna.
        i=0;
    }
    setTimeout("slaiderisPorins()", 5000); //bildes mainīsies ik pēc 5 sekundēm
}

window.onload = slaiderisPorins; //šī metode izsauc, lai viņa visu laiku iet, kad ir atvērta mājaslapa.


