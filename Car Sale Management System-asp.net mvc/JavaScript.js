$(function () {
    $("#password_visibility").click(function () {
        var pass_input = document.getElementById("password_input");
        if (pass_input.type === "password") {
            pass_input.type = "text";
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            pass_input.type = "password";
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
});
