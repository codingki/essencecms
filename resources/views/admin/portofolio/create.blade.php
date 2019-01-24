@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/slim.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">.file-drop-area label {
  display: block;
  padding: 2em;
  background: #eee;
  text-align: center;
  cursor: pointer;
}</style>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#body'
  });
  </script>

@stop

@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Portofolio</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">Create Portofolio</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop

@section('content')

{!! Form::open(['method'=> 'POST', 'action' => 'PortofolioController@store', 'files'=>true]) !!}
<div class="row">
	
	<div class="col-md-3">
		<label>Logo/Client Photo*</label>
    	<div class="slim"
	         data-label="Drop logo here"
	         data-max-file-size=1
	         
	         data-ratio="free">
	        <input type="file" name="logo[]" required/>
	    </div>
	    <label>Thumbnail*</label>
    	<div class="slim"
	         data-label="Drop thumbnail here"
	         data-max-file-size=1
	         data-size="500,500"
	         data-ratio="1:1">
	        <input type="file" name="thumbnail[]" required/>
	    </div>
	</div>
	
	<div class="col-md-9">
		<div class="form-group">
		    {!! Form::label('title', 'Client/Brand Name*') !!}
		    {!! Form::text('title', null, ['class'=>'form-control', 'required' => 'required']) !!}
		</div>		
		<div class="form-group">
		    {!! Form::label('month', 'Month*') !!}
		    {!! Form::text('month', null, ['class'=>'form-control', 'required' => 'required']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('category', 'Category Project*') !!}
		    {!! Form::text('category', null, ['class'=>'form-control', 'required' => 'required']) !!}
		</div>	
			
		
		<div class="form-group">
		    {!! Form::label('description', 'About the project*') !!}
		    {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 4, 'id' => 'body']) !!}
		</div>
		<div class="row">

			<div class="col-md-6">		
				<div class="form-group">
				    {!! Form::label('facebook', 'Facebook Link') !!}
				    {!! Form::text('facebook', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
				    {!! Form::label('instagram', 'Instagram Link') !!}
				    {!! Form::text('instagram', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
				    {!! Form::label('twitter', 'Twitter Link') !!}
				    {!! Form::text('twitter', null, ['class'=>'form-control']) !!}
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    {!! Form::label('linkedin', 'Linkedin Link') !!}
				    {!! Form::text('linkedin', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
				    {!! Form::label('youtube', 'Youtube Link') !!}
				    {!! Form::text('youtube', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
				    {!! Form::label('website', 'Website Link') !!}
				    {!! Form::text('website', null, ['class'=>'form-control']) !!}
				</div>
			</div>

		</div>
		
	</div>
	<div class="col-md-12">
		<div class="form-group">
		    {!! Form::label('video', 'Video Portofolio Project Link') !!}
		    {!! Form::text('video', null, ['class'=>'form-control']) !!}
		</div>
		<div class="file-drop-area">
			
			<label for="files">Drop your images/photos portofolio here</label>
			<input name="slim[]" id="files" type="file" multiple>
		</div>
	</div>

	<div class="col-md-12" style="padding-top:20px;">
		<div class="form-group pull-right">
		    {!! Form::submit('Create Portofolio', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>	
	
</div>
{!! Form::close() !!}
@stop
@section('scripts')
<script src="{{ asset('js/slim.kickstart.min.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
			// 1. Handling the various events
// - get references to different elements we need
// - listen to drag, drop and change events
// - handle dropped and selected files

// get a reference to the file drop area and the file input
var fileDropArea = document.querySelector('.file-drop-area');
var fileInput = fileDropArea.querySelector('input');
var fileInputName = fileInput.name;

// listen to events for dragging and dropping
fileDropArea.addEventListener('dragover', handleDragOver);
fileDropArea.addEventListener('drop', handleDrop);
fileInput.addEventListener('change', handleFileSelect);

// need to block dragover to allow drop
function handleDragOver(e) {
  e.preventDefault();
}

// deal with dropped items,
function handleDrop(e) {
  e.preventDefault();
  handleFileItems(e.dataTransfer.items || e.dataTransfer.files);
}

// handle manual selection of files using the file input
function handleFileSelect(e) {
  handleFileItems(e.target.files);
}

// 2. Handle the dropped items
// - test if the item is a File or a DataTransferItem
// - do some expectation matching

// loops over a list of items and passes
// them to the next function for handling
function handleFileItems(items) {
  var l = items.length;
  for (var i=0; i<l; i++) {
    handleItem(items[i]);
  }
}

// handles the dropped item, could be a DataTransferItem
// so we turn all items into files for easier handling
function handleItem(item) {

  // get file from item
  var file = item;
  if (item.getAsFile && item.kind =='file') {
    file = item.getAsFile();
  }

  handleFile(file);
}

// now we're sure each item is a file
// the function below can test if the files match
// our expectations
function handleFile(file) {

  
  // you can check if the file fits all requirements here
  // for example:
  // if file is bigger then 1 MB don't load
  if (file.size > 1000000) {
    return;
  }
  

  // if it does, create a cropper
  createCropper(file);
}

// 3. Create the Image Cropper
// - create an element for the cropper to bind to
// - add the element after the drop area
// - creat the cropper and bind the remove button so it
//   removes the entire cropper when clicked.

// create an Image Cropper for each passed file
function createCropper(file) {

  // create container element for cropper
  var cropper = document.createElement('div');

  // insert this element after the file drop area
  fileDropArea.parentNode.insertBefore(cropper, fileDropArea.nextSibling);

  // create a Slim Cropper
  Slim.create(cropper, {
    ratio: 'free',
    defaultInputName: fileInputName,
    didInit: function() {

      // load the file to our slim cropper
      this.load(file);

    },
    didRemove: function() {

      // detach from DOM
      cropper.parentNode.removeChild(cropper);

      // destroy the slim cropper
      this.destroy();

    }
  });

}

// 4. Disable the file input element

// hide file input, we can now upload with JavaScript
fileInput.style.display = 'none';

// remove file input name so it's value is
// not posted to the server
fileInput.removeAttribute('name');
		</script>
@stop