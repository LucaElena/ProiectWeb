/*===== LOGIN SHOW and HIDDEN =====*/
const signUp = document.getElementById('sign-up'),
    passForgot = document.getElementById('change-pass'),
    signIn = document.getElementById('sign-in'),
    signIn1 = document.getElementById('sign-in1'),
    loginIn = document.getElementById('login-in'),
    loginUp = document.getElementById('login-up'),
    changePass = document.getElementById('login-forgot')


signUp.addEventListener('click', ()=>{
    // Remove classes first if they exist
    loginIn.classList.remove('block')
    loginUp.classList.remove('none')


    // Add classes
    loginIn.classList.toggle('none')
    loginUp.classList.toggle('block')
})

signIn.addEventListener('click', ()=>{
    // Remove classes first if they exist
    loginIn.classList.remove('none')
    loginUp.classList.remove('block')
   

    // Add classes
    loginIn.classList.toggle('block')
    loginUp.classList.toggle('none')
    
})

signIn1.addEventListener('click', ()=>{
    // Remove classes first if they exist
    loginIn.classList.remove('none')
    changePass.classList.remove('block')

    // Add classes
    loginIn.classList.toggle('block')
    changePass.classList.toggle('none')
})

passForgot.addEventListener('click', ()=>{
    // Remove classes first if they exist
    loginIn.classList.remove('block')
    changePass.classList.remove('none')
    
    // Add classes
    loginIn.classList.toggle('none')
    changePass.classList.toggle('block')
    
    
})

