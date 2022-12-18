//declaraitons
const hospitalcntr = document.querySelector('.container-two');
const hos = document.querySelector('.hs');

//functions
function test(){
    // console.log(hospitals.classList);
    hospitalcntr.classList.toggle('enlargedcard');
    // document.querySelector('.hospitals').style.overflow="auto";
    
}
function newhospital(){
    document.querySelector('.addhospital').classList.toggle('hide');
    document.querySelector('.hospital-form-container').classList.toggle('hide');
}
function closehospitalform(){
    document.querySelector('.addhospital').classList.toggle('hide');
    document.querySelector('.hospital-form-container').classList.toggle('hide');
}