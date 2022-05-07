const REGEX_USER_NAME=/^[a-zA-Z0-9]{3,30}$/
const REGEX_PASSWORD=/^.{6,}$/;
/**
 *
 * @param el HTMLInput element to make valid or invalid
 * @param enable
 */
const enableErrorOn=(el,enable,message)=>{
    el.classList.remove('valid');
    el.classList.remove('invalid');
    el.classList.add(enable ?'invalid': 'valid');
    let errorEl=el.parentNode.querySelector('.invalid-feedback')
    if(errorEl==null){
        errorEl=document.createElement('div');
        errorEl.classList.add('invalid-feedback');
        el.parentNode.appendChild(errorEl);
    }
    errorEl.textContent=message;
    let successEl=el.parentNode.querySelector('.valid-feedback')
    if(successEl==null){
        successEl=document.createElement('div');
        successEl.classList.add('valid-feedback');
        successEl.textContent=el.name+' is valid';
        el.parentNode.appendChild(successEl);
    }
}

/**
 * enables form validation for all Form Html elements in the calling html page
 * use data-validate='1' to specify which you want to validate
 * use data-validate-pattern='regex' to specify a pattern to respect
 * use data-validate-message='1' to specify a message to display above the input the element if it does not respect data-validate-pattern
 */
const bindFormValidator=() =>{
    document.querySelectorAll('form.activate-validation').forEach((form) => {
        console.log('bound form '+form);
        console.log(form);
        form.addEventListener('submit', (e) => {
            const inputs = e.target.querySelectorAll("[data-validate='1']");
            let allValide = true;
            for (let input of inputs) {
                console.log("bound:"+input.name);
                let isInputValide =validateInput(input);
                if (!isInputValide) allValide = false;
                input.addEventListener('keyup',(e)=>validateInput(e.target));
                input.addEventListener('change',(e)=>validateInput(e.target));
            }

            if (allValide) {
                console.log('all valid');
            }else{
                e.preventDefault();
                //e.stopImmediatePropagation();
                console.log('not all is valid');
            }
        })
    });
}
const validateInput=(input)=>{
    let regexFromElement=input.dataset.validatePattern;
    let regex='';
    if(regexFromElement=='r:username'){
        regex=REGEX_USER_NAME;
    }else if(regexFromElement=='r:pass'){
        regex=REGEX_PASSWORD;
    }else
        regex=regexFromElement;

    let isInputValide ;
    if(input.hasAttribute('data-validate-match')){
        let elementToMatch= document.getElementById(input.dataset.validateMatch);
        isInputValide=input.value==elementToMatch.value && elementToMatch.value.match(regex);
    }else{

        isInputValide= null!=input.value.match(regex);
    }
    enableErrorOn(input, !isInputValide,input.dataset.validateMessage);
    return isInputValide;
}
bindFormValidator();
const resetValidation=(b)=> {
    document.querySelectorAll('form.activate-validation').forEach((form) => {
        form.querySelectorAll('input').forEach((input) => {
            input.classList.remove('has-validation');
            input.classList.remove('valid');
            input.classList.remove('invalid');
        })
    });
}