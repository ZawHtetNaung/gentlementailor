<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Image</div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Texture</label>

                                    <select class="form-control"

                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.texture_id,
                                                this.fit_suit.texture_id
                                            ),
                                        }"
                                    v-model="fit_suit.texture_id" name="btn_text">
                                        <option selected hidden>Choose Texture</option>
                                        <option v-for="(texture,index) in textures" :key="index" :value="texture.id">{{texture.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Choose Style</label>

                                    <select class="form-control"

                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.style_id,
                                                this.fit_suit.style_id
                                            ),
                                        }"
                                    v-model="fit_suit.style_id" name="btn_text">
                                        <option selected hidden>Choose Style</option>
                                        <option v-for="(style,index) in styles" :key="index" :value="style.id">{{style.name}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Choose Color</label>

                                    <select class="form-control"

                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.color,
                                                this.fit_suit.color
                                            ),
                                        }"
                                    v-model="fit_suit.color" name="btn_text">
                                        <option selected hidden>Choose Color</option>


                                        <option v-for="(color,index) in colors" :key="index" :value="color.id">{{color.name}}</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Choose Size</label>
                                    <select class="form-control"
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.size,
                                                this.fit_suit.size
                                            ),

                                        }"

                                    v-model="fit_suit.size" name="btn_text">
                                        <option selected hidden>Choose Size</option>
                                        <option v-for="(size,index) in sizes" :key="index" :value="size.id">{{size.name}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Price</label>

                                    <input type="number" class="form-control"

                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.price,
                                                this.fit_suit.price
                                            ),
                                        }"
                                    name="" id="" v-model="fit_suit.price">
                                </div>
                            </div>
                        </div>

                        <label style="font-size: 15px" class="text-danger"
                            >Upload Min One Photo<br/>(MinWidth:400px to MaxWidth:800px and MinHeight:500px to MaxHeight:900px)</label
                        >


                        <vue-dropzone ref="myVueDropzone"  id="customdropzone"

                        :options="dropzoneOptions"
                        :include-styling="false"
                         v-on:vdropzone-thumbnail="thumbnail"
                        ></vue-dropzone>
                    </div>
                    <div class="card-footer">
                    <button type="submit"  @click="store_fit_suit" class="btn btn-primary">Submit</button>
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
        "link",
    ],
    name:"CreateFitSuit.vue",
     components: {
        vueDropzone: vue2Dropzone
      },
      data: function () {

        return {
            sizes:{},
            colors:{},
            style:{},
            textures:{},
            fit_suit:{
            files:[],
            texture_id:"",
            style_id:"",
            color:"",
            size:"",
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
              autoProcessQueue: false,

              minFiles:1,
              maxFiles: 10,

              method: "POST",
              renameFilename: function (file) {
                    let newname = Date.now() + "_" + file;
                    return newname;
                    sessionStorage.setItem('filess', file);
                },
              dictDefaultMessage: "<i class='fa fa-cloud-upload'></i>UPLOAD ME",
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
        store_fit_suit(){
            let tmperrorcounts = 0;
            // console.log(this.color.name);
            // check all input field has value
            if (this.fit_suit.texture_id == "") {
                this.requireerroryk.texture_id = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.texture_id = false;
            }

            if (this.fit_suit.style_id == "") {
                this.requireerroryk.style_id = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.style_id = false;}

            if (this.fit_suit.color == "") {
                this.requireerroryk.color = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.color = false;}

            if (this.fit_suit.size == "") {
                this.requireerroryk.size = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.size = false;}

            if (this.fit_suit.price == "") {
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

                if(this.requireerroryk.texture_id) {
                  alertText[i] = "need to select the texture";
                  i++;
                }
                if(this.requireerroryk.style_id) {
                  alertText[i] = "need to select the style";
                  i++;
                }
                if(this.requireerroryk.color) {
                  alertText[i] = "need to select the color";
                  i++;
                }
                if(this.requireerroryk.size) {
                  alertText[i] = "need to select the size";
                  i++;
                }
                if(this.requireerroryk.price) {
                  alertText[i] = "need to select the price";
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
                formData.append('price', this.fit_suit.price);
                formData.append('style', this.fit_suit.style_id);
                formData.append('color', this.fit_suit.color);
                formData.append('size', this.fit_suit.size);
                formData.append('texture', this.fit_suit.texture_id);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });
            let sizeStatus = false;
            var alertSize = new Array();
            var i = 0;
            this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
            // alert(file.upload.filename);
            if(file.height > 900 || file.height < 500 && file.width > 800 || file.width < 400)
            {
                alertSize[i] = file.upload.filename+" is not match with width min - 400 to max - 800 and height min - 500 to max - 900";

                // alert(file.upload.filename+" is not match 525*295");
                i++;
                sizeStatus = false;
            }
            else if(file.width > 800 || file.width < 400)
            {
              alertSize[i] = file.upload.filename+" is not match width min - 400 to max - 800";
              i++;
                // alert(file.upload.filename+" is not match width 525");
                sizeStatus = false;
            }
            else if(file.height > 900 || file.height < 500)
            {
              alertSize[i] = file.upload.filename+" is not match height min - 500 to max - 900";
              i++;
                // alert(file.upload.filename+" is not match height 295");
                sizeStatus = false;
            }
            else if(file.height <= 900 || file.height >= 500 && file.width <= 800 || file.width >= 400)
            {
                 sizeStatus = true;
            }
            });
            // alert(sizeStatus);
            if(sizeStatus == false)
            {
              alert(alertSize);

            }
            if(sizeStatus == true)
            {
            axios.post('/store_fit_suit',formData,config)
            .then(function (response){
                swal({
                    title: "Your Item was uploaded successfully!",
                    text: "",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.location = 'show_fit_suit_list'
                });

            })
            .catch(function (error){
                console.log("wrong");
            })
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
        },
        getTexture(){
            axios.get('/get_texture')
            .then((response) => {
                console.log(response.data.textures);
                this.textures = response.data.textures;
            })
            .catch(function (error){
                console.log("wrong");
            })
        },
        getStyle(){
            axios.get('/get_style')
            .then((response) => {
                console.log(response.data.styles);
                this.styles = response.data.styles;
            })
            .catch(function (error){
                console.log("wrong");
            })
        },
        getColor(){
            axios.get('/get_color')
            .then((response) => {
                console.log(response.data.colors);
                this.colors = response.data.colors;
            })
            .catch(function (error){
                console.log("wrong");
            })
        },
        getSize(){
            axios.get('/get_size')
            .then((response) => {
                console.log(response.data.sizes);
                this.sizes = response.data.sizes;
            })
            .catch(function (error){
                console.log("wrong");
            })
        },
      },
        mounted() {
            this.getTexture();
            this.getStyle();
            this.getColor();
            this.getSize();
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
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
</style>
