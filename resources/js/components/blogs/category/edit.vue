<template>
  <div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3"><h4 class="card-title">Sửa danh mục bài viết</h4></div>
                <div class="col-md-6"></div>
              </div>
              
              
              <!-- <p class="card-description">Basic form elements</p> -->
              <form class="forms-sample">
                <div class="form-group">
                  <vs-input
                    class="w-100"
                    v-model="objData.name[0].content"
                    font-size="40px"
                    label-placeholder="Tên danh mục"
                  />
                  <el-button size="small" @click="showSettingLangExist('name')">Đa ngôn ngữ</el-button>
                  <div class="dropLanguage" v-if="showLang.title == true">
                    <div class="form-group" v-for="item,index in lang" :key="index">
                      <label v-if="index != 0">{{item.name}}</label>
                      <input
                        v-if="index != 0"
                        type="text"
                        size="default"
                        placeholder="Tên danh mục"
                        class="w-100 inputlang"
                        v-model="objData.name[index].content"
                      />
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <vs-input
                    class="w-100"
                    v-model="objData.path"
                    font-size="40px"
                    label-placeholder="Link"
                  />
                </div> -->
                <div class="form-group">
                  <label>Nội dung</label>
                  <TinyMce v-model="objData.content[0].content" />
                  <el-button size="small" @click="showSettingLangExist('content')"
                    >Đa ngôn ngữ</el-button
                  >
                  <div class="dropLanguage" v-if="showLang.content == true">
                    <div
                      class="form-group"
                      v-for="(item, index) in lang"
                      :key="index"
                    >
                      <label v-if="index != 0">{{ item.name }}</label>
                      <TinyMce
                        v-if="index != 0"
                        v-model="objData.content[index].content"
                      />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Album</label>
                  <!-- <image-upload v-model="objData.avatar" type="avatar"></image-upload> -->
                  <ImageMulti v-model="objData.avatar" :title="'bai-viet'"/> 
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Trạng thái</label>
                  <vs-select v-model="objData.status"
                  >
                      <vs-select-item  value="2" text="Trang độc lập" />
                      <vs-select-item  value="1" text="Hiện" />
                      <vs-select-item  value="0" text="Ẩn" />
                    </vs-select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row fixxed">
        <div class="col-12">
          <div class="saveButton">
            <vs-button color="primary" @click="saveEdit()">Cập nhật</vs-button>
          </div>
        </div>
      </div>
    <!-- content-wrapper ends -->
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { required } from "vuelidate/lib/validators";
import TinyMce from "../../_common/tinymce";
import ImageMulti from "../../_common/upload_image_multi";
export default {
  data() {
    return {
      showLang:{
        title:false
      },
      errors:[],
      objData: {
        id:this.$route.params.id,
        name: [
          {
            lang_code:'vi',
            content:''
          }
        ],
        path: "",
        content: [
          {
            lang_code: 'vi',
            content: ''
          }
        ],
        avatar: [],
        status: "",
      },
      lang:[],
      img: ""
    };
  },
  components: {
    TinyMce,ImageMulti
  },
  methods: {
    ...mapActions(["getInfoCateBlog","saveCategoryBlog","listLanguage", "loadings"]),
    showSettingLangExist(value,name = "content"){
      if(value == "name"){
        this.showLang.title = !this.showLang.title
          this.lang.forEach((value, index) => {
              if(!this.objData.name[index] && value.code != this.objData.name[0].lang_code){
                  var oj = {};
                  oj.lang_code = value.code;
                  oj.content = ''
                  this.objData.name.push(oj)
              }
          });
      }
    },
    nameImage(event) {
      this.objData.avatar = event;
    },
    saveEdit() {
      this.errors = [];
      if(this.objData.name[0].content == '') this.errors.push('Tên không được để trống');
      if (this.errors.length > 0) {
        this.errors.forEach((value, key) => {
          this.$error(value)
        })
        return;
      } else {
        this.loadings(true);
        this.saveCategoryBlog(this.objData)
        .then(response => {
            this.loadings(false);
            this.$router.push({name: 'listCateBlog'});
            this.$success('Sửa danh mục thành công');
            this.$emit("closePopup", false);
          })
          .catch(error => {
            this.loadings(false);
            this.$error('Sửa danh mục thất bại');
          });
      }
    },
    listLang(){
      this.listLanguage().then(response => {
        this.loadings(false);
        this.lang  = response.data
      }).catch(error => {

      })
    },
    getInfoCates(){
      this.loadings(true);
      this.getInfoCateBlog(this.objData).then(response => {
        this.loadings(false);
        if(response.data == null){
          this.objData ={
            id:this.$route.params.id,
            name: [
              {
                lang_code:'vi',
                content:''
              }
            ],
            content: [
              {
                lang_code:'vi',
                content:''
              }
            ],
            path: "",
            avatar: [],
            status: "",
          }
        }else{
          this.objData = response.data;
          this.objData.name = JSON.parse(response.data.name);
          this.objData.avatar = JSON.parse(response.data.avatar);
          this.objData.content = JSON.parse(response.data.content);
        }
      }).catch(error => {
        console.log(12);
      });
    },
    changeLanguage(data){
      this.getInfoCates();
    }
  },
  mounted() {
    this.loadings(true);
    this.getInfoCates();
    this.listLang();
  }
};
</script>

<style>
</style>