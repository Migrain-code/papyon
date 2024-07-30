@extends('front-end.layouts.master')
@section('title', $page->title)
@section('styles')

@endsection
@section('content')
    <section class="faq">
        <div class="title">{{$page->title}}</div>
        <div class="container">
            {!! $page->description !!}
        </div>
    </section>

@endsection

@section('scripts')

@endsection
