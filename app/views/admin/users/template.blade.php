@extends('layouts.default')

{{-- Main CSS Files --}}
@section('css')
	{{ Basset::show('admin.css') }}
@stop

{{-- Extra CSS styles --}}
@section('syles')
	<style type="text/css"></style>
@stop

{{-- Web site Title --}}
@section('title')
	@parent :: {{{ $meta['title'] }}}
@stop

{{-- Meta Information --}}
@section('keywords')
	{{{ $meta['keywords'] }}}
@stop
@section('author')
	{{{ $meta['author'] }}}
@stop
@section('description')
	{{{ $meta['description'] }}}
@stop

{{-- Navigation Bar --}}
@section('navbar')
	@include('layouts.nav-admin')
@stop

@section('footer')
	@include('layouts.footer')
@stop

{{-- Main Javascript Files --}}
@section('js')
	{{ Basset::show('admin.js') }}
@stop

{{-- Extra JavaScripts --}}
@section('scripts')
	<script type="text/javascript"></script>
@stop