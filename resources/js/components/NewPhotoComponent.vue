<template>
  <div>
    <button class="btn btn-success" data-toggle="modal" data-target="#gallery">Add Photo</button>
    <div
      class="modal fade"
      id="gallery"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Photo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <StorePhotoForm></StorePhotoForm>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import StorePhotoForm from "./StorePhotoFormComponent.vue";
export default {
  components: { StorePhotoForm },
};
</script>

<style scoped>
    #gallery {
        background-color: inherit;
        width: auto;
        max-height: 100%;
    }
</style>