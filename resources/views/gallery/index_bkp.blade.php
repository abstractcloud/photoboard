@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(Auth::check())
                <button class="btn btn-success" data-toggle="modal" data-target="#gallery">Add Photo</button>
                @endif
            </div>
        </div>
       <div class="grid mt-3">
            @foreach($gallery as $item)
                <div class="grid-item">
                    <img src="{{ url('uploads/' . $item->path . '/' . $item->preview) }}">
                </div>
            @endforeach
        </div>
    </div>
    

<!-- Modal -->
<div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form method="post" enctype="multipart/form-data" action="{{ route('gallery.store') }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" required class="form-control" id="title" name="title" placeholder="Title">
{{--
                         @error($errors->has('title'))
                             <div class="alert alert-danger mt-2">{{ $errors->first('title') }}</div>
                         @enderror
--}}
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
                    
{{--
                        @error($errors->has('image'))
                            <div class="alert alert-danger mt-2">{{ $errors->first('image') }}</div>
                        @enderror
--}}
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                
                @csrf
            </form>
            
        </div>
    </div>
</div>

@if($errors->any())
    <script>
        $('#gallery').modal('show');
    </script>
@endif

@endsection