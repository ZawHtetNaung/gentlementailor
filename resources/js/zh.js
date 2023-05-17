$modal.on('shown.bs.modal', function() {
    var $modal = $('#modal');
    cropper = new Cropper(image, {
        aspectRatio: 4.8,
        viewMode: 1,
        preview: '.preview'
    });
}).on('hidden.bs.modal', function() {
    cropper.destroy();
    cropper = null;
});
// click crop
$("#crop").click(function() {
    canvas = cropper.getCroppedCanvas({
        width: 1920,
        height: 600
    });
    canvas.toBlob(function(blob) {
        // url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);

        reader.onloadend = function() {
            base64data.push(reader.result);
            $('#imageResult').attr('src', base64data);
            // $(".icon-text").hide();
        };
    });
    $modal.modal('hide');
});

$(".remove-img").click((index) => {
    const input = document.getElementById('upload');
    const fileListArr = Array.from(input.files);
    fileListArr.splice(index, 1);
    base64data.splice(index, 1);

    $("#uploaded_image").attr('src', '');
    $(".remove-img").hide();
    $(".icon-text").show();
});