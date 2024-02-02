const sliderImg = document.querySelector("#slider img");
const prev = document.getElementById("prev");
const next = document.getElementById("next");

const urlImg = [
    "../assets/img/morgane-bru-360final.jpg",
    "../assets/img/morgane-bru-carca-copie.jpg",
    "../assets/img/critaux.jpg"
];

// 1ere étape : je déclare un index
let i = 0;
sliderImg.src = urlImg[i];
// * CREATION DU STYLE EN JS CAR IL PREND LE DESSUS SUR LE CSS **
sliderImg.style.width = "100%";
sliderImg.style.height = "auto";
sliderImg.style.objectFit = "cover";
sliderImg.style.objectPosition = "0px -300px";
sliderImg.style.zIndex  = "0";



setInterval(
    function () {
        if (i === urlImg.length - 1) {
            i = 0;

            sliderImg.src = urlImg[i];
        } else {
            i++;
            sliderImg.src = urlImg[i];
        }
    },
    4000
)