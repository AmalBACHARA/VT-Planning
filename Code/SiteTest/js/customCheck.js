$(function() {
    /*
     * Selection des documents à ajouter au groupe
     */
    $(".myCheck div").on("click", function() {

        var input = $(this).children("input")[0];
        //console.log(input);
        if (input.checked) {
            input.checked = false;
            $(this).css('background', "none");
        } else {
            input.checked = true;
            $(this).css('background', "#F5F5F6");
        }
    });
});
