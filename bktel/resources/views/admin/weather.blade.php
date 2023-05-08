@extends('layouts.dashboard')

@section('content')
<div >
    <weather-component
        :current= "{{json_encode($current)}}"
        :forecast= "{{json_encode($forecast)}}"
    ></weather-component>
</div>
@endsection