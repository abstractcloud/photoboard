@extends('layouts.app')

<style>
    .message-board {
        height: 400px;
    }
</style>
@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-10">
                <div class="message-board">
                
                </div>

                <div class="send-msg">
                        <input type="text" class="msg">
                        <button data-name="{{ $name }}" class="send btn btn-success">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection