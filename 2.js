var huruf = /^[a-zA-Z]{6}$/g;
function is_username_valid(username){
    if(username.match(huruf)){
      return true;
    }
    return false;
}
function is_password_valid(password) {
  var pas =/[7][a-zA-z\d!@#\$%\^&\*]{5,10}/gm;

  if(pas.test(password)){
    return true;
  }
}
console.log(is_username_valid('coba12') ? 'benar' : 'salah'); // return false
console.log(is_username_valid('Devina')?'benar':'salah');//return true

console.log(is_password_valid('p@ssW0rd9') ? 'benar' : 'salah'); //return false
console.log(is_password_valid('7Ark@demi')? 'benar' : 'salah'); //return true
