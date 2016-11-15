
$(document).ready(function () {
    $('#translate').click(function () {
        translate($('#translation_text').val());
    });

});

function translate(trText) {

    $.get('translate', {'text': trText}).done(function (data) {

        data = $.parseJSON(data);

        $('#translation_result').text(data['text']);

        /*
         * @todo change tr direction
         * @todo if 1 word -> lookup
         * @todo if several words -> save linebreaks
         */
    });
}