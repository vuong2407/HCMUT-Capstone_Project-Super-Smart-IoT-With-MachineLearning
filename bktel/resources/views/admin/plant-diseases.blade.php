@extends('layouts.dashboard')

@section('content')
<div >
    <plant-diseases-component
    :predict-disease-url =  "'{{ route('predictDisease') }}'" 
    ></plant-diseases-component>
</div>
@endsection