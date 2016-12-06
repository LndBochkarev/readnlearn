
$(document).ready(function () {

    var langList = {
        english: "en",
        russian: "ru",
    };

    $('#translate').click(function () {
        translate($('#translation_text').val());
    });

    //$('#direction_change').click(changeDirection());

});



function translate(trText) {

    $.get('translate', {'text': trText}).done(function (data) {

        data = $.parseJSON(data);

        $('#main_result').text(data['text']);



        /*
         * @todo change tr direction
         * @todo if 1 word -> lookup
         * @todo if several words -> save linebreaks
         */
    });
}

function setDirection() {

}

function swapDirection() {

}