var modify = document.getElementById("ModifyUserData");
var cancel = document.getElementById("cancelModifications");

var LastName = document.getElementById("LastName");
var FirstName = document.getElementById("FirstName");
var Address = document.getElementById("Address");
var City = document.getElementById("City");
var ZipCode = document.getElementById("ZipCode");
var Telephone = document.getElementById("Telephone");
var Email = document.getElementById("Email");
var RegisterUserData = document.getElementById("RegisterUserData");
var cancelModifications = document.getElementById("cancelModifications");

var toHide = document.getElementsByName("actual");

modify.addEventListener("mouseup", function(){

    LastName.hidden = false;
    FirstName.hidden = false;
    Address.hidden = false;
    City.hidden = false;
    ZipCode.hidden = false;
    Telephone.hidden = false;
    Email.hidden = false;
    RegisterUserData.hidden = false;
    cancelModifications.hidden = false;

    toHide.forEach(elementToHide => {
        elementToHide.hidden = true;
    });
});

var lName = document.getElementById("LastName").value;
var fName = document.getElementById("FirstName").value;

cancel.addEventListener("mouseup", function(){

    LastName.hidden = true;
    FirstName.hidden = true;
    Address.hidden = true;
    City.hidden = true;
    ZipCode.hidden = true;
    Telephone.hidden = true;
    Email.hidden = true;
    RegisterUserData.hidden = true;
    cancelModifications.hidden = true;

    toHide.forEach(elementToShow => {
        elementToShow.hidden = false;
    });
});

var cerfa = document.getElementById("cerfa");
var filledCerfa = "View/Ressources/CERFA/" + lName + "-" + fName + "-" + 
    new Date().getFullYear() + ".pdf";

cerfa.addEventListener("mouseup", function() {
    $.post("Model/PDF/ghostfly/pdf-forms-filler/example/pdfGeneration.php"
    ).done(function() {
        window.open(filledCerfa, 'Download');
    });
});
