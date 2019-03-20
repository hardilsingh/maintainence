$('.checkAll').click(function () {
    if ($(this).prop('checked')) {
        $('input:checkbox').prop('checked', true);
    } else {
        $('input:checkbox').prop('checked', false);
    }
});

$(document).ready(function() {
    $('#search_text').keyup(function() {
        var txt = $(this).val();

        if (txt != '') {
            $.post("fetch.php", {
                suggestion: txt,
            }, function(data, status) {
                $("#result").html(data);
            });
        }else {
            $("#result").html("No data found");
        }
    });
});