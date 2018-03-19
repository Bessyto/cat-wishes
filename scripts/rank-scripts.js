function imagePrevalidation(imageName) {
    var ext = imageName.substring(imageName.lastIndexOf('.') + 1);
    ext = ext.toLowerCase();
    var imageTypes = ["jpg", "png", "gif", "jpeg"];
    if (imageTypes.indexOf(ext) < 0) {
        return false;
    }
    return true;
}

$('.get-item').click(function () {

    var id = $(this).attr("id");
    var table = $(this).attr("table");
    event.preventDefault();

    $.post(
        "../views/details.php",
        {id: id, table: table},
        function (result) {
            $('#details').html(result);
        }
    );
});

$('#fileToUpload').change(function () {

    var x = document.getElementById("fileToUpload");
    var txt = "";
    if ('files' in x) {
        if (x.files.length == 0) {
            txt = "Select one or more files.";
        } else {
            for (var i = 0; i < x.files.length; i++) {
                // txt += "<br><strong>" + (i+1) + ". file</strong><br>";
                var file = x.files[i];
                if ('name' in file) {
                    txt += "Name: " + file.name + "<br>";
                    if (imagePrevalidation(file.name)) {
                        if ('size' in file && file.size < 500000) {
                            txt += "size: " + file.size + " bytes <br>";
                        } else {
                            txt += "File Too Large - must be less than 0.5 Mb "
                        }
                    } else {
                        txt += "Invalid File Type - must be jpg, png, or gif";
                    }
                }
            }
        }
    }
    document.getElementById("fileValidation").innerHTML = txt;
});

$(document).ready(function() {
    $('#recommendplus').click(function () {
        var itemName = $('#item_name').val();
        var invalid = false;

        // var description = $('#description').val();

        var badStrings = ["<a","<im","src","href","@", "{{", "url", "http", "\\", "/"];
        if (itemName.length !== 0) {
            for(var i = 0; i < badStrings.length; i++) {
                if (itemName.indexOf(badStrings[i]) >= 0) {
                    event.preventDefault();
                    alert("Html is not allowed.");
                    invalid = true;
                }
            }

            var description = $('#description').val();
            invalidDesc = false;

            var badStrings = ["<a","<im","src","href","@", "{{", "url", "http", "\\", "/"];
            if (description.length !== 0) {
                for(var i = 0; i < badStrings.length; i++) {
                    if (description.indexOf(badStrings[i]) >= 0) {
                        event.preventDefault();
                        alert("Html is not allowed.");
                        invalidDesc = true;
                    }
                }
            }
            if(invalidDesc){
                $('#description').val("");
            }
        }
        if(invalid){
            $('#item_name').val("");
        }
    });
});

