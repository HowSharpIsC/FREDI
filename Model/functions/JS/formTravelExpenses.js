var divPower = document.getElementById("power");
var slctPower = document.getElementById("slctPower");
var km = document.getElementById("kilometers");
var validation = document.getElementById("validation");
var slctReason = document.getElementById("slctReason");

validation.addEventListener("click", validateReason);
validation.addEventListener("click", validatePower);
validation.addEventListener("click", validateKm);

km.addEventListener("keyup", function() {

    if (km.value != "" && km.value != 0 && !isNaN(km.value)) {
        divPower.hidden = false;
    } else {
        slctPower.value = 0;
        divPower.hidden = true;
    }
});
