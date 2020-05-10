@extends('layouts.app')

@section('title', 'Treatment in India made easy')


@section('content')
    @component('components.estimate') @endcomponent
    @component('components.departments') @endcomponent
    @component('components.why') @endcomponent
    @component('components.calltoaction') @endcomponent
@stop
