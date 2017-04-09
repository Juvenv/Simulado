/**
 * @author juven
 */


var simulado = function() {
	function editorTexto(seletor){
		tinymce.init({
		    selector: seletor,
		    plugins: [
		        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
		        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
		        'save table contextmenu directionality emoticons template paste textcolor'
		      ],
		      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
		      images_upload_url: '/questions/upload',
		      images_upload_base_path: '/',
		      automatic_uploads: true,
		      image_title: true,
		      file_picker_types: 'image file media', 
		      file_picker_callback: function(cb, value, meta) {
		    	    var input = document.createElement('input');
		    	    input.setAttribute('type', 'file');
		    	    input.setAttribute('accept', 'image/*');
		    	    
		    	    // Note: In modern browsers input[type="file"] is functional without 
		    	    // even adding it to the DOM, but that might not be the case in some older
		    	    // or quirky browsers like IE, so you might want to add it to the DOM
		    	    // just in case, and visually hide it. And do not forget do remove it
		    	    // once you do not need it anymore.

		    	    input.onchange = function() {
		    	      var file = this.files[0];
		    	      
		    	      // Note: Now we need to register the blob in TinyMCEs image blob
		    	      // registry. In the next release this part hopefully won't be
		    	      // necessary, as we are looking to handle it internally.
		    	      var id = 'blobid' + (new Date()).getTime();
		    	      var blobCache = tinymce.activeEditor.editorUpload.blobCache;
		    	      var blobInfo = blobCache.create(id, file);
		    	      blobCache.add(blobInfo);
		    	      
		    	      // call the callback and populate the Title field with the file name
		    	      cb(blobInfo.blobUri(), { title: file.name });
		    	    };
		    	    
		    	    input.click();
		    	  }
		  });
		
	}
	
	return {
		editor: editorTexto
	};
}();
  
simulado.editor('textarea');