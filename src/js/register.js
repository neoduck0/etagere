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

    updateRegisterButton();
}

function updateRegisterButton() {
    let valid = true;

    $("input:not([type='hidden'])").each(function () {
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

$("#first-name").on("input", function () {
    updateInput($(this), (value) => {
        return value.trim() !== "";
    });
});

$("#last-name").on("input", function () {
    updateInput($(this), (value) => {
        return value.trim() !== "";
    });
});

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

    $("#confirm-password").trigger("input");
});

$("#confirm-password").on("input", function () {
    updateInput($(this), (value) => {
        return value === $("#password").val();
    });
});

$("#first-name").trigger("input");
$("#last-name").trigger("input");
$("#email").trigger("input");
$("#password").trigger("input");
$("#confirm-password").trigger("input");
