const Add_doctor = document.getElementById("Add_doctor");
const UserCreateA = document.getElementById("UserCreateA");
const close = document.getElementById("close");

if(Add_doctor){
    Add_doctor.addEventListener('click', function(){
        UserCreateA.classList.add('active');
    })
}

if(close){
    close.addEventListener('click', function(){
        UserCreateA.classList.remove('active');
    })
}


const Add_Nurse = document.getElementById("Add_Nurse");
const UserCreateAN = document.getElementById("UserCreateA");
const closeN = document.getElementById("close");

if(Add_Nurse){
    Add_Nurse.addEventListener('click', function(){
        UserCreateAN.classList.add('active');
    })
}

if(closeN){
    closeN.addEventListener('click', function(){
        UserCreateAN.classList.remove('active');
    })
}



const Add_Receptionist = document.getElementById("Add_Receptionist");
const UserCreateAR = document.getElementById("UserCreateA");
const closeR = document.getElementById("close");

if(Add_Receptionist){
    Add_Receptionist.addEventListener('click', function(){
        UserCreateAR.classList.add('active');
    })
}

if(closeR){
    closeR.addEventListener('click', function(){
        UserCreateAR.classList.remove('active');
    })
}





const Treatment_bnt = document.getElementById("Treatment_bnt");
const patient_treatmentBox = document.getElementById("Patient_treatmentBox1");
const close_T = document.getElementById("close_treatment");

if(Treatment_bnt){
    Treatment_bnt.addEventListener('click', function(){
        patient_treatmentBox.classList.add('active');
    })
}

if(close_T){
    close_T.addEventListener('click', function(){
        patient_treatmentBox.classList.remove('active');
    })
}




const Admit_btn = document.getElementById("Admit");
const inpatientBox = document.getElementById("inpatientBox");
const inpatient_close = document.getElementById("inpatient_close");

if(Admit_btn){
    Admit_btn.addEventListener('click', function(){
        inpatientBox.classList.add('active');
    })
}

if(inpatient_close){
    inpatient_close.addEventListener('click', function(){
        inpatientBox.classList.remove('active');
    })
}