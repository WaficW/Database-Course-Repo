const validation = new JustValidate("#signup");

validation
    .addField("#firstName", [
        {
            rule: "required"
        }
    ])
    .addField("#lastName", [
        {
            rule: "required"
        }
    ])
    .addRequiredGroup(document.querySelector('#radioGroup'))
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                console.log("Validation function called for email:", value);
                return fetch("/github%20repos/Database-Course-Repo/Code/validate-email.php?email=" + encodeURIComponent(value))
                       .then(function(response) {
                           return response.json();
                       })
                       .then(function(json) {
                           return json.available;
                       });
            },
            errorMessage: "email already taken"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#number", [
        {
            rule: "required"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });