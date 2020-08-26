//#region logout functionality
fetch('helper/is_logged_in.php')
    .then(res => res.json()) // don't need?
    .then(function (res) {
        const login = document.querySelector('#login')
        const logout = document.querySelector('#logout')

        if (res.status == 'yes') {

            login.style.display = 'none'
            logout.style.display = 'inline-block'

            logout.addEventListener('click', function (e) {
                e.preventDefault()
                fetch('helper/logout_ajax.php')
                    .then(res => res.json()) // need?
                    .then(function (res) {
                        if (res.status == 'success') {
                            login.style.display = 'inline-block'
                            logout.style.display = 'none'
                            // document.querySelector('#message').innerHTML = '<p>You have been logged out.</p>'
                            window.location.href = "login.php"
                        }
                    })
            })
        } else {
            // remove links here
            login.style.display = 'inline-block'
            logout.style.display = 'none'

        }
    })

//#endregion
