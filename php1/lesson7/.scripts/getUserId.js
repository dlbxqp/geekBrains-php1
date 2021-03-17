const getUserId = () => {
 let userId = getCookie('userId')

 if(userId == undefined){ //guid
  userId = Math.random(111111111111, 999999999999).toString(16).substring(2)
  /*
    userId = () => {
     const f = () => {
      return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1)
     }

     return f() + f() + '-' + f() + '-' + f() + '-' + f() + '-' + f() + f() + f()
    }
  */
 }

 document.cookie = `userId=${userId};max-age=` + (60 * 60 * 24 * 7 * 4)


 return userId
}