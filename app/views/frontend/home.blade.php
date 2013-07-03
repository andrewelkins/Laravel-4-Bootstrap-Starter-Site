@extends('frontend.templates.default')

{{-- Extra CSS styles --}}
@section('syles')
	<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h1>Welcome to the NovelCMS</h1>
	</div>

<!-- Flex Slider starts -->

<div class="container flex-main">
    <div class="row">
        <div class="span12">

            <div class="flex-image flexslider">
                <ul class="slides">
                    <!-- Each slide should be enclosed inside li tag. -->

                    <!-- Slide #1 -->
                    <li>
                        <!-- Image -->
                        <img src="assets/img/novel/photos/l1.jpg" alt="" />
                        <!-- Caption -->
                        <div class="flex-caption">
                            <!-- Title -->
                            <h3>God's Own Theme</h3>
                            <!-- Para -->
                            <p>Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. </p>
                        </div>
                    </li>

                    <!-- Slide #2 -->
                    <li>
                        <img src="assets/img/novel/photos/l2.jpg" alt="" />
                        <div class="flex-caption">
                            <h3>Powerful and Professional</h3>
                            <p>Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. </p>
                        </div>
                    </li>

                    <li>
                        <img src="assets/img/novel/photos/l3.jpg" alt="" />
                        <div class="flex-caption">
                            <h3>Its a Revolution</h3>
                            <p>Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. </p>
                        </div>
                    </li>

                    <li>
                        <img src="assets/img/novel/photos/l4.jpg" alt="" />
                        <div class="flex-caption">
                            <h3>Lowest Price in Market</h3>
                            <p>Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. </p>
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
                    <!-- Title and Para -->
                    <h5>Professional Product Ever Made in Internet</h5>
                    <p>Sed diam nisi, pulvinar vitae molestie vitae molestie hendreri hendrerit, venenatis eget mauris.</p>
                </div>
            </div>
            <div class="span4">
                <div class="ctas">
                    <!-- List -->
                    <ul>
                        <li>Very Cheap in Market. Check it today.</li>
                        <li>Professional and Powerful. Don't miss it.</li>
                        <li>1000% Guanrantee. No Worries. No Probs.</li>
                    </ul>
                </div>
            </div>
            <div class="span3">
                <div class="ctas">
                    <!-- Button -->
                    <div class="button"><a href="#">Buy it Today for $99</a></div>
                    <p>limited period offer</p>
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