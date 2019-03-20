

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