@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <specific-student-component :student="{{$student}}"></specific-student-component>
            
    </div>
</div>
@endsection