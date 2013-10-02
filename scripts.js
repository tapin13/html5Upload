$(function() {
    $('#uploadFileButton').click(function() {
        uploadFile();
    });
});

function uploadFile() {
    $('#uploadFileLoading').removeClass('hide');
    var file = $('#uploadFile')[0].files[0]; //Files[0] = 1st file
    var reader = new FileReader();
    reader.readAsDataURL(file);
//reader.readAsDataURL(file);
//reader.onloadstart = ...
//reader.onprogress = ... <-- Allows you to update a progress bar.
//reader.onabort = ...
//reader.onerror = ...
//reader.onloadend = ...            
    reader.onload = function(event) {
        $.post('/ajax_functions.php'
                , {'function': 'uploadFile'
                    , data: event.target.result
                    , filetype: $('#uploadFile')[0].files[0].type
                    , filename: $('#uploadFile')[0].files[0].name
        }
        , function(data) {
            $('#uploadFileLoading').addClass('hide');

            if (data.error == 'error') {
                alert('Data not correct');
                return;
            }

            var html = '';
            html += '<a href="/getfile.php?document_id=' + data.document_id + '&document_filename=' + data.filename + '">' + data.filename + '</a>';
            $("#uploadFileLink").html(html);
        }, 'json');
    }
}