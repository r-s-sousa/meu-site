<script src="<?= asset('vendor/ckeditor/build/ckeditor.js'); ?>"></script>
<script>
   ClassicEditor
      .create(document.querySelector('.editor'), {

         toolbar: {
            items: [
               'heading',
               '|',
               'undo',
               'redo',
               '|',
               'fontColor',
               'fontBackgroundColor',
               'fontSize',
               'fontFamily',
               '|',
               'alignment',
               'outdent',
               'indent',
               '|',
               'bold',
               'italic',
               'horizontalLine',
               '|',
               'link',
               '|',
               'bulletedList',
               'numberedList',
               '|',
               'imageUpload',
               '|',
               'blockQuote',
               '|',
               'insertTable',
               '|',
               'mediaEmbed',
               '|',
               'exportPdf',
               'exportWord'
            ]
         },
         language: 'pt-br',
         image: {
            toolbar: [
               'imageTextAlternative',
               'imageStyle:inline',
               'imageStyle:block',
               'imageStyle:side'
            ]
         },
         table: {
            contentToolbar: [
               'tableColumn',
               'tableRow',
               'mergeTableCells'
            ]
         },
         licenseKey: '',



      })
      .then(editor => {
         window.editor = editor;
      })
      .catch(error => {
         console.error('Oops, something went wrong!');
         console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
         console.warn('Build id: rnmm111hw9nv-du128bviaios');
         console.error(error);
      });
</script>