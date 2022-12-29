//declaraitons
const hospitalcntr = document.querySelector('.container-two');
const hos = document.querySelector('.hs');
const addhospitalbtn = document.querySelector('.addhospital');
const backtohomebtn  = document.querySelector('.backtohome');
const hospitalcardcntr = document.querySelector('.hospital-card-container');
let servicesbtn = document.querySelectorAll('.hospital-services-btn');
let hospitalcards = document.querySelector('.hospitalcard');
const containerbtns = document.querySelectorAll('.btn-container > button');
const innerbtns = document.querySelectorAll('.inner-btns > *');
const serviecescontainer = document.querySelector('.hospital-services-container');
let node;
let hosid ;
//functions

console.log(hospitalcardcntr);
function test(){
    // console.log(hospitals.classList);
    hospitalcntr.classList.toggle('enlargedcard');
    // servicesbtn = document.querySelectorAll('.hospital-services-btn');
    // document.querySelector('.hospitals').style.overflow="auto";
}
function prevpage(){
    if(serviecescontainer.classList.toString().includes('unhide')){
        hospitalcardcntr.style.display='flex';
        containerbtns.forEach(btn=>{
            btn.style.background = 'green';
        })
        document.querySelector('.btn-container > ul').style.display = 'none';
        console.log(serviecescontainer);
        serviecescontainer.classList.toggle('unhide');
    }
    else{
        test();
    }
}
function newhospital(){
    if(serviecescontainer.classList.toString().includes('unhide')){
        containerbtns.forEach(btn=>{
            console.log(btn);
            btn.style.background = 'lightblue';
        })
        hospitalcardcntr.style.display='none';
    }
    else{
        backtohomebtn.classList.toggle('hide');
    addhospitalbtn.classList.toggle('hide');
    hospitalcardcntr.classList.toggle('hide');
    document.querySelector('.hospital-form-container').classList.toggle('hide');
    }
    
}
function closehospitalform(){
    
        addhospitalbtn.classList.toggle('hide');
        backtohomebtn.classList.toggle('hide');
        hospitalcardcntr.classList.toggle('hide');
        document.querySelector('.hospital-form-container').classList.toggle('hide');
    
}

//eventlisteners

servicesbtn.forEach(element => {
    element.addEventListener('click',(ev)=>{
        hospitalcardcntr.style.display='none';
        containerbtns.forEach(btn=>{
            console.log(btn);
            btn.style.background = 'lightcoral';
        });
        document.querySelector('.btn-container > ul').style.display='flex';
        console.log(serviecescontainer);
        serviecescontainer.classList.toggle('unhide');
        var str = ev.target.parentElement.lastElementChild.innerHTML;
        showhospitalpics(str);
        showhospitalpricelist(str);
    })
    // console.log(element);
});

function showhospitalpics(str) {
    if (str.length == 0) {
        document.querySelector(".photo-container").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".photo-container").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "showhospitalpics.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showhospitalpricelist(str) {
    if (str.length == 0) {
        document.querySelector(".price-container").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".price-container").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "showhospitalprice.php?r=" + str, true);
        xmlhttp.send();
    }
}
console.log(innerbtns);
innerbtns.forEach(btn=>{
    btn.addEventListener('click',(ev)=>{
        console.log(ev.target);
    })
})