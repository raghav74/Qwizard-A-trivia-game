$(function () {
    /*$("form").keypress(function (e) { //prevent enter key from being pressed
        //Enter key
        if (e.which == 13) {
            return false;
        }
    });*/
    $("#a1").change(function () { //to update the option in correct answer dropdown
        //alert($(this).val());
        $("#correctAnswer option:eq(1)").text($(this).val());
    });
    $("#a2").change(function () {
        $("#correctAnswer option:eq(2)").text($(this).val());
    });
    $("#a3").change(function () {
        $("#correctAnswer option:eq(3)").text($(this).val());
    });
    $("#a4").change(function () {
        $("#correctAnswer option:eq(4)").text($(this).val());
    });
    // $('#submit').click(function () {
    //     /* when the submit button in the modal is clicked, submit the form if valid */
    //     //$('#formfield').validate();
    //     window.setTimeout(slowAlert, 1500);
    //     function slowAlert() {
    //         $('.modal').modal('hide');
    //         //$("form").focus();
    //     }
    // });
});