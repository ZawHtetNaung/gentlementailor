   var $testi_modal = $('#modal');
   var cropper;
   $testi_modal.on('shown.bs.modal', function() {
       cropper = new Cropper(image, {
           aspectRatio: 4.5,
           viewMode: 1,
           preview: '.preview'
       });
   }).on('hidden.bs.modal', function() {
       cropper.destroy();
       cropper = null;
   });
   // click crop
   $("#testi-crop").click(function() {
       console.log(cropper.getCroppedCanvas());
       canvas = cropper.getCroppedCanvas({
           width: 400,
           height: 300
       });


       canvas.toBlob(function(blob) {
           // url = URL.createObjectURL(blob);
           var reader = new FileReader();
           console.log(reader);
           reader.readAsDataURL(blob);

           reader.onloadend = function() {
               base64data.push(reader.result);
               $('#imageResult').attr('src', base64data);
               // $(".icon-text").hide();
           };
       });
       $testi_modal.modal('hide');
   });

   $(".remove-img").click((index) => {
       const input = document.getElementById('upload');
       const fileListArr = Array.from(input.files);
       fileListArr.splice(index, 1);
       base64data.splice(index, 1);

       $("#imageResult").attr('src', '');
       $(".remove-img").hide();
       $(".icon-text").show();
   });

   /***/