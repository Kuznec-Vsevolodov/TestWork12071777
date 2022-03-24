@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <specific-lesson-component :lesson="{{$lesson}}"></specific-lesson-component>
            
    </div>
</div>
@endsection