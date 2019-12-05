@extends('layouts.app')

@section('content')
   <div class="container-fluid">
       <div class="row">
           <div class="col-2">
               <profile></profile>
           </div>
           <div class="col-10">
               <gallery></gallery>
           </div>
       </div>
   </div>

   <script>
       window.server = {};
       window.server.csrf_token = "{{ csrf_token() }}";
       window.server.gallery_store = "{{ route('gallery.store') }}"
   </script>
@endsection