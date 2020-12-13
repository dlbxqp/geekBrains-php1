let content = document.querySelector('section > div')

const allReports = () => {
 axios({
  method: 'get',
  url: '/api/reports/'
 })
 .then((response) => { console.log(response.data.message)
  if(response.data.status){
   content.innerHTML = ''
   response.data.message.forEach((v) => {
    const date = '20' + v.index.substring(0, 2) +
     '-' + v.index.substring(2, 4) +
     '-' + v.index.substring(4, 6) +
     ' ' + v.index.substring(6, 8) +
     ':' + v.index.substring(8, 10) +
     ':' + v.index.substring(10, 12);
    content.innerHTML += `
<div>
 <div>${date}</div>
 <div>${v.author}</div>
 <div>${v.report}</div>
</div>
`;
   })
  } else{
   content.innerHTML = response.data.message
  }
 })
 .catch((error) => console.log(error))
}
allReports()


document.querySelector('button').addEventListener('click', (e) => {
 e.preventDefault()

 axios({
  method: 'post',
  url: '/api/reports/',
  data: {
   'author': document.querySelector('input').value,
   'report': document.querySelector('textarea').value
  }
 })
 .then((response) => { //console.log(response.data.message)
  document.querySelector('form').reset()
  allReports()
 })
 .catch((error) => console.log(error))
})