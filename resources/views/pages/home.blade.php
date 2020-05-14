@extends('layouts.app')

@section('title', 'Treatment in India made easy')


@section('content')
    @component('components.navbar') @endcomponent
    @component('components.estimate') @endcomponent
    @component('components.departments') @endcomponent
    @component('components.hospitals') @endcomponent
    @component('components.why') @endcomponent
    @component('components.testimonials') @endcomponent
    @component('components.calltoaction') @endcomponent
    @component('components.footer') @endcomponent
@stop
