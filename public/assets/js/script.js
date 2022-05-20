var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
const Matricule= document.getElementById("Matricule");
const Nom_complet= document.getElementById("Nom_complet");
const Genre= document.getElementById("Genre");
const Class_id= document.getElementById("Class_id");
const Matiere= document.getElementById("Matiere");
const Phone= document.getElementById("Phone");
/*--Function validation signup page---*/
function validation(){
    if (Matricule.value == "" || Matricule.value ==  NULL || Matricule.value == " ") {
        
        alert("Check Matricule");
        return false;
    }else if (Nom_complet.value == "" || Nom_complet.value ==  NULL) {
        alert("Check Nom Complet");
        return false;
    }else if (Genre.value == "" || Genre.value ==  NULL) {
        alert("Check Genre");
        return false;
    }else if (Class_id.value == "" || Class_id.value ==  NULL) {
        alert("Check Class id");
        return false;
    }else if (Matiere.value == "" || Matiere.value ==  NULL) {
        alert("Check Matiere");
        return false;
    }else if (Phone.value == "" || Phone.value ==  NULL) {
        alert("Check Phone");
        return false;
    }else return true;
}