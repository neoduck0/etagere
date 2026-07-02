function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validatePassword(password) {
    return password.length >= 8;
}

function updateLoginButton() {
    if (
        validateEmail($("#email").val()) &&
        validatePassword($("#password").val())
    ) {
        $("button[type='submit']").prop("disabled", false);
    } else {
        $("button[type='submit']").prop("disabled", true);
    }
}

$("#email").on("input", function () {
    let value = $(this).val();

    $(this).removeClass("good");
    $(this).removeClass("bad");

    if (value !== "") {
        if (validateEmail(value)) {
            $(this).addClass("good");
        } else {
            $(this).addClass("bad");
        }
    }
    updateLoginButton();
});

$("#password").on("input", function () {
    let value = $(this).val();

    $(this).removeClass("good");
    $(this).removeClass("bad");

    if (value !== "") {
        if (validatePassword(value)) {
            $(this).addClass("good");
        } else {
            $(this).addClass("bad");
        }
    }
    updateLoginButton();
});

updateLoginButton();
