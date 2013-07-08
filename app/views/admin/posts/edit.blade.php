@extends('admin.templates.modal')

{{-- Extra CSS styles --}}
@section('syles')
<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')

	<div class="page-header">
		<h3>{{ $meta['title'] }}</h3>
	</div>

	<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		<li><a href="#tab-meta-data" data-toggle="tab">Meta Data</a></li>
	</ul>
	<!-- ./ tabs -->

	{{-- Edit a post form --}}
	<!-- Form -->
	{{ Former::horizontal_open()
		->id('edit')
		->rules($rules)
		->method('PUT')
		->action('admin/posts/' . $post->id) }}

	{{ Former::token() }}

	{{-- For some weird reason "Former::populate($post)" does not work here!! No clue why need to look into --}}

	{{-- Dirty Fix: --}}
	{{ Former::populateField('title', $post->title) }}
	{{ Former::populateField('slug', $post->slug) }}
	{{ Former::populateField('content', $post->content) }}
	{{ Former::populateField('meta_title', $post->meta_title) }}
	{{ Former::populateField('meta_description', $post->meta_description) }}
	{{ Former::populateField('meta_keywords', $post->meta_keywords) }}


		@include('admin.posts.form')

    <textarea type="hidden" id="content" name="content" style="display:none;"></textarea>
	{{ Former::close() }}
	<!-- ./ form -->

@stop

{{-- Extra JavaScripts --}}
@section('scripts')
<script type="text/javascript">
    $(function(){
        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'],
                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function (idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
            });
            $('a[title]').tooltip({container:'body'});
            $('.dropdown-menu input').click(function() {return false;})
                .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
                .keydown('esc', function () {this.value='';$(this).change();});

            $('[data-role=magic-overlay]').each(function () {
                var overlay = $(this), target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });
            if ("onwebkitspeechchange"  in document.createElement("input")) {
                var editorOffset = $('#editor').offset();
                $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
            } else {
                $('#voiceBtn').hide();
            }
        };
        function showErrorAlert (reason, detail) {
            var msg='';
            if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
            else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
        };
        initToolbarBootstrapBindings();
        $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
        window.prettyPrint && prettyPrint();

        // Put div content into a text input.
        $('#form-actions .btn-primary').click(function (e) { $('#content').html($('#editor').html()); });
    });
</script>
@stop