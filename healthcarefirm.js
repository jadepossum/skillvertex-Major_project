//declaraitons
const hospitalcntr = document.querySelector('.container-two');
const hos = document.querySelector('.hs');
const addhospitalbtn = document.querySelector('.addhospital');
const backtohomebtn  = document.querySelector('.backtohome');

//functions
function test(){
    // console.log(hospitals.classList);
    hospitalcntr.classList.toggle('enlargedcard');
    // document.querySelector('.hospitals').style.overflow="auto";
}
function newhospital(){
    backtohomebtn.classList.toggle('hide');
    addhospitalbtn.classList.toggle('hide');
    document.querySelector('.hospital-form-container').classList.toggle('hide');
}
function closehospitalform(){
    addhospitalbtn.classList.toggle('hide');
    backtohomebtn.classList.toggle('hide');
    document.querySelector('.hospital-form-container').classList.toggle('hide');
}