function validateEmail()
{
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
        email.setCustomValidity("");
    } else {
        email.setCustomValidity("Adresse email non valide");
    }
}

function validatePw()
{
    if (pw.value == "") {
        pw.setCustomValidity("Un mot de passe doit être saisi");
    } else {
        pw.setCustomValidity("");
    }
}

function validateReason()
{
    if (slctReason.value == 0) {
        slctReason.setCustomValidity("Un motif doit être saisi");
    } else {
        slctReason.setCustomValidity("");
    }
}

function validatePower()
{
    if (km.value == "" || isNaN(km.value)) {
        km.value = 0;
    }

    if (km.value != 0 && slctPower.value == 0) {
        slctPower.setCustomValidity("Une puissance doit être sélectionnée");
    } else {
        slctPower.setCustomValidity("");
    }
}

function validateKm()
{
    if ((km.value == "" || isNaN(km.value)) && slctPower.value != 0) {
        km.value = 0;
        km.setCustomValidity("Une distance doit être saisie");
    } else {
        km.setCustomValidity("");
    }
}
