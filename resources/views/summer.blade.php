<!DOCTYPE html>
<html>
<head>
  <title>Título de la página</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
</head>
<body>
Cuerpo de la página <br>
<textarea name="edit" id="editor" cols="30" rows="10"></textarea>
</body>
</html>
<script src="/adminlte/plugins/summernote/summernote-bs4.min.js" defer></script>
<script>
    try{
         
        $(function () {
            // Summernote
            $('#editor').summernote();

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
              mode: "htmlmixed",
              theme: "monokai"
            });
          })
    }catch(e){
      console.log(e.message);
    }
    
  </script>  