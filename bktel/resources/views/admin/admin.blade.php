@extends('layouts.dashboard')

@section('content')
<div >
    <main-content-component
    :input-device = "{{ json_encode($data) }}"
    :save-input-data-url = "'{{ route('saveDataLm35') }}'" 
    :check-water-pump-url = "'{{ route('checkWaterPump') }}'" 
    ></main-content-component>
</div>
@endsection
