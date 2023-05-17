<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Image</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" v-model="color.name" class="form-control"
                            v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.name,
                                                this.color.name
                                            ),
                                        }"
                            placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" v-model="color.price" class="form-control"
                            v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.price,
                                                this.color.price
                                            ),
                                        }"
                            placeholder="Enter price">
                        </div>
                        Drag and Drop Here
                        <vue-dropzone ref="myVueDropzone"  id="customdropzone"
                         :options="dropzoneOptions"
                         :include-styling="false"
                         v-on:vdropzone-thumbnail="thumbnail"
                         v-on:vdropzone-removed-file="
                                        removefilefromdz
                                    "
                         ></vue-dropzone>
                    </div>
                    <div class="card-footer">
                    <button type="submit"  @click="submitform" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';


    export default {

    // register globally
    props:[
        "link",
    ],
    name:"CreateTexture.vue",
     components: {
        vueDropzone: vue2Dropzone
      },
      data: function () {

        return {

            color:{
            files:[],
            name:"",
            price:""
        },
        name:"",
        price:"",
            //forerror
            requireerroryk: {
                name: false,
                price: false,
                photoerror: false
            },
            //forerror
          dropzoneOptions: {
              url: this.link,
              thumbnailWidth: 200,
              previewTemplate: this.template(),
              minFiles:1,
              maxFiles: 10,
              method: "POST",
              renameFilename: function (file) {
                    let newname = Date.now() + "_" + file;
                    return newname;
                },
                autoDiscover: false,
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 100,
                timeout: 300000,

                maxFilesize: 2097152000000, //20mb
              headers: {
                "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                // "My-Awesome-Header": "header value",
               }
          }
        }
      },

      methods: {
        forrequire: function (data, model) {
            if (data == true && (model == "" || model == 0)) {
                return true;
            }
        },

        forrequirephoto: function (data, model) {
            if (data == true && model < 3) {
                return true;
            }
        },
        // when click submit button
        submitform(){
            let tmperrorcounts = 0;
            console.log(this.color.name);
            // check all input field has value
            if (this.color.name == "") {
                this.requireerroryk.name = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.name = false;
            }

            if (this.color.price == "") {
                this.requireerroryk.price = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.price = false;}

            //if input field has no error continue to check min 3 file need to upload

            if (this.$refs.myVueDropzone.getAcceptedFiles().length < 1) {
                this.requireerroryk.photoerror = true;
                this.photoerror =
                    this.$refs.myVueDropzone.getAcceptedFiles().length;
                tmperrorcounts += 1;
            } else {this.requireerroryk.photoerror = false;}

            if (tmperrorcounts == 0) {
                // start dz process queue
                // this.$refs.myVueDropzone.processQueue();
                // this.texture.submittedLoading = 1;
            } else{
                var alertText = new Array();
                var i = 0;

                if(this.requireerroryk.name) {
                  alertText[i] = "need to fill the name";
                  i++;
                }
                if(this.requireerroryk.price) {
                  alertText[i] = "need to fill the price";
                  i++;
                }
                if(this.requireerroryk.photoerror) {
                  alertText[i] = "need to add the photo";
                  i++;
                }

                alert(alertText.join("\n\n"));
            }
            console.log(this.$refs.myVueDropzone.getQueuedFiles());
            const config = {

            headers: { 'content-type': 'multipart/form-data' }

            }
            let formData = new FormData();
                // formData.append('file', this.fit_suit.files);
                formData.append('name', this.color.name);
                formData.append('price', this.color.price);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });

            axios.post('create_color',formData,config)
            .then(function (response){
                // alert("item is successfully uploaded");
                swal({
                    title: "Your Item was uploaded successfully!",
                    text: "",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.location = "list_color";
                });
                // window.location = 'list_color'
            })
            .catch(function (error){
                console.log("wrong");
            })
        },

        removefilefromdz: function (file, error, xhr) {
            //remove thumbs photo and mid photo

            const tkey = this.thumb_photos.findIndex(
                (tp) => tp.name === file.upload.filename
            );
            this.thumb_photos.splice(tkey, 1);
            //mid
            const mkey = this.mid_photos.findIndex(
                (mp) => mp.name === file.upload.filename
            );
            this.mid_photos.splice(mkey, 1);
            //remove thumbs photo and mid photo
            console.log(this.thumb_photos);

            //for default message

            if (
                this.$refs.myVueDropzone.getAcceptedFiles().length < 3 &&
                $(".dz-message").hasClass("d-none")
            ) {
                $(".dz-message").removeClass("d-none");
            }
            //for default message

            //if tempphotoname has delete image name
            var get_file_key = 0;

            get_file_key = this.tempphotonames.findIndex(
                (re) => re === file.upload.filename
            );
            //check other photo has set default icon
            if (this.checkhasdefaultimage()) {
                //only delete from deleted photo name from temphotoname array
            } else {
                //if dz-profile-pic class length not equal to 1
                if (
                    document.getElementsByClassName("dz-profile-pic").length !=
                    1
                ) {
                    if (
                        document.getElementsByClassName("dz-profile-pic")
                            .length == 0
                    ) {
                        //if dz-profile-pic class is empty
                        //set empty array to tempphotonames

                        this.tempphotonames = [];
                    } else {
                        //when user delete top photo
                        if (get_file_key == 0) {
                            this.setdefaultphoto(this.tempphotonames[1]);
                        } else {
                            //remove deleted image name from tempphotonames array

                            //show default icon on image before deleted image
                            if (get_file_key !== 0) {
                                this.setdefaultphoto(
                                    this.tempphotonames[get_file_key - 1]
                                );
                            } else {
                                this.setdefaultphoto(
                                    this.tempphotonames[get_file_key + 1]
                                );
                            }
                        }

                        //if images has grater than one
                    }
                } else {
                    //if one only image is remain just set default photo for it
                    this.setdefaultphoto(
                        document.getElementsByClassName("dz-profile-pic")[0].id
                    );

                    console.log("sec");
                }
            }
            this.tempphotonames.splice(get_file_key, 1);

            //to get image before deleted image
        },

        template: function () {
        return `<div class="dz-preview dz-file-preview">
                <div class="dz-image">
                    <div data-dz-thumbnail-bg></div>
                </div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size></span></div>
                    <div class="dz-filename"><span data-dz-name></span></div>
                </div>
                <a class="dz-profile-pic yk-opa" yk-dz-default-pic style="display:none;"><span class="fas fa-check-circle"></span></a>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                <div class="dz-success-mark"><i class="fa fa-check"></i></div>
                <div class="dz-remove yk-opa" href="javascript:undefined;" data-dz-remove><span class="fas fa-times-circle"></span></div>
            </div>
        `;
        },

        thumbnail: function(file, dataUrl) {
        var j, len, ref, thumbnailElement;
        if (file.previewElement) {
            file.previewElement.classList.remove("dz-file-preview");
            ref = file.previewElement.querySelectorAll("[data-dz-thumbnail-bg]");
            for (j = 0, len = ref.length; j < len; j++) {
                thumbnailElement = ref[j];
                thumbnailElement.alt = file.name;
                thumbnailElement.style.backgroundImage = 'url("' + dataUrl + '")';
            }
            return setTimeout(((function(_this) {
                return function() {
                    return file.previewElement.classList.add("dz-image-preview");
                };
            })(this)), 1);
        }
        }

      },
        mounted() {

            console.log('Component mounted.')
        },


        computed: {},
    }
</script>
<style>



/* .dz-progress {
    display: none;
}

.dz-error-message {
    display: none;
} */

#customdropzone {
    border: 2px solid #007bff8c;
    /* font-family: "Arial", sans-serif; */
    letter-spacing: 0.2px;
    color: #777;
    transition: background-color 0.2s linear;
    height: auto;
    min-height: 222px;
    display: flex;
    flex-wrap: wrap;
    border-style: dashed;
    padding: 10px;
    width: 100%;
}

  #customdropzone .dz-preview {
    width: 160px;
    display: inline-block
  }
  #customdropzone .dz-preview .dz-image {
    width: 115px !important;
    height: 115px !important;
    margin-bottom: 14px;
}
  #customdropzone .dz-preview .dz-image > div {
    width: inherit;
    height: inherit;
    border-radius: 0% !important;
    background-size: contain;
  }
  #customdropzone .dz-preview .dz-image > img {
    width: 100%;
  }

   #customdropzone .dz-preview .dz-details {
    color: white;
    transition: opacity .2s linear;
    text-align: center;
  }
  #customdropzone .dz-success-mark, .dz-error-mark {
    display: none;
  }

  .dz-remove {
    position: absolute !important;
    margin-left: 83px !important;
    color: #ff6643 !important;
    margin-top: -177px;
    border: none !important;
    font-size: 23px;
}

</style>

<!-- <style src="vue-multiselect/dist/vue-multiselect.min.css"></style> -->

