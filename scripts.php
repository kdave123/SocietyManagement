function validateForm() {
    var x = document.getElementById("required").value;
    if (x == null || x == "") {
        alert("Please Fill in Details");
        return false;
   }
}