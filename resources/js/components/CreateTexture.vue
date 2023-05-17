<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Grand Texture</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Choose Category</label>
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
                                <div class="form-group">
                                    <label>Choose SubCategory</label>
                                    <select class="form-control"
                                    @change="getPatternFormSub"
                                    v-bind:class="{
                                        'border-danger': forrequire(
                                            this.requireerroryk.sub_id,
                                            this.texture.sub_id
                                        ),
                                    }"

                                    v-model="texture.sub_id" name="btn_text">
                                        <option selected hidden>Choose SubCategory</option>
                                        <option v-for="(sub,index) in subcategories" :key="index" :value="sub.id">{{sub.name}}</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                  <label>Choose Pattern</label>
                                  <select class="form-control"
                                  @change="getMainTextureSub"
                                  v-bind:class="{
                                      'border-danger': forrequire(
                                          this.requireerroryk.pattern_id,
                                          this.texture.pattern_id
                                      ),
                                  }"
                                  v-model="texture.pattern_id" name="btn_text">
                                      <option selected hidden>Choose Pattern</option>
                                      <option v-for="(pattern,index) in patterns" :key="index" :value="pattern.id">{{pattern.name}}</option>

                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" v-model="texture.name" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.name,
                                                        this.texture.name
                                                    ),
                                                }"
                                    placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" v-model="texture.price" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.price,
                                                        this.texture.price
                                                    ),
                                                }"
                                    placeholder="Enter price">
                                </div>
                                Drag and Drop Here
                                <div
                                    v-bind:class="{
                                        'color-danger': forrequirephoto(
                                            this.requireerroryk.photoerror,
                                            this.texture.photoerror
                                        ),
                                    }"
                                >
                                <label style="font-size: 15px" class="text-danger"
                                      >Upload Min One Photo</label
                                  >
                                </div>
                                <vue-dropzone ref="myVueDropzone"  id="customdropzone"
                                 :options="dropzoneOptions"
                                 :include-styling="false"
                                 v-on:vdropzone-thumbnail="thumbnail"
                                 v-on:vdropzone-removed-file="
                                                removefilefromdz
                                            "
                                 ></vue-dropzone>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Choose Color</label>

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
                                <div class="form-group">
                                    <label>Choose Package</label>

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
                                <div class="form-group">
                                    <label>Composition</label>
                                    <input type="text" v-model="texture.composition" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.composition,
                                                        this.texture.composition
                                                    ),
                                                }"
                                    placeholder="Enter Composition">
                                </div>
                                <div class="form-group">
                                    <label>Softness</label>
                                    <input type="text" v-model="texture.softness" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.softness,
                                                        this.texture.softness
                                                    ),
                                                }"
                                    placeholder="Enter Softness">
                                </div>
                                <div class="form-group">
                                    <label>Threating Sq Ft</label>
                                    <input type="number" v-model="texture.threat" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.threat,
                                                        this.texture.threat
                                                    ),
                                                }"
                                    placeholder="Enter Threating Squart Feet">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea v-model="texture.description" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.description,
                                                        this.texture.description
                                                    ),
                                                }"
                                    placeholder="Enter Description">Enter Description</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" @click="getcondition(1)">
                                          <label class="form-check-label" for="exampleRadios1">
                                            Warm
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" @click="getcondition(2)">
                                          <label class="form-check-label" for="exampleRadios1">
                                            Cool
                                          </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <input v-if="WStatus" v-model="texture.condition" @keyup="check_percentage()" type="number" class="form-control" placeholder="Enter Warm Range Percentage">
                                    <input v-if="CStatus" v-model="texture.condition" @keyup="check_percentage()" type="number" class="form-control" placeholder="Enter Cool Range Percentage">
                                    <strong class="text-danger" v-if="percentageStatus">Percentage Value must be less than 100%</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit"  @click="create_texture" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import VueSimpleAlert from "vue-simple-alert";

Vue.use(VueSimpleAlert);

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
        percentageStatus:false,
        main_textures:{},
        subcategories:{},
        patterns:{},
        colors:{},
        packages:{},
        WStatus:false,
        CStatus:false,
        texture:{
            name:"",
            price:"",
            files:[],
            main_id:"",
            sub_id:"",
            made_in:"",
            color:"",
            composition:"",
            softness:"",
            description:"",
            condition:"",
            threat:"",
            pattern_id:"",
            package:"",
            // submittedLoading: 0,
        },
            //forerror
            requireerroryk: {
                name: false,
                price: false,
                photoerror: false,
                made_in:false,
                composition:false,
                softness:false,
                description:false,
                threat:false,
                main_id:false,
                sub_id:false,
                color:false,
                pattern_id:false,
                package:false,
            },
            //forerror
            minImageWidth:525,
            minImageHeight:295,
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
        getMainTexture(){
            axios.get('get_main_texture')
            .then( (response) => {
                // alert("item is successfully uploaded");
                this.main_textures = response.data.main_textures
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
            axios.post('get_main_texture_sub',mainID)
            .then((response) => {
                // alert("item is successfully uploaded");
                this.subcategories = response.data.main_textures_sub
            })
            .catch(function (error){
                console.log("wrong");
            })
        },

        getPatternFormSub(){
            let subID = {
                'sub_id' : this.texture.sub_id
            }
            axios.post('get_pattern_sub',subID)
            .then((response) => {
              console.log(response.data);
                // alert("item is successfully uploaded");
                this.patterns = response.data.patterns
            })
            .catch(function (error){
                console.log("wrong");
            })
        },

        // when click submit button
        create_texture(){



            let tmperrorcounts = 0;
            console.log(this.texture.name);
            // check all input field has value
            if (this.texture.package == "") {
                this.requireerroryk.package = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.package = false;
            }
            if (this.texture.pattern_id == "") {
                this.requireerroryk.pattern_id = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.pattern_id = false;
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
                if(this.requireerroryk.package) {
                  alertText[i] = "need to Choose Package";
                  i++;
                }
                if(this.requireerroryk.pattern_id) {
                  alertText[i] = "need to Choose Pattern";
                  i++;
                }
                if(this.requireerroryk.color) {
                  alertText[i] = "need to fill the Color";
                  i++;
                }
                if(this.requireerroryk.main_id) {
                  alertText[i] = "need to fill the Category";
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

                if(this.requireerroryk.name) {
                  alertText[i] = "need to fill the name";
                  i++;
                }
                if(this.requireerroryk.price) {
                  alertText[i] = "need to fill the price";
                  i++;
                }
                if(this.requireerroryk.description) {
                  alertText[i] = "need to fill the description";
                  i++;
                }
                if(this.requireerroryk.made_in) {
                  alertText[i] = "need to fill the made in";
                  i++;
                }
                if(this.requireerroryk.composition) {
                  alertText[i] = "need to fill the Composition";
                  i++;
                }
                if(this.requireerroryk.softness) {
                  alertText[i] = "need to fill the softness";
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
            //Start Check Image


            //End Check Image
            let formData = new FormData();
                // formData.append('file', this.fit_suit.files);
                formData.append('name', this.texture.name);
                formData.append('price', this.texture.price);
                formData.append('main_id', this.texture.main_id);
                formData.append('sub_id', this.texture.sub_id);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                formData.append('color_id', this.texture.color);
                formData.append('composition', this.texture.composition);
                formData.append('made_in', this.texture.made_in);
                formData.append('softness', this.texture.softness);
                formData.append('description', this.texture.description);

                formData.append('wstatus', this.WStatus);
                formData.append('cstatus', this.CStatus);
                formData.append('rating', this.texture.condition);
                formData.append('threat', this.texture.threat);
                formData.append('pattern_id', this.texture.pattern_id);
                formData.append('package_id', this.texture.package);




                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });
            console.log(this.$refs.myVueDropzone.getQueuedFiles());
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
            // // alert(sizeStatus);
            // if(sizeStatus == false && alertSize[0] != null)
            // {
            //   console.log("rrr"+alertSize);
            //   alert("ddd"+alertSize);

            // }
            if(this.percentageStatus == true)
            {
              alert("Condition Value greater than 100%");
            }
            // if(sizeStatus == true && this.percentageStatus == false)
            if(this.percentageStatus == false)
            {
              // alert("hellllll");
                axios.post('store_texture',formData,config)
                .then(function (response){
                    // alert("item is successfully uploaded");
                    // this.$alert("Hello Vue Simple Alert.");
                    window.location = 'grand_texture_list'
                })
                .catch(function (error){
                    console.log("wrong");
                })
            }

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
        },
        check_percentage()
        {
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
            this.getColor();
            this.getPackage();
            this.getMainTexture();
            this.getMainTextureSub();
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

