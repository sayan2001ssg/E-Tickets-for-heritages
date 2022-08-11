var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

nm = mm+1;
nd = dd+1;

if (dd < 10) {
   dd = '0' + dd;
}

if (nm < 10) {
   nm = '0' + nm;
}

if (mm < 10) {
   mm = '0' + mm;
}
if (nd < 10) {
   nd = '0' + nd;
}    
lday = yyyy + '-' + nm + '-' + dd;
tday = yyyy + '-' + mm + '-' + dd;
nday = yyyy + '-' + mm + '-' + nd;


document.getElementById("cvisit").setAttribute("min", nday);
document.getElementById("cvisit").setAttribute("max", lday);
document.getElementById("visit").setAttribute("min", tday);
document.getElementById("fvisit").setAttribute("min", tday);
document.getElementById("visit").setAttribute("max", lday);
document.getElementById("fvisit").setAttribute("max", lday);