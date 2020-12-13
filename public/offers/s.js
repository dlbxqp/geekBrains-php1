let content = document.querySelector('section > div')

const allOffers = () => {
 axios({
  method: 'get',
  url: '/api/offers/'
 })
 .then((response) => { console.log(response.data.message)
  if(response.data.status){
   content.innerHTML = ''
   response.data.message.forEach((v) => {
    //<
    let img = new Image();
    img.src = './uploads/offers/small/' + v.index + '.jpg'
    img.alt = v.name
    img.onerror = () => {
     delete img
    }
    //>
    content.innerHTML += `
<a href="/?q=offers&sq=${v.index}">
 ${img.outerHTML}
 <div>${v.name}</div>
 <div>${v.short_description}</div>
</a>
`;
   })
  } else{
   content.innerHTML = response.data.message
  }
 })
 .catch((error) => console.log(error))
}
allOffers()