<!-- Tabs Content -->
<div class="tab-content">

	<!-- Tab General -->
	<div class="tab-pane active" id="tab-general">

		<!-- Post Title -->
		{{ Former::text('title') }}
		<!-- ./ post title -->

		@if (Request::is('*/edit'))
		<!-- Post Slug -->
		{{ Former::text('slug') }}
		<!-- ./ post slug -->
		@endif
        <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
                <ul class="dropdown-menu">
                </ul>
            </div>
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                    <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                    <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                </ul>
            </div>
            <div class="btn-group">
                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
                <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
            </div>
            <div class="btn-group">
                <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
                <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
                <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
            </div>
            <div class="btn-group">
                <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
                <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
                <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
                <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
            </div>
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink" href="#"><i class="icon-link"></i></a>
                <div class="dropdown-menu">
                    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                    <button class="btn" type="button">Add</button>
                </div>
                <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

            </div>

            <div class="btn-group">
                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
            </div>
            <div class="btn-group">
                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
            </div>
            <!--<input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">-->
        </div>

        <div id="editor">
            {{ $post->content }}
        </div>

	</div>

    <!-- Meta Data tab -->
    <div class="tab-pane" id="tab-meta-data">
        <!-- Meta Title -->
        <div class="control-group {{{ $errors->has('meta-title') ? 'error' : '' }}}">
            <label class="control-label" for="meta-title">Meta Title</label>
            <div class="controls">
                <input type="text" name="meta-title" id="meta-title" value="{{{ Input::old('meta-title', isset($post) ? $post->meta_title : null) }}}" />
                {{{ $errors->first('meta-title', '<span class="help-inline">:message</span>') }}}
            </div>
        </div>
        <!-- ./ meta title -->

        <!-- Meta Description -->
        <div class="control-group {{{ $errors->has('meta-description') ? 'error' : '' }}}">
            <label class="control-label" for="meta-description">Meta Description</label>
            <div class="controls">
                <input type="text" name="meta-description" id="meta-description" value="{{{ Input::old('meta-description', isset($post) ? $post->meta_description : null) }}}" />
                {{{ $errors->first('meta-description', '<span class="help-inline">:message</span>') }}}
            </div>
        </div>
        <!-- ./ meta description -->

        <!-- Meta Keywords -->
        <div class="control-group {{{ $errors->has('meta-keywords') ? 'error' : '' }}}">
            <label class="control-label" for="meta-keywords">Meta Keywords</label>
            <div class="controls">
                <input type="text" name="meta-keywords" id="meta-keywords" value="{{{ Input::old('meta-keywords', isset($post) ? $post->meta_keywords : null) }}}" />
                {{{ $errors->first('meta-keywords', '<span class="help-inline">:message</span>') }}}
            </div>
        </div>
        <!-- ./ meta keywords -->
    </div>
    <!-- ./ meta data tab -->

</div>
<!-- ./ tabs content -->
<input type="hidden" id="content" name="content"/>

<!-- Form Actions -->
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset')
    ->id('form-actions') }}
<!-- ./ form actions -->