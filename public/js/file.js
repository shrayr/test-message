$('#upload-file-input').change(function () {
    var file = this.value;
    file = file.replace(/.*[\/\\]/, '');
    $('.attached-file-area').html( "<p><i class='fa fa-file'></i> " + file + "</p>" );
});