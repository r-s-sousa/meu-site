function mudouPass() {
   var valor = document.getElementById('showpass').checked;
   var passwd = document.getElementById('inputPassword');

   if (valor) {
      passwd.type = "text";
   } else {
      passwd.type = "password";
   }
}

