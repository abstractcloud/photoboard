<template>
    <div>
        <button class="btn btn-success" data-toggle="modal" data-target="#gallery">Add Photo</button>
            <div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form method="post" enctype="multipart/form-data" :action="gallery_store">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" required class="form-control" id="title" name="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="private">Is Private?</label>
                                <input type="checkbox" checked id="private" name="private">
                            </div>
                            <div class="form-group">
                                <label for="img" class="btn btn-info">Upload</label>
                                <input type="file" class="d-none" id="img" name="image">
                            </div>
                            <input type="hidden" name="_token" :value="csrf">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            gallery_store: "",
            csrf: ""
        }
    },

    created() {
        this.gallery_store = window.server.gallery_store;
        this.csrf = window.server.csrf_token;
    }
}
</script>