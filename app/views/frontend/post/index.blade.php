@extends('frontend.templates.default')

{{-- Extra CSS styles --}}
@section('syles')
	<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')
<div class="content blog">
    <div class="container">
        <div class="row">
            <div class="span8">
                <div class="posts">
@foreach ($posts as $post)
                <div class="entry">
                    <h2><a href="{{{ $post->url() }}}">{{ String::title($post->title) }}</a></h2>

                    <!-- Meta details -->
                    <div class="well well-small meta">
                        <i class="icon-calendar"></i> {{{ $post->date() }}}
                        <i class="icon-user"></i> {{{ $post->author->username }}}
                        <!--<i class="icon-folder-open"></i> <a href="#">General</a>-->
                        <span class="pull-right">
                            <i class="icon-comment"></i>
                            <a href="{{{ $post->url() }}}#comments">{{$post->comments()->count()}} {{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}</a>
                        </span>
                    </div>

                    <div class="media">
                        <!-- Thumbnail -->
                        <a href="{{{ $post->url() }}}" class="pull-left "><img src="http://placehold.it/150x113" alt="" class="img-polaroid"/></a>

                        <div class="media-body">
                            <p>{{ String::tidy(Str::limit($post->content, 200)) }}</p>
                            <div class="button"><a href="{{{ $post->url() }}}">Read More...</a></div>
                        </div>
                    </div>
                </div>
@endforeach

                {{ $posts->links() }}
                </div>
            </div>
            <div class="span4">
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Widget -->
                    <div class="widget">
                        <h4>Search</h4>
                        <form method="get" id="searchform" action="#" class="form-search">
                            <input type="text" value="" name="s" id="s" class="input-medium"/>
                            <button type="submit" class="btn">Search</button>
                        </form>
                    </div>
                    <div class="widget">
                        <h4>Recent Posts</h4>
                        <ul>
                            @foreach ($recentPosts as $post)
                            <li><a href="{{ $post->url() }}">{{ Str::limit(String::title($post->title), 50) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h4>About</h4>
                        <p>Nulla facilisi. Sed justo dui, id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>,velit at <a href="#">magna sollicitudin cursus</a> ac ultrices magna. Aliquam consequat, purus vitae auctor ullamcorper, sem velit convallis quam, a pharetra justo nunc et mauris. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{ $posts->links() }}

@stop

{{-- Extra JavaScripts --}}
@section('scripts')
	<script type="text/javascript"></script>
@stop