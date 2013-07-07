@extends('frontend.templates.default')

{{-- Extra CSS styles --}}
@section('styles')
	<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')
<!-- Flex Slider starts -->

<div class="container flex-main">
    <div class="row">
        <div class="span12">

            <div class="flex-image flexslider">
                <ul class="slides">
                    <!-- Each slide should be enclosed inside li tag. -->
                    <li>
                        <img src="http://placehold.it/940x350" alt="" />
                        <div class="flex-caption">
                            <h3>NovelCMS</h3>
                            <p>Laravel 4 based CMS. Perfect introduction in to Laravel 4 development.</p>
                        </div>
                    </li>

                    <li>
                        <img src="http://placehold.it/940x350" alt="" />
                        <div class="flex-caption">
                            <h3>Easy</h3>
                            <p>Laravel 4 is an elegant PHP framework. Download NovelCMS to get busy working with it.</p>
                        </div>
                    </li>

                    <li>
                        <img src="http://placehold.it/940x350" alt="" />
                        <div class="flex-caption">
                            <h3>Speed</h3>
                            <p>NovelCMS enhances your development workflow by taking care of tedious CRUD actions.</p>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</div>

<!-- Flex slider ends -->

<!-- CTA Starts -->

<div class="cta">
    <div class="container">
        <div class="row">
            <div class="span5">
                <div class="ctas">
                    <h5>NovelCMS is the easiest way to get started with Laravel</h5>
                    <p>
                        It provides a perfect starting application for Laravel 4.
                        It is a fully functioning application, providing your application a solid foundation.
                    </p>
                </div>
            </div>
            <div class="span4">
                <div class="ctas">
                    <!-- List -->
                    <ul>
                        <li>Laravel 4</li>
                        <li>Built with professional developers in mind.</li>
                        <li>Use when speed, quality, and ease of use are important.</li>
                    </ul>
                </div>
            </div>
            <div class="span3">
                <div class="ctas">
                    <!-- Button -->
                    <div class="button"><a href="https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/archive/master.zip">Download it Today - FREE</a></div>
                    <p>Follow the project on <a href="https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site">Github</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Ends -->

<!-- Recent posts carousel starts -->

<div class="recent-posts">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h4 class="title">Recent Posts</h4>
                <div class="carousel_nav pull-left">
                    <!-- Carousel navigation -->
                    <a class="prev" id="car_prev" href="#"><i class="icon-chevron-left"></i></a>
                    <a class="next" id="car_next" href="#"><i class="icon-chevron-right"></i></a>
                </div>
                <div class="clearfix"></div>
                <ul class="rps-carousel">
                    @foreach ($posts as $post)
                    <li>
                        <div class="rp-item">
                            <!-- Image. -->
                            <div class="rp-image">
                                <a href="{{{ $post->url() }}}"><img src="http://placehold.it/227x127" alt=""/></a>
                            </div>
                            <div class="rp-details">
                                <!-- Title and para -->
                                <h5><a href="{{{ $post->url() }}}">{{ String::title($post->title) }}</a></h5>
                                <p>{{ String::tidy(Str::limit($post->content, 30)) }}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Recent Posts ends -->

<!-- Clients starts -->
<div class="container">
    <div class="row">
        <div class="span12">
            <h4 class="title">Happy NovelCMS installations</h4>
            <!-- Clients images -->
            <div class="clients">
                <img src="http://placehold.it/150x55" alt="" />
                <img src="http://placehold.it/150x55" alt="" />
                <img src="http://placehold.it/150x55" alt="" />
                <img src="http://placehold.it/150x55" alt="" />
                <img src="http://placehold.it/150x55" alt="" />
                <img src="http://placehold.it/150x55" alt="" />
            </div>
        </div>
    </div>
</div>

<!-- Clients ends -->
@stop

{{-- Extra JavaScripts --}}
@section('scripts')
	<script type="text/javascript"></script>
@stop