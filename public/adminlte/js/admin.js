// Preview Image - use onchange="previewFile(this) on input type file
function previewFile(input) {
    var file = $(input).get(0).files[0];
    $("#preview").remove();
    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $("#previewImg").attr("src", reader.result);
            $(input).parent().after(
                `<img width='100px' style="border:2px solid" class="mt-3 p-3 rounded" id="preview" src="${reader.result}" />`);
        }
        reader.readAsDataURL(file);
    }
}