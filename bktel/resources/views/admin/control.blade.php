@extends('layouts.dashboard')

@section('content')
<div >
    <control-component
    :user = "{{ json_encode ($user )}}"
    ></control-component>
</div>
@endsection