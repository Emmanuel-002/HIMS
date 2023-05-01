const getPatTitle = document.getElementById('pat_title')? document.getElementById('pat_title') : '';
const getEnrol = document.getElementById('enrol')? document.getElementById('enrol') : '';
const getDependency = document.getElementById('dependency')? document.getElementById('dependency') : '';
const getPatGender = document.getElementById('pat_gender')? document.getElementById('pat_gender') : '';
const getPatStatus = document.getElementById('pat_status')? document.getElementById('pat_status') : '';
const getPatReligion = document.getElementById('pat_religion')? document.getElementById('pat_religion') : '';
const getHeight = document.getElementById('pat_height')? document.getElementById('pat_height') : '';
const getWeight = document.getElementById('pat_weight')? document.getElementById('pat_weight') : '';
const getBMI = document.getElementById('pat_bmi')? document.getElementById('pat_bmi') : '';
const getTemp = document.getElementById('pat_temp')? document.getElementById('pat_temp') : '';
const getPatPhone = document.getElementById('pat_phone')? document.getElementById('pat_phone') : '';
const getNOKPhone = document.getElementById('nok_phone')? document.getElementById('nok_phone') : '';
const getPatFname = document.getElementById('pat_fname')? document.getElementById('pat_fname') : '';
const getPatMname = document.getElementById('pat_mname')? document.getElementById('pat_mname') : '';
const getPatLname = document.getElementById('pat_lname')? document.getElementById('pat_lname') : '';
const getPatFullname = document.getElementById('pat_fullname')? document.getElementById('pat_fullname') : '';
const getNOKFullname = document.getElementById('nok_fullname')? document.getElementById('nok_fullname') : '';
const getPulseRate = document.getElementById('pulse_rate')? document.getElementById('pulse_rate') : '';
const getBedNumber = document.getElementById('bed_number')? document.getElementById('bed_number') : '';
const getRoomNumber = document.getElementById('room_number')? document.getElementById('room_number') : '';
const getBP = document.getElementById('pat_bp')? document.getElementById('pat_bp') : '';
const getSP02 = document.getElementById('sp02')? document.getElementById('sp02') : '';

getEnrol?getEnrol.disabled=true:'';

const validateEnrolmentOptions = (event)=>{
    // event.preventDefault();
    if(getPatTitle&&getDependency&&getPatGender&&getPatStatus&&getPatReligion&&getEnrol){
        if((getPatTitle.value!=='0'&&getDependency.value!=='0'&&getPatGender.value!=='0'&&getPatStatus.value!=='0'&&getPatReligion.value!=='0')){
            getEnrol.disabled = false;
        }
        else{
            getEnrol.disabled=true;
        }
    }
}

const validateFloat = (event)=>{
    if(!((event.key.charCodeAt()>=48 && event.key.charCodeAt()<58) || (event.key.charCodeAt() ===46) || (event.key==="Backspace") || (event.key === "Delete"))){
        event.preventDefault();
    }
    if(event.target.value.length>=5){
        event.preventDefault();
    }
}
const validatePhoneNumber = (event)=>{
    if(!((event.key.charCodeAt()>=48 && event.key.charCodeAt()<58) || (event.key==="Backspace") || (event.key === "Delete"))){
        event.preventDefault();
    }
    if(event.target.value.length>=11){
        event.preventDefault();
    }
}
const validateSingleName =(event)=>{
    event.target.value = event.target.value.trim();
    const firstLetterCap = event.target.value.charAt(0).toUpperCase();
    const otherLetters = event.target.value.length>1?event.target.value.slice(1):'';
    event.target.value = firstLetterCap + otherLetters;
}
const validateFullName = (event)=>{
    const array = event.target.value.split(' ');
    const initialCapArray = array.map(elm=>{
        const firstLetterCap = elm.charAt(0).toUpperCase();
        const otherLetters = elm.length>1?elm.slice(1):'';
        return firstLetterCap+otherLetters;
    });
    event.target.value = initialCapArray.join(' ');
}
const validateNumber = (event)=>{
    if(!((event.key.charCodeAt()>=48 && event.key.charCodeAt()<58) || (event.key==="Backspace") || (event.key === "Delete"))){
        event.preventDefault();
    }
}
const validatePercentage = (event)=>{
    if(!((event.key.charCodeAt()>=48 && event.key.charCodeAt()<58) || (event.key==="Backspace") || (event.key === "Delete"))){
        event.preventDefault();
    }
    if(event.target.value.length>=3){
        event.preventDefault();
    }
}
const validateBP = (event)=>{
    if(!((event.key.charCodeAt()>=47 && event.key.charCodeAt() <58) || (event.key==="Backspace") || (event.key === "Delete"))){
        event.preventDefault();
    }
    if(event.target.value.length>=7){
        event.preventDefault();
    }
}
const calcBMI = (event)=>{
    event.preventDefault();
    if(getHeight.value)
    getBMI.value = (getWeight.value/(getHeight.value ** 2)).toFixed(2);
    else
    getBMI.value = (0).toFixed(2)
}
getPatTitle?getPatTitle.addEventListener('change',validateEnrolmentOptions):'';
getDependency?getDependency.addEventListener('change',validateEnrolmentOptions):'';
getPatGender?getPatGender.addEventListener('change',validateEnrolmentOptions):'';
getPatStatus?getPatStatus.addEventListener('change',validateEnrolmentOptions):'';
getPatReligion?getPatReligion.addEventListener('change',validateEnrolmentOptions):'';
getHeight?getHeight.addEventListener('keypress',validateFloat):'';
getWeight?getWeight.addEventListener('keypress',validateFloat):'';
getHeight?getHeight.addEventListener('keyup',calcBMI):'';
getWeight?getWeight.addEventListener('keyup',calcBMI):'';
getTemp?getTemp.addEventListener('keypress',validateFloat):'';
getPatPhone?getPatPhone.addEventListener('keypress',validatePhoneNumber):'';
getNOKPhone?getNOKPhone.addEventListener('keypress',validatePhoneNumber):'';
getPatFname?getPatFname.addEventListener('keyup',validateSingleName):'';
getPatMname?getPatMname.addEventListener('keyup',validateSingleName):'';
getPatLname?getPatLname.addEventListener('keyup',validateSingleName):'';
getPatFullname?getPatFullname.addEventListener('keyup',validateFullName):'';
getNOKFullname?getNOKFullname.addEventListener('keyup',validateFullName):'';
getPulseRate?getPulseRate.addEventListener('keypress',validateNumber):'';
getBedNumber?getBedNumber.addEventListener('keypress',validateNumber):'';
getRoomNumber?getRoomNumber.addEventListener('keypress',validateNumber):'';
getSP02?getSP02.addEventListener('keyup',validatePercentage):'';
getBP?getBP.addEventListener('keypress',validateBP):'';