<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<?php use App\Traits\ImageT; ?>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak audio',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | media | image',
        images_upload_url: "{{ route('image.upload') }}",
        file_picker_types: 'image',
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        forced_root_block: false,
        images_file_types: 'jpg,svg,webp,jpeg',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
            };
            input.click();
        },
        image_title: true,
        automatic_uploads: true
    });
</script>
