const form1 = document.querySelector('form:first-of-type')

const actionForm1 = () => {
 axios({
  method: 'post',
  url: '/public/calc/calc.php',
  data: {
   'x': form1.querySelector('input:first-of-type').value,
   'y': form1.querySelector('input:last-of-type').value,
   'action': form1.querySelector('select').value
  }
 })
 .then((response) => {
  form1.querySelector('output').innerText = response.data
 })
 .catch((error) => console.log(error))
}

const cInputs = form1.querySelectorAll('input')
Array.from(cInputs).forEach((input) => {
 input.addEventListener('input', actionForm1)
})

form1.querySelector('select').addEventListener('change', actionForm1)


const form2 = document.querySelector('form:last-of-type')

const cButtons = form2.querySelectorAll('button')
Array.from(cButtons).forEach((button) => {
 button.addEventListener('click', (e) => {
  e.preventDefault()

  axios({
   method: 'post',
   url: '/public/calc/calc.php',
   data: {
    'x': form2.querySelector('input:first-of-type').value,
    'y': form2.querySelector('input:last-of-type').value,
    'action': e.target.textContent
   }
  })
  .then((response) => {
   form2.querySelector('output').innerText = response.data

   Array.from(cButtons).forEach((button) => {
    button.removeAttribute('style')
   })
   e.target.style.backgroundColor = 'white'
  })
  .catch((error) => console.log(error))
 })
})

