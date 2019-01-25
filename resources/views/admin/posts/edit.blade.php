@extends('layouts.admin')
@section('styles')
<link href="{{ asset('css/slim.min.css') }}" rel="stylesheet" type="text/css" />
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
  var editor_config = {
    path_absolute : "/essence/public/",
    selector: "#body",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@stop
@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Posts</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">Edit Post</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop

@section('content')
{!! Form::model($post, ['method'=> 'PATCH', 'action' => ['PostsController@update', $post->id], 'files'=>true]) !!}
<div class="row m-portlet" style="padding-top: 20px; padding-bottom:20px">
	<div class="col-md-6">
		<div class="form-group">
		    {!! Form::label('title', 'Title*') !!}
		    {!! Form::text('title', null, ['class'=>'form-control', 'required' => 'required']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('category_id', 'Category*') !!}
		    {!! Form::select('category_id', [''=> 'Choose Categories'] + $categories,null, ['class'=>'form-control', 'required' => 'required']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('status', 'Status') !!}
		    {!! Form::select('status', array( 0 => 'Draft', 1=> 'Publish'), null , ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('tags', 'Tags') !!}
		    {!! Form::textarea('tags', null, ['class'=>'form-control','rows' => 9 ]) !!}
		</div>

	</div>
	<div class="col-md-6">	
		<div class="form-group">
		    <div class="slim"
		         data-label="Thumbnail"
		         data-max-file-size=1
		         data-save-initial-image=true
		         data-size="800,600"
		         data-ratio="4:3">
		        <input type="file" name="slim[]" required />
		        <img src="{{URL::asset( $post->photo->file)}}">
		    </div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
		    {!! Form::label('body', 'Content*') !!}
		    {!! Form::textarea('body', null, ['class'=>'form-control', 'id' => 'body']) !!}
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group pull-right">
		    {!! Form::submit('Save Post', ['class'=>'btn btn-primary']) !!}
		</div>
	
{!! Form::close() !!}

{!! Form::open(['method'=> 'DELETE', 'action' => ['PostsController@destroy', $post->id ]]) !!}
	    <div class="form-group pull-left">
	        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger pull-right']) !!}
	    </div>
{!! Form::close() !!}
	</div>
</div>
<div style="clear:both; "></div>
@stop
@section('scripts')
<!--begin::Page Vendors -->
		<script src="{{ asset('js/slim.kickstart.min.js') }}" type="text/javascript"></script>
@stop