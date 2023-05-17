<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Grand Texture</div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Category</label>

                                    <select class="form-control"
                                    @change="getMainTextureSub"
                                    v-bind:class="{
                                        'border-danger': forrequire(
                                            this.requireerroryk.main_id,
                                            this.texture.main_id
                                        ),
                                    }"
                                    v-model="texture.main_id" name="btn_text">
                                        <option selected hidden>Choose Category</option>
                                        <option v-for="(main,index) in main_textures" :key="index" :value="main.id">{{main.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>SubCategory</label>

                                    <select class="form-control"
                                    @change="getPatternFormSub"
                                    v-bind:class="{
                                        'border-danger': forrequire(
                                            this.requireerroryk.sub_id,
                                            this.texture.sub_id
                                        ),
                                    }"
                                    :disabled="sub_disabled"
                                    v-model="texture.sub_id" name="btn_text">
                                        <option selected hidden>Choose SubCategory</option>
                                        <option v-for="(sub,index) in subcategories" :key="index" :value="sub.id">{{sub.name}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Pattern</label>
                                    <select class="form-control"

                                    v-bind:class="{
                                        'border-danger': forrequire(
                                            this.requireerroryk.pattern_id,
                                            this.texture.pattern_id
                                        ),
                                    }"
                                    :disabled="pattern_disabled"
                                    v-model="texture.pattern_id" name="btn_text">
                                        <option selected hidden>Choose Pattern</option>
                                        <option v-for="(pattern,index) in patterns" :key="index" :value="pattern.id">{{pattern.name}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Package</label>
                                    {{texture.package}}
                                    <select class="form-control"

                                    v-bind:class="{
                                        'border-danger': forrequire(
                                            this.requireerroryk.package,
                                            this.texture.package
                                        ),
                                    }"
                                    v-model="texture.package" name="btn_text">
                                        <option selected hidden>Choose Package</option>
                                        <option v-for="(pack,index) in packages" :key="index" :value="pack.id">{{pack.title}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>

                                    <input type="text" class="form-control"

                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.name,
                                                this.texture.name
                                            ),
                                        }"
                                    name="" id="" v-model="texture.name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control"
                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.price,
                                                this.texture.price
                                            ),

                                        }"

                                    name="" id="" v-model="texture.price">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Made In</label>
                                    <input type="text" v-model="texture.made_in" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.made_in,
                                                        this.texture.made_in
                                                    ),
                                                }"
                                    placeholder="Enter Made In">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Composition</label>
                                    <input type="text" v-model="texture.composition" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.composition,
                                                        this.texture.composition
                                                    ),
                                                }"
                                    placeholder="Enter Made In">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Softness</label>
                                    <input type="text" v-model="texture.softness" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.softness,
                                                        this.texture.softness
                                                    ),
                                                }"
                                    placeholder="Enter Made In">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Color</label>
                                    <select class="form-control"

                                    v-bind:class="{
                                            'border-danger': forrequire(
                                                this.requireerroryk.color,
                                                this.texture.color
                                            ),
                                        }"
                                    v-model="texture.color" name="btn_text">
                                        <option selected hidden>Choose Color</option>


                                        <option v-for="(color,index) in colors" :key="index" :value="color.id">{{color.name}}</option>



                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control"
                                    v-bind:class="{
                                        'border-danger': forrequire(
                                            this.requireerroryk.description,
                                            this.texture.description
                                        ),
                                    }"
                                     name="" v-model="texture.description">{{texture.description}}</textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                          <input class="form-check-input wradio"  type="radio" name="exampleRadios" id="wradio" value="option1" @click="getcondition(1)">
                                          <label class="form-check-label" for="wradio">
                                            Warm
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                          <input class="form-check-input cradio"  type="radio" name="exampleRadios" id="cradio" value="option1" @click="getcondition(2)">
                                          <label class="form-check-label" for="cradio">
                                            Cool
                                          </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                  <input v-if="WStatus" v-model="texture.condition" @keyup="check_percentage(texture.condition)" type="number" class="form-control" placeholder="Enter Warm Range Percentage">
                                  <input v-if="CStatus" v-model="texture.condition" @keyup="check_percentage(texture.condition)" type="number" class="form-control" placeholder="Enter Cool Range Percentage">
                                  <strong class="text-danger" v-if="percentageStatus">Percentage Value must be less than 100%</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Threating Sq Ft</label>
                                    <input type="text" v-model="texture.threat" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.threat,
                                                        this.texture.threat
                                                    ),
                                                }"
                                    placeholder="Enter Threating Squart Feet">
                                </div>
                            </div>
                        </div>
                        Drag and Drop Here
                        <div

                        >
                        <label style="font-size: 15px" class="text-danger"
                              >Upload Min One Photo</label
                          >
                        </div>

                        <vue-dropzone ref="myVueDropzone"  id="customdropzone"
                        :options="dropzoneOptions"
                        :include-styling="false"
                        v-on:vdropzone-thumbnail="thumbnail"

                        v-on:vdropzone-removed-file="removeThisFile"></vue-dropzone>
                    </div>
                    <div class="card-footer">
                    <button type="submit" to="list_texture"  @click="edit_store_texture" class="btn btn-primary">Submit</button>
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

        "link","textureID"

    ],
    name:"EditTexture.vue",
     components: {
        vueDropzone: vue2Dropzone
      },
      data: function () {

        return {
          pattern_disabled:true,
          sub_disabled:true,
          patterns:{},
          packages:{},
            percentageStatus:false,
            WStatus:false,
            CStatus:false,
            subcategories:{},
            main_textures:{},
            uploadCount:0,
            removeCount:0,
            colors:{},
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
            texture:{
                files:[],
                name:"",
                price:"",
                main_id:"",
                sub_id:"",
                color:"",
                made_in:"",
                pattern_id:"",
                composition:"",
                softness:"",
                description:"",
                condition:"",
                threat:"",
                package:"",
            },

                //forerror
        requireerroryk: {
            name: false,
            price: false,
            made_in:false,
            composition:false,
            softness:false,
            description:false,
            main_id:false,
            threat:false,
            sub_id:false,
            color:false,
            package:false,
            // photoerror: false

        },
            //forerror
          dropzoneOptions: {
              url: this.link,
              thumbnailWidth: 200,
              previewTemplate: this.template(),
              minImageWidth:525,
              minImageHeight:295,
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
        store_texture(){

            console.log(this.$refs.myVueDropzone.getQueuedFiles());
            const config = {

        headers: { 'content-type': 'multipart/form-data' }

        }
            let formData = new FormData();
                // formData.append('file', this.texture.files);
                formData.append('price', this.texture.name);
                formData.append('price', this.texture.price);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });

            axios.post('/store_texture',formData,config)
            .then(function (response){
                alert("access");
                window.location.reload();
            })
            .catch(function (error){

                // alert("wrong");
            })
        },
        getMainTexture(){
            axios.get('/get_main_texture')
            .then( (response) => {
                console.log(response.data);
                // alert("item is successfully uploaded");
                this.main_textures = response.data.main_textures
                console.log(this.main_textures);
            })
            .catch(function (error){
                console.log(error);
            })
        },
        getSubCategory(){
            axios.get('/get_main_texture_sub_all')
            .then( (response) => {
                console.log(response.data);
                // alert("item is successfully uploaded");
                this.subcategories = response.data.main_textures_sub
                console.log(this.main_textures);
            })
            .catch(function (error){
                console.log(error);
            })
        },
        getMainTextureSub(){
            let mainID = {
                'main_id' : this.texture.main_id
            }
            axios.post('/get_main_texture_sub',mainID)
            .then((response) => {
                // alert("item is successfully uploaded");
                this.subcategories = response.data.main_textures_sub;
                this.sub_disabled = false;
            })
            .catch(function (error){
                console.log("error");
            })
        },
        getPattern()
        {
          axios.get('/get_pattern_all')
          .then( (response) => {
              console.log(response.data);
              // alert("item is successfully uploaded");
              this.patterns = response.data.patterns
              // console.log(this.main_textures);
          })
          .catch(function (error){
              console.log(error);
          })
        },
        getPatternFormSub(){
          // alert("Sub ID = "+this.texture.sub_id);
            let subID = {
                'sub_id' : this.texture.sub_id
            }
            axios.post('/get_pattern_sub',subID)
            .then((response) => {
              console.log(response.data);
                // alert("item is successfully uploaded");
                this.patterns = response.data.patterns
                this.pattern_disabled = false
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
        getPackage(){
          axios.get('/get_package')
          .then((response) => {
              console.log(response.data.packages);
              this.packages = response.data.packages;
          })
          .catch(function (error){
              console.log("wrong");
          })
        },
        edit_store_texture()

        {
            console.log(this.texture.main_id);
            this.uploadCount = this.$refs.myVueDropzone.getQueuedFiles().length;
            let tmperrorcounts = 0;
            console.log(this.texture.name);
            if (this.texture.package == "") {
                this.requireerroryk.package = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.package = false;
            }
            if (this.texture.main_id == "") {
                this.requireerroryk.main_id = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.main_id = false;
            }
            if (this.texture.sub_id == "") {
                this.requireerroryk.sub_id = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.sub_id = false;
            }
            if (this.texture.color == "") {
                this.requireerroryk.color = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.color = false;
            }
            if (this.texture.threat == "") {
                this.requireerroryk.threat = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.threat = false;
            }
            if (this.texture.main_id == "") {
                this.requireerroryk.main_id = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.main_id = false;
            }
            if (this.texture.made_in == "") {
                this.requireerroryk.made_in = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.made_in = false;
            }
            if (this.texture.composition == "") {
                this.requireerroryk.composition = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.composition = false;
            }
            if (this.texture.softness == "") {
                this.requireerroryk.softness = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.softness = false;
            }
            if (this.texture.description == "") {
                this.requireerroryk.description = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.description = false;
            }

            // check all input field has value
            if (this.texture.name == "") {
                this.requireerroryk.name = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.name = false;
            }

            if (this.texture.price == "") {
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
                if(this.requireerroryk.package) {
                  alertText[i] = "need to fill the Package";
                  i++;
                }
                if(this.requireerroryk.color) {
                  alertText[i] = "need to fill the Color";
                  i++;
                }
                if(this.requireerroryk.sub_id) {
                  alertText[i] = "need to fill the SubCategory";
                  i++;
                }
                if(this.requireerroryk.threat) {
                  alertText[i] = "need to fill the threating Sq ft";
                  i++;
                }
                if(this.requireerroryk.main_id) {
                  alertText[i] = "need to fill the category";
                  i++;
                }
                if(this.requireerroryk.made_in) {
                  alertText[i] = "need to fill the made in";
                  i++;
                }
                if(this.requireerroryk.composition) {
                  alertText[i] = "need to fill the composition";
                  i++;
                }
                if(this.requireerroryk.description) {
                  alertText[i] = "need to fill the description";
                  i++;
                }
                if(this.requireerroryk.softness) {
                  alertText[i] = "need to fill the softness";
                  i++;
                }

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
                formData.append('texture_id', this.link);

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
                formData.append('name', this.texture.name);
                formData.append('price', this.texture.price);
                formData.append('main_id', this.texture.main_id);
                formData.append('sub_id', this.texture.sub_id);

                formData.append('made_in', this.texture.made_in);
                formData.append('color', this.texture.color);
                formData.append('composition', this.texture.composition);
                formData.append('softness', this.texture.softness);
                formData.append('description', this.texture.description);
                formData.append('wstatus', this.WStatus);
                formData.append('cstatus', this.CStatus);
                formData.append('rating', this.texture.condition);
                formData.append('threat', this.texture.threat);
                formData.append('pattern_id', this.texture.pattern_id);
                formData.append('package_id', this.texture.package);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            // let sizeStatus = true;
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
            // if(sizeStatus == false)
            // {
            //   alert(alertSize);

            // }
            // if(sizeStatus == true && this.percentageStatus == false)
            if(this.percentageStatus == false)
            {
            axios.post('/store_edit_texture',formData,config)

            .then(function (response){
                // alert("item is successfully updated");

                sessionStorage.setItem('reload_texture_list',1);
                window.history.back();


            })
            .catch(function (error){

                // alert("wrong");
                console.log(error);
            })
            }
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
        getcondition(value)
        {
            // alert(value)
            if(value == 1)
            {
                this.WStatus = true;
                this.CStatus = false;
            }
            else if(value == 2)
            {
                this.CStatus = true;
                this.WStatus = false;
            }
        },

        check_percentage(value)
        {
          // alert(value);
          if(this.texture.condition > 100)
          {
            this.texture.condition = 0;
            this.percentageStatus = true;
          }
          else
          {
            this.percentageStatus = false;
          }
        }

      },
    mounted() {
      // console.log("Mounted Sub ID = "+this.texture.sub_id);
        this.getColor();
        this.getPackage();
        this.getMainTexture();
        this.getSubCategory();
        this.getPattern();
        // this.getMainTextureSub();
        console.log(this.link);
        let textureID = {
            'id' : this.link
        }
        axios.post('/get_edit_texture',textureID)
        .then( (response) => {
            // alert("access");
            console.log(response.data.textures.texture);
            this.texture.name = response.data.textures.name
            this.texture.price = response.data.textures.price
            this.texture.main_id = response.data.textures.main_texture_id
            this.texture.sub_id = response.data.textures.sub_category_id
            this.texture.made_in = response.data.textures.made_in
            this.texture.color = response.data.textures.color_id
            this.texture.composition = response.data.textures.composition
            this.texture.softness = response.data.textures.softness
            this.texture.description = response.data.textures.description
            this.texture.threat = response.data.textures.threating
            this.texture.pattern_id = response.data.textures.pattern_id
            this.texture.package = response.data.textures.package_id

            console.log("Pattern ID in mounted = "+this.texture.pattern_id);

            if(response.data.textures.warm_rating == 0)
            {
                this.texture.condition = response.data.textures.cool_rating
                this.WStatus = false;
                this.CStatus = true;
                $("#cradio").attr('checked', true);
            }
            if(response.data.textures.cool_rating == 0)
            {
                this.texture.condition = response.data.textures.warm_rating
                this.CStatus = false;
                this.WStatus = true;
                $("#wradio").attr('checked', true);
            }


            // window.location.reload();
                if(response.data.textures.photo_one != null)
                  {
                var file1 = { size: 123, name: "Photo One", type: "image/png" };
                this.url1 = "/assets/images/categories/texture/"+response.data.textures.photo_one;
                this.$refs.myVueDropzone.manuallyAddFile(file1, this.url1);
                  }

                if(response.data.textures.photo_two != null)
              {
              var file2 = { size: 123, name: "Photo Two", type: "image/png" };
              this.url2 = "/assets/images/categories/texture/"+response.data.textures.photo_two;
              this.$refs.myVueDropzone.manuallyAddFile(file2, this.url2);
              }
              if(response.data.textures.photo_three != null)
              {
              var file3 = { size: 123, name: "Photo Three", type: "image/png" };
              this.url3 = "/assets/images/categories/texture/"+response.data.textures.photo_three;
              this.$refs.myVueDropzone.manuallyAddFile(file3, this.url3);
              }
              if(response.data.textures.photo_four != null)
              {
              var file4 = { size: 123, name: "Photo Four", type: "image/png" };
              this.url4 = "/assets/images/categories/texture/"+response.data.textures.photo_four;
              this.$refs.myVueDropzone.manuallyAddFile(file4, this.url4);
              }
              if(response.data.textures.photo_five != null)
              {
                var file5 = { size: 123, name: "Photo Five", type: "image/png" };
                  this.url5 = "/assets/images/categories/texture/"+response.data.textures.photo_five;
                  this.$refs.myVueDropzone.manuallyAddFile(file5, this.url5);
              }

              if(response.data.textures.photo_six != null)
              {
              var file6 = { size: 123, name: "Photo Six", type: "image/png" };
              this.url6 = "/assets/images/categories/texture/"+response.data.textures.photo_six;
              this.$refs.myVueDropzone.manuallyAddFile(file6, this.url6);
              }

              if(response.data.textures.photo_seven != null)
              {
              var file7 = { size: 123, name: "Photo seven", type: "image/png" };
              this.url7 = "/assets/images/categories/texture/"+response.data.textures.photo_seven;
              this.$refs.myVueDropzone.manuallyAddFile(file7, this.url7);
              }
              if(response.data.textures.photo_eight != null)
              {
              var file8 = { size: 123, name: "Photo eight", type: "image/png" };
              this.url8 = "/assets/images/categories/texture/"+response.data.textures.photo_eight;
              this.$refs.myVueDropzone.manuallyAddFile(file8, this.url8);
              }
              if(response.data.textures.photo_nine != null)
              {
              var file9 = { size: 123, name: "Photo nine", type: "image/png" };
              this.url9 = "/assets/images/categories/texture/"+response.data.textures.photo_nine;
              this.$refs.myVueDropzone.manuallyAddFile(file9, this.url9);
              }
              if(response.data.textures.photo_ten != null)
              {
              var file10 = { size: 123, name: "Photo ten", type: "image/png" };
              this.url10 = "/assets/images/categories/texture/"+response.data.textures.photo_ten;
              this.$refs.myVueDropzone.manuallyAddFile(file10, this.url10);
              }
        })
        .catch(function (error){
            console.log(error);
            // alert("wrong");

        })
        console.log('Component.'+this.texture.condition)
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

