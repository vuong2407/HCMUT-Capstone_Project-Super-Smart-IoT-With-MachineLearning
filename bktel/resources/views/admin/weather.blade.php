@extends('layouts.dashboard')

@section('content')
<div >
    <weather-component
        :current= "{{json_encode($current)}}"
    ></weather-component>
</div>
@endsection