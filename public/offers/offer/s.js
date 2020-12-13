let content = document.querySelector('section > div')
//+
const url = new URL(document.location)
const q = url.searchParams.get('q')
const sq = url.searchParams.get('sq')

const getOffer = (index = '') => { //console.log('index', index)
 axios({
  method: 'get',
  url: '/api/offers/' + index
 })
 .then((response) => { //console.log(response.data.message)
  if(response.data.status){
   content.innerHTML = ''
   const {name, full_description} = response.data.message
    //<
    let img = new Image();
    img.src = './uploads/offers/big/' + index + '.jpg'
    img.alt = name
    img.onerror = () => {
     delete img
    }
    //>
    content.innerHTML += `
 <a href="/?q=${q}">< Назад</a>
 <div>${name}</div>
 ${img.outerHTML}
 <div>${full_description}</div>
`;
  } else{
   content.innerHTML = response.data.message
  }
 })
 .catch((error) => console.log(error))
}


getOffer(sq)