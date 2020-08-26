//#region check username function
// get a handle on the form
const form = document.querySelector('#registration-form')
// get a handle on input to be tested
const input = document.querySelector(".registration-username")
// specify characters to be searched 
// (use regexr.com or regex101.com to help you define your search pattern)
const regex = /[\s\.\-\/\,\\\@]/gi

// get a handle on error span message
const error_msg = document.querySelector('[data-message]')

function checkFormInput(inputString, regex) {
    // add an event listener to the form
    form.addEventListener('submit', (e) => {
        // match executes a search on string using the regex variable's specs 
        const match = regex.exec(inputString.value)

        // if there's no match - you're good
        if (!match) {
            console.log(inputString.value + ' - PASS')
        } else {
            // don't allow submission 
            e.preventDefault()
            // show error message
            error_msg.classList.add('bad-username')
            input.focus()
            // ask user to change their input
            console.error(`${inputString.value} - FAIL`)
        }
    })
}

// call function
checkFormInput(input, regex)

//#endregion