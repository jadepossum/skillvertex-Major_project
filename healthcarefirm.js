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
const innerservicecontainer = document.querySelectorAll('.inner-service-container');
// let quotecards = document.querySelectorAll('.quote-card');
let node;
let hosid;
let totalcount = 0;
//functions
function test(){
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
        serviecescontainer.classList.toggle('unhide');
    }
    else{
        test();
    }
}
function newhospital(){
    if(serviecescontainer.classList.toString().includes('unhide')){
        containerbtns.forEach(btn=>{
            btn.style.background = 'lightblue';
        })
        hospitalcardcntr.style.display='none';
    }
    else{
        backtohomebtn.classList.toggle('hide');
        addhospitalbtn.classList.toggle('hide');
        hospitalcardcntr.classList.toggle('hide');
        document.querySelector('.btn-container').style.display='none';
        document.querySelector('.hospital-form-container').classList.toggle('hide');
    }
    
}
function closehospitalform(){
    console.log('closehospitalform');
    document.querySelector('.btn-container').style.display='flex';
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
            btn.style.background = 'lightcoral';
        });
        document.querySelector('.btn-container > ul').style.display='flex';
        serviecescontainer.classList.toggle('unhide');
        var str = ev.target.parentElement.lastElementChild.innerHTML;
        showhospitalpics(str);
        showhospitalpricelist(str);
        showinstantquote(str);
    })
});

function showhospitalpics(str) {
    if (str.length == 0) {
        document.querySelector(".hospital-services-container > .photo").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".hospital-services-container > .photo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "showhospitalpics.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showhospitalpricelist(str) {
    if (str.length == 0) {
        document.querySelector(".hospital-services-container > .price").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".hospital-services-container > .price").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "showhospitalprice.php?r=" + str, true);
        xmlhttp.send();
    }
}
function showinstantquote(str) {
    if (str.length == 0) {
        document.querySelector(".hospital-services-container > .quote").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".hospital-services-container > .quote").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "showinstantquote.php?h=" + str, true);
        xmlhttp.send();
    }
}
innerbtns.forEach(btn=>{
    btn.addEventListener('click',(ev)=>{
        innerbtns.forEach(elem=>{
            elem.classList.remove('btn-selected');
        })
        let selectedbtn = ev.target.classList.toString();
        innerservicecontainer.forEach(service=>{
            let selectedservice = service.classList.toString();
            if(selectedservice.includes(selectedbtn)){
                ev.target.classList.add('btn-selected');
                if(selectedservice.includes('unhide')){
                    console.log(service.classList.toString());
                }
                else{
                    service.classList.add('unhide');
                }
            }
            else{
                service.classList.remove('unhide');
            }
        })
    })
})
function showquote(obj){
    if(obj.classList.toString().includes('service-selected')){
        totalcount -= parseInt(obj.lastElementChild.innerHTML);
    }
    else{
        totalcount += parseInt(obj.lastElementChild.innerHTML);
    }
    obj.classList.toggle('service-selected');
    obj.parentElement.lastElementChild.lastElementChild.innerHTML = totalcount;
}
