@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
                @foreach($users as $user)
                    <div class="col-4">
                        <div class="media">
                           <img src="{{ asset('/uploads/1.png') }}" width="70" class="ml-3 rounded-circle" alt="...">
                            <div class="media-body ml-3">
                                <h5 class="mt-0 mb-1">
                                    <a href="{{ route('user.gallery', $user->id) }}">
                                        {{ $user->name }}
                                    </a>
                                </h5>
                                <a href="{{ route('user.gallery', $user->id) }}" class="btn btn-info">Show gallery</a>
                                <button class="btn btn-success">Follow</button>
                            </div>
                        </div>
                    </div>
                @endforeach
           </div>
        </div>
    </div>
@endsection