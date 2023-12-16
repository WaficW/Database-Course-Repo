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
                try {
                    const response = await fetch("validate-email.php?email=" + encodeURIComponent(value));
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const json = await response.json();
                    return !json.available; // return the opposite of json.available
                } catch (error) {
                    console.error('There was a problem with the fetch operation: ', error);
                    throw error; // re-throw the error to be handled by the validation library
                }
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