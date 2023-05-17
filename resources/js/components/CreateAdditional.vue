<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Grand Additional</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Choose Category</label>
                                    <select class="form-control"
                                    @change="getMainAdditionalSub"
                                    v-bind:class="{
                                        'border-danger': forrequire(
                                            this.requireerroryk.main_id,
                                            this.additional.main_id
                                        ),
                                    }"
                                    v-model="additional.main_id" name="btn_text">
                                        <option selected hidden>Choose Category</option>
                                        <option v-for="(main,index) in main_additionals" :key="index" :value="main.id">{{main.name}}</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Choose SubCategory</label>
                                    <select class="form-control"
                                    v-bind:class="{
                                        'border-danger': forrequire(
                                            this.requireerroryk.sub_id,
                                            this.additional.sub_id
                                        ),
                                    }"

                                    v-model="additional.sub_id" name="btn_text">
                                        <option selected hidden>Choose SubCategory</option>
                                        <option v-for="(sub,index) in subcategories" :key="index" :value="sub.id">{{sub.name}}</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" v-model="additional.name" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.name,
                                                        this.additional.name
                                                    ),
                                                }"
                                    placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label>Stock Qty</label>
                                    <input type="text" v-model="additional.stock_qty" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.stock_qty,
                                                        this.additional.stock_qty
                                                    ),
                                                }"
                                    placeholder="Enter Stock Qty">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" v-model="additional.price" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.price,
                                                        this.additional.price
                                                    ),
                                                }"
                                    placeholder="Enter price">
                                </div>
                                Drag and Drop Here
                                <div
                                    v-bind:class="{
                                        'color-danger': forrequirephoto(
                                            this.requireerroryk.photoerror,
                                            this.additional.photoerror
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
                                            this.additional.color
                                        ),
                                    }"
                                    v-model="additional.color" name="btn_text">
                                        <option selected hidden>Choose Color</option>


                                        <option v-for="(color,index) in colors" :key="index" :value="color.id">{{color.name}}</option>


                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label>Made In</label>
                                    <input type="text" v-model="additional.made_in" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.made_in,
                                                        this.additional.made_in
                                                    ),
                                                }"
                                    placeholder="Enter Made In">
                                </div>
                                <div class="form-group">
                                    <label>Composition</label>
                                    <input type="text" v-model="additional.composition" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.composition,
                                                        this.additional.composition
                                                    ),
                                                }"
                                    placeholder="Enter Composition">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Softness</label>
                                    <input type="text" v-model="additional.softness" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.softness,
                                                        this.additional.softness
                                                    ),
                                                }"
                                    placeholder="Enter Softness">
                                </div> -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea v-model="additional.description" class="form-control"
                                    v-bind:class="{
                                                    'border-danger': forrequire(
                                                        this.requireerroryk.description,
                                                        this.additional.description
                                                    ),
                                                }"
                                    placeholder="Enter Description">Enter Description</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit"  @click="create_additional" class="btn btn-primary">Submit</button>
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
    name:"CreateAdditional.vue",
     components: {
        vueDropzone: vue2Dropzone
      },
      data: function () {

        return {
        main_additionals:{},
        subcategories:{},
        additional:{
            name:"",
            price:"",
            files:[],
            main_id:"",
            sub_id:"",
            made_in:"",
            // color:"",
            composition:"",
            // softness:"",
            description:"",
            stock_qty:"",
            // submittedLoading: 0,
        },
            //forerror
            requireerroryk: {
                name: false,
                price: false,
                photoerror: false,
                made_in:false,
                composition:false,
                // softness:false,
                description:false,
                main_id:false,
                sub_id:false,
                // color:false,
                stock_qty:false
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
        getMainAdditional(){
            axios.get('get_main_additional')
            .then( (response) => {
                // alert("item is successfully uploaded");
                this.main_additionals = response.data.main_additionals
                console.log(this.main_additionals);
            })
            .catch(function (error){
                console.log(error);
            })
        },
        getMainAdditionalSub(){
            let mainID = {
                'main_id' : this.additional.main_id
            }
            axios.post('get_main_additional_sub',mainID)
            .then((response) => {
                // alert("item is successfully uploaded");
                this.subcategories = response.data.main_additionals_sub
            })
            .catch(function (error){
                console.log("wrong");
            })
        },
        // when click submit button
        create_additional(){
            let tmperrorcounts = 0;
            console.log(this.additional.name);
            // check all input field has value
            // if (this.additional.color == "") {
            //     this.requireerroryk.color = true;
            //     tmperrorcounts += 1;

            // } else {
            //     this.requireerroryk.color = false;
            // }
            if (this.additional.stock_qty == "") {
                this.requireerroryk.stock_qty = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.stock_qty = false;
            }
            if (this.additional.made_in == "") {
                this.requireerroryk.made_in = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.made_in = false;
            }
            if (this.additional.composition == "") {
                this.requireerroryk.composition = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.composition = false;
            }
            // if (this.additional.softness == "") {
            //     this.requireerroryk.softness = true;
            //     tmperrorcounts += 1;

            // } else {
            //     this.requireerroryk.softness = false;
            // }
            if (this.additional.description == "") {
                this.requireerroryk.description = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.description = false;
            }
            if (this.additional.main_id == "") {
                this.requireerroryk.main_id = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.main_id = false;
            }
            if (this.additional.sub_id == "") {
                this.requireerroryk.sub_id = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.sub_id = false;
            }


            if (this.additional.name == "") {
                this.requireerroryk.name = true;
                tmperrorcounts += 1;

            } else {
                this.requireerroryk.name = false;
            }

            if (this.additional.price == "") {
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
                // this.additional.submittedLoading = 1;
            } else{
                var alertText = new Array();
                var i = 0;
                // if(this.requireerroryk.color) {
                //   alertText[i] = "need to fill the color";
                //   i++;
                // }
                if(this.requireerroryk.made_in) {
                  alertText[i] = "need to fill the made_in";
                  i++;
                }
                if(this.requireerroryk.stock_qty) {
                  alertText[i] = "need to fill the Stock";
                  i++;
                }
                if(this.requireerroryk.composition) {
                  alertText[i] = "need to fill the Composition";
                  i++;
                }
                // if(this.requireerroryk.softness) {
                //   alertText[i] = "need to fill the softness";
                //   i++;
                // }
                if(this.requireerroryk.description) {
                  alertText[i] = "need to fill the description";
                  i++;
                }
                if(this.requireerroryk.main_id) {
                  alertText[i] = "need to fill the Category";
                  i++;
                }
                if(this.requireerroryk.sub_id) {
                  alertText[i] = "need to fill the Subcategory";
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
                formData.append('name', this.additional.name);
                formData.append('price', this.additional.price);
                formData.append('main_id', this.additional.main_id);
                formData.append('sub_id', this.additional.sub_id);
                formData.append('images', this.$refs.myVueDropzone.getQueuedFiles());
                // formData.append('color_id', this.additional.color);
                formData.append('composition', this.additional.composition);
                formData.append('made_in', this.additional.made_in);
                // formData.append('softness', this.additional.softness);
                formData.append('description', this.additional.description);
                formData.append('stock_qty', this.additional.stock_qty);
                this.$refs.myVueDropzone.getQueuedFiles().forEach(file => {
                formData.append('images[]', file, file.upload.name);
            });
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
            // if(sizeStatus == false)
            // {
            //   alert(alertSize);

            // }
            // if(sizeStatus == true)
            // {
            axios.post('store_additional',formData,config)
            .then(function (response){
                // alert("item is successfully uploaded");
                window.location = 'grand_additional_list'
            })
            .catch(function (error){
                console.log("wrong");
            })
            // }
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
            this.getColor();
            this.getMainAdditional();
            this.getMainAdditionalSub();
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

