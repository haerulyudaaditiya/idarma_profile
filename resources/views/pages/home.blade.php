@extends('layouts.home.main')
@section('content')
    <main class="main">
        @include('pages.sections.hero')
        @include('pages.sections.vision-and-misions')
        @include('pages.sections.services')
        @include('pages.sections.organization')
        @include('pages.sections.portfolio')
        @include('pages.sections.testimonials')
        @include('pages.sections.recent-posts')
        @include('pages.sections.contacts')
    </main>
@endsection
