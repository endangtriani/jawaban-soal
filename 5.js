function countChar(a,b){
    var count=0;
    for(var i=0; i < a.length; i++){
      if(a[i] == b){
          count = count+1;
      }
    }
    if(count){
      return count;
    }else{
       console.log("notfound!");
    }

}
console.log(countChar("arkademy","a"));
console.log(countChar("javascript","x"));
