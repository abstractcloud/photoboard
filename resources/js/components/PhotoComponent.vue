<template>
  <div class="grid-item">
    <img width="300px" :src="getImageUrl()" alt />
  </div>
</template>

<script>
export default {
  props: ["photo_data"],

  mounted() {
    var elem = document.querySelector(".grid");
    var msnry = new Masonry(elem, {
      // options
      itemSelector: ".grid-item",
      columnWidth: 300
    });
  },

  methods: {
    getImageUrl() {
      return "/uploads/" + this.photo_data.path + "/" + this.photo_data.image;
    }
  }
};
</script>