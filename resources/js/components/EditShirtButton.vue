<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" 
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.customize_cate_id,
                                                this.shirt_button.customize_cate_id
                                            ),
                                        }"
                                    v-model="shirt_button.customize_cate_id" name="texture">
                                        <option v-for="(customize_cate,index) in customize_cates" :key="index" :value="customize_cate.name">{{customize_cate.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Description</label>

                                       <textarea type="text" class="form-control" 
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.description,
                                                this.shirt_button.description
                                            ),
                                        }"
                                    name="" id="" v-model="shirt_button.description">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Price</label>

                                    <input type="text" class="form-control" 
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.price,
                                                this.shirt_button.price
                                            ),
                                        }"
                                    name="" id="" v-model="shirt_button.price">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Choose Style</label>

                                    <select class="form-control"
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.style_id,
                                                this.shirt_button.style_id
                                            ),
                                        }"
                                    v-model="shirt_button.style_id" name="btn_text">
                                        <option selected hidden>VEST LAPEL</option>
                                        <option value="JACKET STYLE">PIPING & STITCHING</option>
                                        <option value="STYLE OF LAPELS">VEST STYLE & BUTTONS</option>
                                        <option value="LAPEL BUTTON HOLE">BOTTON STYLE</option>
                                        <option value="LAPEL STITCHING">BELOW POCKET</option>
                                        <option value="BELOW POCKET">CHEST POCKET</option>
                                        <option value="TICKET POCKETS">BACK FABRIC</option>
                                        <option value="SLEEVE BUTTONS">BACK ADJUSTER</option>

                                        <!-- <option v-for="(style,index) in styles" :key="index" :value="style.name">{{style.name}}</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Choose Lapel</label>

                                    <select class="form-control" 
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.vest_lapel_id,
                                                this.shirt_button.vest_lapel_id
                                            ),
                                        }"
                                    v-model="shirt_button.vest_lapel_id" name="btn_text">
                                        <option selected hidden>Choose Lapel</option>
                                        <option v-for="(vest_lapel,index) in vest_lapels" :key="index" :value="vest_lapel.name">{{vest_lapel.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        Drag and Drop Here
                        <div
                            v-bind:class="{
                                'color-danger': forrequirephoto(
                                    this.requireerroryk.photoerror,
                                    this.shirt_button.photoerror
                                ),
                            }"
                        >
                        <!-- <label style="font-size: 15px" class="text-danger"
                                >Upload Min One Photo(MinWidth:400px to MaxWidth:800px and MinHeight:500px to MaxHeight:900px)</label
                            > -->
                        </div>
                        <vue-dropzone ref="myVueDropzone"  id="customdropzone"
                        :options="dropzoneOptions"
                        :include-styling="false"
                         v-on:vdropzone-thumbnail="thumbnail"

                        v-on:vdropzone-removed-file="removeThisFile"></vue-dropzone>
                    </div>
                    <div class="card-footer">
                    <button type="submit"  @click="edit_store_shirt_button" class="btn btn-primary">Submit</button>
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

        "link","shirt_buttonID"

    ],
    name:"EditShirtButton.vue",
     components: {
        vueDropzone: vue2Dropzone
      },
      data: function () {

        return {
            uploadCount:0,
            removeCount:0,
            colors:{},
            style:{},
            vest_lapels:{},
            customize_cates:{},
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

            shirt_button:{
            files:[],
            color:"",
            style_id:"",
            vest_lapel_id:"",
            customize_cate_id:"",
            description:"",
            price:"",
        },
        name:"",
                //forerror
        requireerroryk: {
            color:false,
            style_id:false,
            vest_lapel_id:false,
            customize_cate_id:false,
            name: false,
            description: false,
            price: false,
            photoerror: false
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
        edit_store_shirt_button(){
            console.log(this.$refs.myVueDropzone.getQueuedFiles());
            const config = {

headers: { 'content-type': 'multipart/form-data' }

}
            let formData = new FormData();
                // formData.append('file', this.fit_suit.files);
                formData.append('description', this.shirt_button.description);
                formData.append('price', this.shirt_button.price);
                // formData.append('color', this.shirt_button.color);
                formData.append('style', this.shirt_button.style_id);
                formData.append('color', this.shirt_button.vest_lapel_id);
                formData.append('type', this.shirt_button.customize_cate_id);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });

            axios.post('/store_shirt_button',formData,config)
            .then(function (response){
                alert("access");
                window.location.reload();
            })
            .catch(function (error){

                // alert("wrong");
            })
        },
        edit_store_shirt_button()

        {   
            this.uploadCount = this.$refs.myVueDropzone.getQueuedFiles().length;
            let tmperrorcounts = 0;
            // console.log(this.color.name);
            // check all input field has value

            if (this.shirt_button.color == "") {
                this.requireerroryk.color = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.color = false;}

            if (this.shirt_button.style_id == "") {
                this.requireerroryk.style_id = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.style_id = false;}

            if (this.shirt_button.vest_lapel_id == "") {
                this.requireerroryk.vest_lapel_id = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.vest_lapel_id = false;}

            if (this.shirt_button.customize_cate_id == "") {
                this.requireerroryk.customize_cate_id = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.customize_cate_id = false;}

            if (this.shirt_button.description == "") {
                this.requireerroryk.description = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.description = false;}

            if (this.shirt_button.price == "") {
                this.requireerroryk.price = true;
                tmperrorcounts += 1;
            } else {this.requireerroryk.price = false;}



            //if input field has no error continue to check min 3 file need to upload

            // if (this.$refs.myVueDropzone.getAcceptedFiles().length < 1) {
            //     this.requireerroryk.photoerror = true;
            //     this.photoerror =
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

                if(this.requireerroryk.vest_lapel_id) {
                  alertText[i] = "need to select the color";
                  i++;
                }
                if(this.requireerroryk.style_id) {
                  alertText[i] = "need to select the style";
                  i++;
                }
                if(this.requireerroryk.customize_cate_id) {
                  alertText[i] = "need to select the type";
                  i++;
                }
                if(this.requireerroryk.vest_lapel_id) {
                  alertText[i] = "need to select the vest lapel";
                  i++;
                }
                if(this.requireerroryk.description) {
                  alertText[i] = "need to fill the description";
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
                // if(this.requireerroryk.photoerror) {
                //   alertText[i] = "need to add the photo";
                //   i++;
                // }

                alert(alertText.join("\n\n"));
            }
            // console.log(this.$refs.myVueDropzone.getQueuedFiles());
            // console.log(this.$refs.myVueDropzone.getQueuedFiles(0).File.upload.name);

            let formData = new FormData();
                // formData.append('file', this.fit_suit.files);
                formData.append('shirt_button_id', this.link);

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
                 // formData.append('file', this.fit_suit.files);
                 formData.append('description', this.shirt_button.description);
                formData.append('price', this.shirt_button.price);
                // formData.append('color', this.shirt_button.color);
                formData.append('style', this.shirt_button.style_id);
                formData.append('color', this.shirt_button.vest_lapel_id);
                formData.append('type', this.shirt_button.customize_cate_id);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            // let sizeStatus = false;
            // var alertSize = new Array();
            // var i = 0;
            // this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
            // // alert(file.upload.filename);
            // if(file.height > 900 || file.height < 500 && file.width > 800 || file.width < 400)
            // {
            //     alertSize[i] = file.upload.filename+" is not match with width min - 400 to max - 800 and height min - 500 to max - 900";

            //     // alert(file.upload.filename+" is not match 525*295");
            //     i++;
            //     sizeStatus = false;
            // }
            // else if(file.width > 800 || file.width < 400)
            // {
            //   alertSize[i] = file.upload.filename+" is not match width min - 400 to max - 800";
            //   i++;
            //     // alert(file.upload.filename+" is not match width 525");
            //     sizeStatus = false;
            // }
            // else if(file.height > 900 || file.height < 500)
            // {
            //   alertSize[i] = file.upload.filename+" is not match height min - 500 to max - 900";
            //   i++;
            //     // alert(file.upload.filename+" is not match height 295");
            //     sizeStatus = false;
            // }
            // else if(file.height <= 900 || file.height >= 500 && file.width <= 800 || file.width >= 400)
            // {
            //      sizeStatus = true;
            // }
            // });
            //  // alert(sizeStatus);
            //  if(sizeStatus == false)
            // {
            // //   alert(alertSize);

            // }

            // if(sizeStatus == true)
            // {
            axios.post('/store_edit_shirt_button',formData,config)

            .then(function (response){
                // alert("your item was successfully updated");
                swal({
                    title: "Your Item was updated successfully!",
                    text: "",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.history.back();
                    // location.reload(true);
                    sessionStorage.setItem('reload_additional_list',1);
                });

                

            })
            .catch(function (error){

                // alert("wrong");
                console.log(error);
            })
        // }
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
        },
        getTexture(){
            axios.get('/get_texture')
            .then((response) => {
                console.log(response.data.textures);
                this.textures = response.data.textures;
            })
            .catch(function (error){
                alert("wrong");
            })
        },
        getStyle(){
            axios.get('/get_style')
            .then((response) => {
                console.log(response.data.styles);
                this.styles = response.data.styles;
            })
            .catch(function (error){
                alert("wrong");
            })
        },
        getColor(){
            axios.get('/get_color')
            .then((response) => {
                console.log(response.data.colors);
                this.colors = response.data.colors;
            })
            .catch(function (error){
                alert("wrong");
            })
        },
        getVest_lapel(){
            axios.get('/get_vest_lapel_ajax')
            .then((response) => {
                console.log(response.data);
                this.vest_lapels = response.data.vest_lapels;
            })
            .catch(function (error){
                alert("wrong");
            })
        },
        getCustomize_cate(){
            axios.get('/get_customize_cate')
            .then((response) => {
                console.log(response.data.customize_cates);
                this.customize_cates = response.data.customize_cates;
            })
            .catch(function (error){
                alert("wrong");
            })
        },

      },
        mounted() {
            this.getTexture();
            this.getStyle();
            this.getColor();
            this.getVest_lapel();
            this.getCustomize_cate();
            console.log(this.link);
            let shirt_buttonID = {
                'id' : this.link
            }
            axios.post('/get_edit_shirt_button',shirt_buttonID)
            .then( (response) => {
                // alert("access");
                console.log(response.data.shirt_buttons.shirt_button);
                this.shirt_button.description = response.data.shirt_buttons.description
                this.shirt_button.price = response.data.shirt_buttons.price
                this.shirt_button.style_id = response.data.shirt_buttons.style
                this.shirt_button.vest_lapel_id = response.data.shirt_buttons.color
                this.shirt_button.customize_cate_id = response.data.shirt_buttons.type

                
                // window.location.reload();
                if(response.data.shirt_buttons.photo_one != null)
                  {
                  var file1 = { size: 123, name: "Photo One", type: "image/png" };
                  this.url1 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_one;
                  this.$refs.myVueDropzone.manuallyAddFile(file1, this.url1);
                  }

                  if(response.data.shirt_buttons.photo_two != null)
                  {
                  var file2 = { size: 123, name: "Photo Two", type: "image/png" };
                  this.url2 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_two;
                  this.$refs.myVueDropzone.manuallyAddFile(file2, this.url2);
                  }

                  if(response.data.shirt_buttons.photo_three != null)
                  {
                  var file3 = { size: 123, name: "Photo Three", type: "image/png" };
                  this.url3 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_three;
                  this.$refs.myVueDropzone.manuallyAddFile(file3, this.url3);
                  }

                  if(response.data.shirt_buttons.photo_four != null)
                  {
                  var file4 = { size: 123, name: "Photo Four", type: "image/png" };
                  this.url4 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_four;
                  this.$refs.myVueDropzone.manuallyAddFile(file4, this.url4);
                  }

                  if(response.data.shirt_buttons.photo_five != null)
                  {
                  var file5 = { size: 123, name: "Photo Five", type: "image/png" };
                  this.url5 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_five;
                  this.$refs.myVueDropzone.manuallyAddFile(file5, this.url5);
                  }
                  if(response.data.shirt_buttons.photo_six != null)
                  {
                  var file6 = { size: 123, name: "Photo Six", type: "image/png" };
                  this.url6 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_six;
                  this.$refs.myVueDropzone.manuallyAddFile(file6, this.url6);
                  }
                  if(response.data.shirt_buttons.photo_seven != null)
                  {
                  var file7 = { size: 123, name: "Photo Seven", type: "image/png" };
                  this.url7 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_seven;
                  this.$refs.myVueDropzone.manuallyAddFile(file7, this.url7);
                  }
                  if(response.data.shirt_buttons.photo_eight != null)
                  {
                  var file8 = { size: 123, name: "Photo Eight", type: "image/png" };
                  this.url8 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_eight;
                  this.$refs.myVueDropzone.manuallyAddFile(file8, this.url8);
                  }
                  if(response.data.shirt_buttons.photo_nine != null)
                  {
                  var file9 = { size: 123, name: "Photo Nine", type: "image/png" };
                  this.url9 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_nine;
                  this.$refs.myVueDropzone.manuallyAddFile(file9, this.url9);
                  }
                  if(response.data.shirt_buttons.photo_ten != null)
                  { 
                  var file10 = { size: 123, name: "Photo Ten", type: "image/png" };
                  this.url10 = "/assets/images/customize/shirt_button/"+response.data.shirt_buttons.photo_ten;
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
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

</style>

