var jsSignUpPassword = document.getElementById("formSignUpPassword");
var jsSignUpPasswordConf = document.getElementById("formSignUpPasswordConf");
var jsPasswordRegexPattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}/;

var jsSignUpEmail = document.getElementById("formSignUpEmail");
var jsEmailRegexPattern = /^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$/;

// disabled 'Sign Up' button as default                                    
document.getElementById("formSignUpSubmit").disabled = true;

// replaces green with red box around 'Sign Up' button
document.getElementById("formSignUpSubmit").classList.remove('btn-success');
document.getElementById("formSignUpSubmit").classList.add('btn-danger');

var jsSignInEmail = document.getElementById("formSignInEmail");
var jsSignInPassword = document.getElementById("formSignInPassword");

// replaces green with red box around 'Sign In' button
document.getElementById("formSignInSubmit").classList.remove('btn-success');
document.getElementById("formSignInSubmit").classList.add('btn-danger');

function jsSignInSubmitEnable() {
    if (jsEmailRegexPattern.test(jsSignInEmail.value) && jsPasswordRegexPattern.test(jsSignInPassword.value)) {
        document.getElementById("formSignInSubmit").disabled = false;
        document.getElementById("formSignInSubmit").classList.remove("btn-danger");
        document.getElementById("formSignInSubmit").classList.add("btn-success");
    } else {
        document.getElementById("formSignInSubmit").disabled = true;
        document.getElementById("formSignInSubmit").classList.remove("btn-success");
        document.getElementById("formSignInSubmit").classList.add("btn-danger");
    }
}

// checking if email regex valid in sign-in email input
function jsSignInValidateEmail() {
    jsSignInSubmitEnable();

    if (!jsEmailRegexPattern.test(jsSignInEmail.value)) {
        jsSignInEmail.classList.add("is-invalid");
    } else {
        jsSignInEmail.classList.remove("is-invalid");
        jsSignInEmail.classList.add("is-valid");
    }
}

// checking if password regex valid in sign-in password input
function jsSignInValidatePassword() {
    jsSignInSubmitEnable();

    if (!jsPasswordRegexPattern.test(jsSignInPassword.value)) {
        jsSignInPassword.classList.add("is-invalid");
    } else {
        jsSignInPassword.classList.remove("is-invalid");
        jsSignInPassword.classList.add("is-valid");
    }
}

// if password and email patterns matched required regex and password == passwordConf, enable the 'Sign Up' button, otherwise, disabled it.
function jsSignUpSubmitEnable() {
    if (jsEmailRegexPattern.test(jsSignUpEmail.value) && jsPasswordRegexPattern.test(jsSignUpPassword.value) && jsSignUpPassword.value == jsSignUpPasswordConf.value) {
        document.getElementById("formSignUpSubmit").disabled = false;

        // replaces red with green box around 'Sign Up' button
        document.getElementById("formSignUpSubmit").classList.remove('btn-danger');
        document.getElementById("formSignUpSubmit").classList.add('btn-success');
    } else {
        document.getElementById("formSignUpSubmit").disabled = true;

        // replaces green with red box around 'Sign Up' button
        document.getElementById("formSignUpSubmit").classList.remove('btn-success');
        document.getElementById("formSignUpSubmit").classList.add('btn-danger');
    }
}

function jsSignUpValidateEmail() {
    jsSignUpSubmitEnable();

    // checking email regex
    if (!jsEmailRegexPattern.test(jsSignUpEmail.value)) {

        // check this id so that error message will not be printed out every time user clicks a key.
        // we want the message to appear once and stay there unitl email regex is valid
        if (!document.getElementById("formSignUpEmailInvalidFeedback")) {
            // add red box for email input using BS class: 'is-invalid'
            jsSignUpEmail.classList.add("is-invalid");

            // creates a <div> element
            var newElement = document.createElement("div");

            // sets an attribute id to check for <div> existance later
            newElement.setAttribute('id', 'formSignUpEmailInvalidFeedback');

            // BS requires <div class='invalid-feedback'> for $feedback_text, so we add this class to the div above                     
            newElement.classList.add("invalid-feedback");

            // creates $feedback_text
            var newElementContent = document.createTextNode("This is not a valid email address");

            // adds feedback_text into the <div class="invalid-feedback">This is not a valid email address</div>
            newElement.appendChild(newElementContent);

            //places this <div> element below email <input>                              
            jsSignUpEmail.parentNode.insertBefore(newElement, jsSignUpEmail.nextSibling);
        }
    } else {
        if (document.getElementById('formSignUpEmailInvalidFeedback')) {
            // remove <div id="formSignUpEmailInvalidFeedback"> we created earlier for $feedback_text
            document.getElementById("formSignUpEmailInvalidFeedback").parentNode.removeChild(document.getElementById("formSignUpEmailInvalidFeedback"));
        }

        // replaces red box with green box
        // remove red box
        jsSignUpEmail.classList.remove("is-invalid");
        // add green box
        jsSignUpEmail.classList.add("is-valid");
    }
}

// checking password regex and whether passwords are matched
function jsSignUpValidatePassword() {
    jsSignUpSubmitEnable();

    // checking password regex
    if (!jsPasswordRegexPattern.test(jsSignUpPassword.value)) {

        // check this id so that error message will not be printed out every time user clicks a key.
        // we want the message to appear once and stay there unitl email regex is valid
        if (!document.getElementById("formSignUpPasswordInvalidFeedback")) {
            // add red box for email input using BS class: 'is-invalid'
            jsSignUpPassword.classList.add("is-invalid");

            // creates a <div> element
            var newElement = document.createElement("div");

            // sets an attribute id to check for <div> existance later
            newElement.setAttribute('id', 'formSignUpPasswordInvalidFeedback');

            // BS requires <div class='invalid-feedback'> for $feedback_text, so we add this class to the div above                                 
            newElement.classList.add("invalid-feedback");

            // creates $feedback_text                                 
            var newElementContent = document.createTextNode("Password must be between 8 and 16 characters long, with at least one uppercase and lowercase character, one number and one special character (@, *, $ or #).");

            // adds feedback_text into the <div class="invalid-feedback">Password...</div>
            newElement.appendChild(newElementContent);

            // places this <div> element below password <input> 
            jsSignUpPassword.parentNode.insertBefore(newElement, jsSignUpPassword.nextSibling);
        }
    } else if (jsSignUpPassword.value != jsSignUpPasswordConf.value) {
        if (document.getElementById('formSignUpPasswordInvalidFeedback')) {
            // remove <div id="formSignUpPasswordInvalidFeedback"> we created earlier for $feedback_text
            document.getElementById("formSignUpPasswordInvalidFeedback").parentNode.removeChild(document.getElementById("formSignUpPasswordInvalidFeedback"));
        }

        // replaces red box with green box 
        // remove red box
        jsSignUpPassword.classList.remove("is-invalid");
        // add green box
        jsSignUpPassword.classList.add("is-valid");

        // check this id so that error message will not be printed out every time user clicks a key.
        // we want the message to appear once and stay there unitl email regex is valid                
        if (!document.getElementById("formSignUpPasswordConfInvalidFeedback")) {
            // add red box for email input using BS class: 'is-invalid'
            jsSignUpPasswordConf.classList.add("is-invalid");

            // creates a <div> element
            var newElement = document.createElement("div");

            // sets an attribute id to check for <div> existance later
            newElement.setAttribute('id', 'formSignUpPasswordConfInvalidFeedback');

            // BS requires <div class='invalid-feedback'> for $feedback_text, so we add this class to the div above                 
            newElement.classList.add("invalid-feedback");

            // creates $feedback_text                                     
            var newElementContent = document.createTextNode("Passwords don't match!");

            // adds feedback_text into the <div class="invalid-feedback">Password don't match</div>
            newElement.appendChild(newElementContent);

            // places this <div> element below passwordConf <input> 
            jsSignUpPasswordConf.parentNode.insertBefore(newElement, jsSignUpPasswordConf.nextSibling);
        }
    } else {
        if (document.getElementById('formSignUpPasswordConfInvalidFeedback')) {
            // remove <div id="formSignUpPasswordConfInvalidFeedback"> we created earlier for $feedback_text                
            document.getElementById("formSignUpPasswordConfInvalidFeedback").parentNode.removeChild(document.getElementById("formSignUpPasswordConfInvalidFeedback"));
        }

        // replaces red box with green box 
        // remove red box
        jsSignUpPasswordConf.classList.remove("is-invalid");
        // add green box
        jsSignUpPasswordConf.classList.add("is-valid");
    }
}
