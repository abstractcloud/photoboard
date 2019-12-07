<template>
  <div>
    <div class="modal-body">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" required class="form-control" id="title" ref="title" placeholder="Title" />
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" ref="description" placeholder="Description"></textarea>
      </div>
      <div class="form-group">
        <label for="private">
          <input type="checkbox" checked id="private" ref="private" class="filled-in" />
          <span>Private?</span>
        </label>
      </div>
      <div class="form-group">
        <label for="img" class="btn btn-info">Upload</label>
        <input type="file" class="d-none" id="img" ref="image" v-on:change="handleImageUpload()" />
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" v-on:click="submitForm()">Save changes</button>
    </div>
  </div>
</template>

<script>
import Photo from "./PhotoComponent.vue";
import Vue from "vue";
export default {
  methods: {
    handleImageUpload() {
      // this.image = this.$refs.image.files[0];
    },
    submitForm() {
      let formData = new FormData();

      formData.append("title", this.$refs.title.value);
      formData.append("description", this.$refs.description.value);
      formData.append("private", this.$refs.private.value);
      formData.append("image", this.$refs.image.files[0]);

      axios
        .post("/gallery", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          this.renderImage(response.data);
        })
        .catch(function() {
          console.log("Fail");
        });

      $("#gallery").modal("hide");
      this.$refs.title.value = null;
      this.$refs.description.value = null;
      this.$refs.private.value = null;
      this.$refs.image.value = null;
    },

    renderImage(image) {
      var PhotoClass = Vue.extend(Photo);
      var instance = new PhotoClass({
        propsData: { photo_data: image }
      });
      instance.$mount();
      $("#gallery-content").append(instance.$el);

      var elem = document.querySelector(".grid");
      var msnry = new Masonry(elem, {
        // options
        itemSelector: ".grid-item",
        columnWidth: 300
      });
    }
  }
};
</script>