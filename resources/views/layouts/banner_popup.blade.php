 <!-- /.modal -->
 @foreach ($banners as $banner)
    <div class="modal fade" id="modal-primary{{$banner->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Edit Banner</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('update_banner',$banner->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="photo" value="{{$banner->photo}}">
                <div class="modal-body">
                    <!-- zh-dropzone -->
                    <div class="container py-5">
                        <div class="row py-4">
                            <div class="image_area col-lg-6 mx-auto">

                                <!-- Upload image input-->
                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="upload" type="file" name="photo" onchange="readURL(this);" class="image form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                    </div>
                                </div>

                                <!-- Uploaded image area-->
                                <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                <div class="image-area mt-4">
                                <div class="remove-img">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                <img id="imageResult" src="{{'/frontend/images/'. $banner->photo}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                </div>

                                <div class="form-group" style="
                                    margin-top: 1rem;
                                ">
                                <label>Text</label>
                                <input name="text" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Text">
                                </div>
                                
                                <div class="form-group">
                                <label>Button Text</label>
                                <select class="form-control" name="button_text">
                                    <option value="" selected hidden>Choose Button Text</option>
                                    <option>Customize</option>
                                    <option>Explore</option>
                                    <option>Shop Now</option>
                                </select>
                                </div>

                                <!-- /.card-body -->
                                <div class="form-group">
                                <button id="add_banner" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- crop popup -->
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Crop Banner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                </div>
                                <div class="col-md-4">
                                <div class="preview"></div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="crop">Crop</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Save changes</button>
                </div> -->
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
    <!-- /.modal -->
    @push('input-file-scripts')
<script>
  $(".remove-img").hide();
  $(function () {
    bsCustomFileInput.init();
  });
  const base64data = [];
  var $modal = $('#modal');
  var image = document.getElementById('image');
  var cropper;
  $("body").on("change", ".image", function(e){
  var files = e.target.files;
  var done = function (url) {
  image.src = url;
  $modal.modal('show');
  $(".remove-img").show();
  };
  var reader;
  var file;
  var url;
  if (files && files.length > 0) {
  file = files[0];
  if (URL) {
  done(URL.createObjectURL(file));
  } else if (FileReader) {
  reader = new FileReader();
  reader.onload = function (e) {
  done(reader.result);
  };
  reader.readAsDataURL(file);
  }
  }
  });
  $modal.on('shown.bs.modal', function () {
  cropper = new Cropper(image, {
  aspectRatio: 1,
  viewMode: 3,
  preview: '.preview'
  });
  }).on('hidden.bs.modal', function () {
  cropper.destroy();
  cropper = null;
  });



  $("#add_banner").click(function(e){
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    e.preventDefault();
    var formData = {
        button_text : jQuery("select[name=button_text]").val(),
        text : jQuery("input[name=text]").val(),
        photo : base64data
    }
  $.ajax({
  type: "POST",
  dataType: "json",
  url: "store_banner",
  data: formData,
  error:function(err){
      // console.warn(err.responseJSON.errors);
      $.each(err.responseJSON.errors, function (i, error) {
                var al = $(document).find('[name="'+i+'"]');
                var el = al.parent();
                var pl = al.parents('div.image_area');
                pl.addClass('photo-invalid');
                el.after($('<small class="text-danger font-weight-bolder"> <i class="fas fa-exclamation-circle"></i> '+error[0]+'</small>'));
                al.addClass('is-invalid');
            });
  },
  success: function(response){
    if(response.success){
      swal({
            title: "Your Item was uploaded successfully!",
            text: "",
            type: "success",
            icon: "success"
        }).then(function() {
          window.location.href = "{{ route('show_banner')}}";
        });
    }else{
        alert("Error");
    }
    
  }
  });

  
  });

</script>
@endpush
@push('bootstrap-dropzone-script')
<script>
  /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imageResult')
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$(function() {
  $('#upload').on('change', function() {
    readURL(input);
  });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById('upload');
var infoArea = document.getElementById('upload-label');

input.addEventListener('change', showFileName);

function showFileName(event) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

</script>
@endpush
@push('css')
<style>
  img {
display: block;
max-width: 100%;
}
.preview {
overflow: hidden;
width: 160px; 
height: 160px;
margin: 10px;
border: 1px solid red;
}
.modal-lg{
max-width: 1000px !important;
}

#upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed #0B0E34;
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #0B0E34;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}
</style>
@endpush
