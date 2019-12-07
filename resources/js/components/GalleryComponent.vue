<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <NewPhoto></NewPhoto>
      </div>
    </div>
    <div class="gallery grid mt-3" id="gallery-content" ref="gallery">
      <Photo v-for="photo in photos" :photo_data="photo" :key="photo.id"></Photo>
    </div>
  </div>
</template>

<script>
import Photo from "./PhotoComponent.vue";
import NewPhoto from "./NewPhotoComponent.vue";
import axios from "axios";

export default {
  name: "Gallery",
  components: { Photo, NewPhoto },
  data() {
    return {
      photos: []
    };
  },

  created() {
    axios.get("/api/gallery").then(response => {
      this.photos = response.data;
    });
    $grid.imagesLoaded().progress(function() {
      $grid.masonry("layout");
    });
  }
};
</script>