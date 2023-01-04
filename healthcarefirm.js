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
var hosid;
let totalcount = 0;


//functions
function photoformval(obj){
    console.log(obj.parentElement.firstElementChild.value);
    let files = obj.parentElement.firstElementChild.files;
    for (var i = 0; i < files.length; i++){
        console.log(files[i]);
    }
    
}
function priceformval(obj){
    console.log(obj.parentElement.children[0].value);
    console.log(obj.parentElement.children[1].value);
    let str1 = obj.parentElement.children[0].value;
    let str2 = obj.parentElement.children[1].value;
    uploadnewservice(str1,str2);
}
function logoutnow(){
    location.href="logout.php";
}
function test(){
    hospitalcntr.classList.toggle('enlargedcard');
    // servicesbtn = document.querySelectorAll('.hospital-services-btn');
    // document.querySelector('.hospitals').style.overflow="auto";
}
function prevpage(){
    if(serviecescontainer.classList.toString().includes('unhide')){
        hospitalcardcntr.style.display='flex';
        addhospitalbtn.style.display='inline';
        document.querySelector('.btn-container > ul').style.display = 'none';
        serviecescontainer.classList.toggle('unhide');
    }
    else{
        test();
    }
}
function newhospital(){
    if(serviecescontainer.classList.toString().includes('unhide')){
        innerservicecontainer.forEach(cntr=>{
            if(cntr.classList.toString().includes('unhide')){
                if(cntr.classList.toString().includes('photo')){
                    console.log('photo');
                    location.href = "uploadhospitalimgs.php";
                }
                if(cntr.classList.toString().includes('price')){
                    document.querySelector('.price-form').style.display= 'none';
                    document.querySelector('.btn-container').style.display='none';
                    document.querySelector('.logout').style.display='none';
                    window.print();
                    document.querySelector('.btn-container').style.display='flex';
                    document.querySelector('.logout').style.display='inline';
                    document.querySelector('.price-form').style.display= 'inline';
                }
                if(cntr.classList.toString().includes('quote')){
                    console.log('quote');
                    
                }
            }
        })
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
        addhospitalbtn.style.display='none';
        hospitalcardcntr.style.display='none';
        document.querySelector('.btn-container > ul').style.display='flex';
        serviecescontainer.classList.toggle('unhide');
        hosid = ev.target.parentElement.lastElementChild.innerHTML;
        showhospitalpics(hosid);
        showhospitalpricelist(hosid);
        showinstantquote(hosid);
    })
});
function uploadnewservice(str1,str2) {
    if (str1.length == 0 || str2.length == 0) {
        document.querySelector(".hospital-services-container > .photo").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log('pricelist has been updated.');
            }
        };
        xmlhttp.open("POST", "uploadnewservice.php?servicename=" + str1 + "&serviceprice="+str2, true);
        xmlhttp.send();
    }
    showhospitalpricelist(hosid);
    showinstantquote(hosid);
}
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
        if(selectedbtn.includes('price')){
            addhospitalbtn.style.display='inline';
            addhospitalbtn.innerHTML='print';
        }
        else{
            addhospitalbtn.style.display='none';
            addhospitalbtn.innerHTML='add';
        }
        
        innerservicecontainer.forEach(service=>{
            let selectedservice = service.classList.toString();
            if(selectedservice.includes(selectedbtn)){
                ev.target.classList.add('btn-selected');
                if(!selectedservice.includes('unhide')){
                    service.classList.add('unhide');
                }
                service.classList.add('moveup');
            }
            else{
                service.classList.remove('unhide');
                service.classList.remove('moveup');
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
