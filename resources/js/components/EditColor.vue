<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Color</div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control"
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.name,
                                                this.color.name
                                            ),
                                        }"
                                    name="" id="" v-model="color.name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control"
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.price,
                                                this.color.price
                                            ),
                                        }"
                                    name="" id="" v-model="color.price">
                                </div>
                            </div>
                        </div>
                        Drag and Drop Here
                        <vue-dropzone ref="myVueDropzone"  id="customdropzone"
                        :options="dropzoneOptions"
                        :include-styling="false"
                        v-on:vdropzone-thumbnail="thumbnail"
                        v-on:vdropzone-removed-file="removeThisFile"></vue-dropzone>
                    </div>
                    <div class="card-footer">
                    <button type="submit" to="list_texture"  @click="edit_store_style" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {

    // register globally
    props:[

        "link","styleID"

    ],
    name:"EditStyle.vue",
     components: {
        vueDropzone: vue2Dropzone
      },
      data: function () {

        return {

            uploadCount:0,
            removeCount:0,

            testimg:[],
            url1:null,
            url2:null,
            url3:null,
            url4:null,
            url5:null,
            url6:null,
            url7:null,
            url8:null,
            url9:null,
            url10:null,

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
            price: false
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
                    sessionStorage.setItem('filess', file);
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

        // forrequirephoto: function (data, model) {
        //     if (data == true && model < 3) {
        //         return true;
        //     }
        // },
        // when click submit button
        edit_store_style(){
            console.log(this.$refs.myVueDropzone.getQueuedFiles());
            const config = {

        headers: { 'content-type': 'multipart/form-data' }

        }
            let formData = new FormData();
                // formData.append('file', this.texture.files);
                formData.append('price', this.color.name);
                formData.append('price', this.color.price);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });

            axios.post('/store_style',formData,config)
            .then(function (response){
                alert("access");
                window.location.reload();
            })
            .catch(function (error){

                // alert("wrong");
            })
        },
        edit_store_style()

        {   
            this.uploadCount = this.$refs.myVueDropzone.getQueuedFiles().length;
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

            // if (this.$refs.myVueDropzone.getAcceptedFiles().length < 1) {
            //     this.requireerroryk.photoerror = true;
            //     this.texture.photoerror =
            //         this.$refs.myVueDropzone.getAcceptedFiles().length;
            //     tmperrorcounts += 1;
            // } else {this.requireerroryk.photoerror = false;}

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
                // if(this.requireerroryk.photoerror) {
                //   alertText[i] = "need to add the photo";
                //   i++;
                // }

                alert(alertText.join("\n\n"));
            }
            // console.log(this.$refs.myVueDropzone.getQueuedFiles());
            // console.log(this.$refs.myVueDropzone.getQueuedFiles(0).File.upload.name);

            let formData = new FormData();
                // formData.append('file', this.texture.files);
                formData.append('color_id', this.link);

                formData.append('photo1', this.url1);
                formData.append('photo2', this.url2);
                formData.append('photo3', this.url3);
                formData.append('photo4', this.url4);

                formData.append('photo5', this.url5);
                formData.append('photo6', this.url6);
                formData.append('photo7', this.url7);
                formData.append('photo8', this.url8);
                formData.append('photo9', this.url9);
                formData.append('photo10', this.url10);
                formData.append('remove_count', this.removeCount);
                formData.append('upload_count', this.uploadCount);  
                formData.append('name', this.color.name);
                formData.append('price', this.color.price);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            axios.post('/store_edit_color',formData,config)

            .then(function (response){
                // alert("item is successfully updated");
                swal({
                    title: "Your Item was updated successfully!",
                    text: "",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.history.back();
                });
               
            })
            .catch(function (error){

                // alert("wrong");
                console.log(error);
            })
        },

        removeThisFile (file) {

            this.removeCount ++;

            let FileName = file.name // (I think here is the problem )
            console.log(FileName);
            // alert(FileName);
            if(FileName == "Photo One")
            {
                this.url1 = null
                // alert("one");
            }
            else if(FileName == "Photo Two")
            {
                this.url2 = null
            }
            else if(FileName == "Photo Three")
            {
                this.url3 = null
            }
            else if(FileName == "Photo Four")
            {
                this.url4 = null
            }

            else if(FileName == "Photo Five")
            {
                this.url5 = null
            }
            else if(FileName == "Photo six")
            {
                this.url6 = null
            }

            else if(FileName == "Photo seven")
            {
                this.url7 = null
            }
            else if(FileName == "Photo eight")
            {
                this.url8 = null
            }
            else if(FileName == "Photo nine")
            {
                this.url9 = null
            }
            else if(FileName == "Photo ten")
            {
                this.url10 = null
            }



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
        console.log(this.link);
        let colorID = {
            'id' : this.link
        }
        axios.post('/get_edit_color',colorID)
        .then( (response) => {
            // alert("access");
            console.log(response.data.colors.color);
            this.color.name = response.data.colors.name
            this.color.price = response.data.colors.price
            // window.location.reload();
            if(response.data.colors.photo_one != null)
              {
                var file1 = { size: 123, name: "Photo One", type: "image/png" };
                this.url1 = "/assets/images/categories/color/"+response.data.colors.photo_one;
                this.$refs.myVueDropzone.manuallyAddFile(file1, this.url1);
              }

                if(response.data.colors.photo_two != null)
              {
              var file2 = { size: 123, name: "Photo Two", type: "image/png" };
              this.url2 = "/assets/images/categories/color/"+response.data.colors.photo_two;
              this.$refs.myVueDropzone.manuallyAddFile(file2, this.url2);
              }
              if(response.data.colors.photo_three != null)
              {
              var file3 = { size: 123, name: "Photo Three", type: "image/png" };
              this.url3 = "/assets/images/categories/color/"+response.data.colors.photo_three;
              this.$refs.myVueDropzone.manuallyAddFile(file3, this.url3);
              }
              if(response.data.colors.photo_four != null)
              {
              var file4 = { size: 123, name: "Photo Four", type: "image/png" };
              this.url4 = "/assets/images/categories/color/"+response.data.colors.photo_four;
              this.$refs.myVueDropzone.manuallyAddFile(file4, this.url4);
              }
              if(response.data.colors.photo_five != null)
              {
                var file5 = { size: 123, name: "Photo Five", type: "image/png" };
                  this.url5 = "/assets/images/categories/color/"+response.data.colors.photo_five;
                  this.$refs.myVueDropzone.manuallyAddFile(file5, this.url5);
              }

              if(response.data.colors.photo_six != null)
              {
              var file6 = { size: 123, name: "Photo Six", type: "image/png" };
              this.url6 = "/assets/images/categories/color/"+response.data.colors.photo_six;
              this.$refs.myVueDropzone.manuallyAddFile(file6, this.url6);
              }

              if(response.data.colors.photo_seven != null)
              {
              var file7 = { size: 123, name: "Photo seven", type: "image/png" };
              this.url7 = "/assets/images/categories/color/"+response.data.colors.photo_seven;
              this.$refs.myVueDropzone.manuallyAddFile(file7, this.url7);
              }
              if(response.data.colors.photo_eight != null)
              {
              var file8 = { size: 123, name: "Photo eight", type: "image/png" };
              this.url8 = "/assets/images/categories/color/"+response.data.colors.photo_eight;
              this.$refs.myVueDropzone.manuallyAddFile(file8, this.url8);
              }
              if(response.data.colors.photo_nine != null)
              {
              var file9 = { size: 123, name: "Photo nine", type: "image/png" };
              this.url9 = "/assets/images/categories/color/"+response.data.colors.photo_nine;
              this.$refs.myVueDropzone.manuallyAddFile(file9, this.url9);
              }
              if(response.data.colors.photo_ten != null)
              {
              var file10 = { size: 123, name: "Photo ten", type: "image/png" };
              this.url10 = "/assets/images/categories/color/"+response.data.colors.photo_ten;
              this.$refs.myVueDropzone.manuallyAddFile(file10, this.url10);
              }
        })
        .catch(function (error){
            console.log(error);
            // alert("wrong");

        })
        console.log('Component mounted.')
    },

    // after send
    successEvent(files, response) {
    console.log(response);

    if (response.msg == "success") {
    window.location.assign(
        this.$hostname + "formSubmit" + response.id
    );
    } else {
    alert(response.error_msg);
    if (window.confirm("Do u want to continue?")) {
        location.assign(window.location.href);
    } else {
        location.assign(window.location.href);
    }
    }
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
    background-repeat: no-repeat !important;
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
