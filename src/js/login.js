function updateInput(element, checker) {
    let value = element.val();

    element.removeClass("good");
    element.removeClass("bad");

    if (value !== "") {
        if (checker(value)) {
            element.addClass("good");
        } else {
            element.addClass("bad");
        }
    }

    updateLoginButton();
}

function updateLoginButton() {
    let valid = true;

    $("input").each(function () {
        if ($(this).hasClass("bad")) {
            valid = false;
        } else if (!$(this).hasClass("good")) {
            valid = false;
        }
    });

    if (valid) {
        $("button[type='submit']").prop("disabled", false);
    } else {
        $("button[type='submit']").prop("disabled", true);
    }
}

$("#email").on("input", function () {
    updateInput($(this), (value) => {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(value);
    });
});

$("#password").on("input", function () {
    updateInput($(this), (value) => {
        return value.length >= 8;
    });
});

$("#email").trigger("input");
$("#password").trigger("input");
