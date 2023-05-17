<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <!-- <div class="card-header">Grand Texture</div> -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                                  <label>Choose Main Texture</label>
                                  <select class="form-control"
                                  @change="getMainTextureSub"
                                  v-bind:class="{
                                      'border-danger': forrequire(
                                          this.requireerroryk.main_id,
                                          this.readytowear.main_id
                                      ),
                                  }"
                                  v-model="readytowear.main_id" name="btn_text">
                                      <option selected hidden>Choose Category</option>
                                      <option v-for="(main,index) in main_textures" :key="index" :value="main.id">{{main.name}}</option>
                                  </select>
                              </div>
                              <!-- <div class="form-group">
                                  <label>Choose Sub Texture</label>
                                  <select class="form-control"
                                  @change="getGrandTexture"
                                  v-bind:class="{
                                      'border-danger': forrequire(
                                          this.requireerroryk.sub_id,
                                          this.readytowear.sub_id
                                      ),
                                  }"

                                  v-model="readytowear.sub_id" name="btn_text">
                                      <option selected hidden>Choose SubCategory</option>
                                      <option v-for="(sub,index) in subcategories" :key="index" :value="sub.id">{{sub.name}}</option>

                                  </select>
                              </div> -->
                              <!-- <div class="form-group">
                                  <label>Choose Grand Texture</label>
                                  <select class="form-control"

                                  v-bind:class="{
                                      'border-danger': forrequire(
                                          this.requireerroryk.texture_id,
                                          this.readytowear.grand_texture_id
                                      ),
                                  }"
                                  v-model="readytowear.grand_texture_id" name="btn_text">
                                      <option selected hidden>Choose Texture</option>
                                      <option v-for="(texture,index) in textures" :key="index" :value="texture.id">{{texture.name}}</option>

                                  </select>
                              </div> -->
                              <div class="form-group">
                                  <label>Choose Style</label>
                                  <select class="form-control"

                                  v-bind:class="{
                                      'border-danger': forrequire(
                                          this.requireerroryk.sub_id,
                                          this.readytowear.style_id
                                      ),
                                  }"

                                  v-model="readytowear.style_id" name="btn_text">
                                      <option selected hidden>Choose Style</option>
                                      <option v-for="(style,index) in styles" :key="index" :value="style.id">{{style.name}}</option>
                                  </select>
                              </div>
                              <!-- <div class="form-group">
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
                              </div> -->
                              <div class="form-group">
                                  <label>Name</label>
                                  <input type="text" v-model="readytowear.name" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.name,
                                                      this.readytowear.name
                                                  ),
                                              }"
                                  placeholder="Enter name">
                              </div>
                              <!-- <div class="form-group">
                                  <label>Price</label>
                                  <input type="text" v-model="texture.price" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.price,
                                                      this.texture.price
                                                  ),
                                              }"
                                  placeholder="Enter price">
                              </div> -->
                              Drag and Drop Here
                              <div
                                  v-bind:class="{
                                      'color-danger': forrequirephoto(
                                          this.requireerroryk.photoerror,
                                          this.readytowear.photoerror
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
                              <!-- <div class="form-group">
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
                              </div> -->
                              <!-- <div class="form-group">
                                  <label>Choose Package</label>

                                  <select class="form-control"
                                  v-bind:class="{
                                      'border-danger': forrequire(
                                          this.requireerroryk.package,
                                          this.readytowear.package
                                      ),
                                  }"

                                  v-model="readytowear.package" name="btn_text">
                                      <option selected hidden>Choose Package</option>


                                      <option v-for="(pack,index) in packages" :key="index" :value="pack.id">{{pack.title}}</option>


                                  </select>
                              </div> -->
                              <div class="form-group">
                                <label>Price</label>
                                  <input type="text" v-model="readytowear.price" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.price,
                                                      this.requireerroryk.price_int,
                                                      this.readytowear.price
                                                  ),
                                              }"
                                  placeholder="Enter price">
                                  <label>Made In</label>
                                  <input type="text" v-model="readytowear.made_in" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.made_in,
                                                      this.readytowear.made_in
                                                  ),
                                              }"
                                  placeholder="Enter Made In">
                              </div>
                              <div class="form-group">
                                  <label>Composition</label>
                                  <input type="text" v-model="readytowear.composition" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.composition,
                                                      this.readytowear.composition
                                                  ),
                                              }"
                                  placeholder="Enter Composition">
                              </div>
                              <div class="form-group">
                                  <label>Softness</label>
                                  <input type="text" v-model="readytowear.softness" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.softness,
                                                      this.readytowear.softness
                                                  ),
                                              }"
                                  placeholder="Enter Softness">
                              </div>
                             <!-- <div class="form-group">
                                  <label>Threating Sq Ft</label>
                                  <input type="number" v-model="texture.threat" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.threat,
                                                      this.texture.threat
                                                  ),
                                              }"
                                  placeholder="Enter Threating Squart Feet">
                              </div> -->
                              <!-- <div class="form-group">
                                  <label>Stock Qty</label>
                                  <input type="text" v-model="readytowear.stock_qty" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.stock_qty,
                                                      this.readytowear.stock_qty
                                                  ),
                                              }"
                                  placeholder="Enter Stock Qty">
                              </div> -->
                              <div class="form-group">
                                  <label>Description</label>
                                  <textarea v-model="readytowear.description" class="form-control"
                                  v-bind:class="{
                                                  'border-danger': forrequire(
                                                      this.requireerroryk.description,
                                                      this.readytowear.description
                                                  ),
                                              }"
                                  placeholder="Enter Description">Enter Description</textarea>
                              </div>

                              <!-- <div class="row">
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
                              </div> -->
                              <!-- <div class="form-group mt-4">
                                  <input v-if="WStatus" v-model="texture.condition" @mouseleave="check_percentage()" type="number" class="form-control" placeholder="Enter Warm Range Percentage">
                                  <input v-if="CStatus" v-model="texture.condition" @mouseleave="check_percentage()" type="number" class="form-control" placeholder="Enter Cool Range Percentage">
                                  <strong class="text-danger" v-if="percentageStatus">Percentage Value must be less than 100%</strong>
                              </div> -->
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit"  @click="create_ready_to_wear" class="btn btn-primary">Submit</button>
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
      // subcategories:{},
      main_textures:{},
      // textures:{},
      styles:{},
      packages:{},
      readytowear:{
          name:"",
          price:"",
          files:[],
          main_id:"",
          // grand_texture_id:"",
          style_id:"",
          description:"",
          // package:"",
          stock_qty:"",
          made_in:"",
          composition:"",
          softness:""
          // sub_id:"",
          // submittedLoading: 0,
      },
          //forerror
          requireerroryk: {
              name: false,
              main_id:false,
              price: false,
              photoerror: false,
              description:false,
              // package:false,
              // grand_texture_id:false,
              style_id:false,
              stock_qty:false,
              made_in:false,
              composition:false,
              softness : false
              // sub_id:false
          },
          //forerror
          minImageWidth:525,
          minImageHeight:295,
         dropzoneOptions: {
            url: this.link,
            thumbnailWidth: 200,
            previewTemplate: this.template(),
            minFiles:1,
            maxFiles: 5,
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
      getStyleCategory(){
          axios.get('get_style_category')
          .then( (response) => {
              // alert("item is successfully uploaded");
              this.styles = response.data.styles;
              console.log(this.main_textures);
          })
          .catch(function (error){
              console.log(error);
          })
      },
      getMainTextureSub(){
          let mainID = {
              'main_id' : this.readytowear.main_id
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
      getGrandTexture(){
        let subID = {
            'sub_id' : this.readytowear.sub_id
        }
        axios.post('get_grand_texture',subID)
        .then((response) => {
            // alert("item is successfully uploaded");
            this.textures = response.data.textures
        })
        .catch(function (error){
            console.log("wrong");
        })
      },
      getStyle(){
          axios.get('/get_style')
          .then((response) => {
              console.log(response.data.styles);
              // this.styles = response.data.styles;
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
      create_ready_to_wear(){
        console.log(Number.isInteger(this.requireerroryk.price_int) + "gg")
          this.uploadCount = this.$refs.myVueDropzone.getQueuedFiles().length;
          let tmperrorcounts = 0;
          // console.log(this.texture.name);
          // check all input field has value
          if (this.readytowear.main_id == "") {
              this.requireerroryk.main_id = true;
              tmperrorcounts += 1;

          } else {
              this.requireerroryk.main_id = false;
          }
          if (this.readytowear.made_in == "") {
              this.requireerroryk.made_in = true;
              tmperrorcounts += 1;

          } else {
              this.requireerroryk.made_in = false;
          }
          if (this.readytowear.composition == "") {
              this.requireerroryk.composition = true;
              tmperrorcounts += 1;

          } else {
              this.requireerroryk.composition = false;
          }
          if (this.readytowear.softness == "") {
              this.requireerroryk.softness = true;
              tmperrorcounts += 1;

          } else {
              this.requireerroryk.softness = false;
          }
        //   if (this.readytowear.stock_qty == "") {
        //       this.requireerroryk.stock_qty = true;
        //       tmperrorcounts += 1;

        //   } else {
        //       this.requireerroryk.stock_qty = false;
        //   }
          // if (this.readytowear.sub_id == "") {
          //     this.requireerroryk.sub_id = true;
          //     tmperrorcounts += 1;

          // } else {
          //     this.requireerroryk.sub_id = false;
          // }
          // if (this.readytowear.package == "") {
          //     this.requireerroryk.package = true;
          //     tmperrorcounts += 1;

          // } else {
          //     this.requireerroryk.package = false;
          // }
          // if (this.readytowear.grand_texture_id == "") {
          //     this.requireerroryk.grand_texture_id = true;
          //     tmperrorcounts += 1;

          // } else {
          //     this.requireerroryk.grand_texture_id = false;
          // }
          if (this.readytowear.style_id == "") {
              this.requireerroryk.style_id = true;
              tmperrorcounts += 1;

          } else {
              this.requireerroryk.style_id = false;
          }


          if (this.readytowear.description == "") {
              this.requireerroryk.description = true;
              tmperrorcounts += 1;

          } else {
              this.requireerroryk.description = false;
          }

          if (this.readytowear.name == "") {
              this.requireerroryk.name = true;
              tmperrorcounts += 1;

          } else {
              this.requireerroryk.name = false;
          }

          if (this.readytowear.price == "") {
              this.requireerroryk.price = true;
              tmperrorcounts += 1;
          }else {this.requireerroryk.price = false;}

          if (Number.isInteger(this.requireerroryk.price_int) == false) {
              this.requireerroryk.price_int = true;
              tmperrorcounts += 1;
          }else {this.requireerroryk.price_int = false;}

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
              // if(this.requireerroryk.package) {
              //   alertText[i] = "need to Choose Package";
              //   i++;
              // }
              // if(this.requireerroryk.sub_id) {
              //   alertText[i] = "need to Choose Sub Texture";
              //   i++;
              // }
              if(this.requireerroryk.main_id) {
                alertText[i] = "need to Choose Main Texture";
                i++;
              }
              if(this.requireerroryk.made_in) {
                alertText[i] = "need to Fill Made In";
                i++;
              }
              if(this.requireerroryk.composition) {
                alertText[i] = "need to Fill Composition";
                i++;
              }
              if(this.requireerroryk.softness) {
                alertText[i] = "need to Fill Softness";
                i++;
              }
              if(this.requireerroryk.stock_qty) {
                alertText[i] = "need to fill Stock Qty";
                i++;
              }
              // if(this.requireerroryk.grand_texture_id) {
              //   alertText[i] = "need to Choose Texture";
              //   i++;
              // }
              if(this.requireerroryk.style_id) {
                alertText[i] = "need to Choose Style";
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

              if(this.requireerroryk.price_int) {
                alertText[i] = "The Price must be number";
                i++;
              }

              if(this.requireerroryk.description) {
                alertText[i] = "need to fill the description";
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
              formData.append('name', this.readytowear.name);
              formData.append('price', this.readytowear.price);
              formData.append('main_id', this.readytowear.main_id);
              // formData.append('sub_id', this.readytowear.sub_id);
              // formData.append('texture_id', this.readytowear.grand_texture_id);
              formData.append('style_id', this.readytowear.style_id);
              formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());

              formData.append('description', this.readytowear.description);


              // formData.append('package_id', this.readytowear.package);

              formData.append('stock_qty', this.readytowear.stock_qty);

              formData.append('made_in', this.readytowear.made_in);
              formData.append('composition', this.readytowear.composition);
              formData.append('softness', this.readytowear.softness);

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
          // if(sizeStatus == true)
          // {
            // alert("hellllll");
              axios.post('store_ready_to_wear',formData,config)
              .then(function (response){
                  // alert("item is successfully uploaded");
                  // this.$alert("Hello Vue Simple Alert.");
                  window.location = 'get_ready_to_wear'
              })
              .catch(function (error){
                  console.log("wrong");
              })
          // }

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
    this.getMainTexture();
    this.getMainTextureSub();
        this.getPackage();
        this.getStyle();
        this.getStyleCategory();
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


