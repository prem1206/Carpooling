var cango = [1, 1, 1];
function error(flag) {
document.getElementById("keya" + flag).innerText = "";
var z = document.getElementById("key" + flag);
z.style.backgroundColor = "rgba(184, 180, 180, 0.3)";
cango[flag - 1] = 1;

}

function valid(scope) {
   var t = cango.reduce((sum, num) => sum + num, 0);
    if (t == 3)
        return true;
    else
        {alert("SOlve the dispute");
                  return false;}

}

function Avalability(val, flag) {
var xhr = new XMLHttpRequest();
var z = document.getElementById("key" + flag);
if (val != null && val != '') {
    xhr.open('GET', "PHP/lookup.php?value=" + val + "&flag=" + flag, true);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var result = this.responseText;
            if (result == 0) {
                z.style.backgroundColor = "rgb(255,0,0,0.4)";   
                document.getElementById("keya" + flag).innerText = "Already Registered";
                cango[flag - 1] = 0;
            }
        }
    }
    xhr.send();
}
else{ 
    cango[flag - 1] = 0;
    z.style.backgroundColor = "rgb(255,0,0,0.4)";
}
}