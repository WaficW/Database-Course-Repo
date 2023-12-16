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
            validator: async (value) => {
                const response = await fetch("validate-email.php?email=" + encodeURIComponent(value));
                const json = await response.json();
                return json.available;
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