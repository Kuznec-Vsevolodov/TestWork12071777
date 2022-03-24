@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <lessons-general-component :lessons="{{$lessons}}"></lessons-general-component>
            
    </div>
</div>
@endsection
