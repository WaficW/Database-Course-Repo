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
                return fetch("validate-email.php?email=" + encodeURIComponent(value))
                       .then(function(response) {
                           return response.json();
                       })
                       .then(function(json) {
                           return json.available;
                       });
            },
            errorMessage: "Email already taken"
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
    .onSuccess(() => {
        document.getElementById("signup").submit();
    });