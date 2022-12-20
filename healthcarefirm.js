//declaraitons
const hospitalcntr = document.querySelector('.container-two');
const hos = document.querySelector('.hs');
const addhospitalbtn = document.querySelector('.addhospital');
const backtohomebtn  = document.querySelector('.backtohome');
const hospitalcardcntr = document.querySelector('.hospital-card-container');
let servicesbtn = document.querySelectorAll('.hospital-services-btn');
let node;
//functions

console.log(hospitalcardcntr);
function test(){
    // console.log(hospitals.classList);
    hospitalcntr.classList.toggle('enlargedcard');
    // servicesbtn = document.querySelectorAll('.hospital-services-btn');
    
    

    // document.querySelector('.hospitals').style.overflow="auto";
}
function newhospital(){
    backtohomebtn.classList.toggle('hide');
    addhospitalbtn.classList.toggle('hide');
    hospitalcardcntr.classList.toggle('hide');
    document.querySelector('.hospital-form-container').classList.toggle('hide');
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
        console.log(ev.target.parentElement.firstElementChild);
        node = ev.target.parentElement.firstElementChild.cloneNode();
        // ev.target.parentElement.parentElement.style.visibility="hidden";
        // console.log(node);
        var inputelem = document.createElement('div');
        inputelem.innerHTML = "hell0 there i'm a cloned div";
        ev.target.parentElement.parentElement.appendChild(inputelem);
        console.log(inputelem);
    })
    // console.log(element);
});