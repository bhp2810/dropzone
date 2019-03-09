<!DOCTYPE html>
<html lang="en">

  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
   
  </head>

  <body>
   <div id="dZUpload" class="dropzone">
      <div class="dz-default dz-message">Add Or Drag Files here</div>
  </div>
  <div align="center">
    <button type="button" class="btn btn-info" id="submit-all">Upload</button>
   </div>
  </body>

  <script>
      /*var myDropzone = new Dropzone("div#myId", {
        url: "upload.php"
      });*/
/*      $("div#myId").dropzone({
        url: "upload.php"
      });*/

  $(document).ready(function () {
    Dropzone.autoDiscover = false;
    $("#dZUpload").dropzone({
        url: "upload.php",
        addRemoveLinks: true,
        autoProcessQueue: false,
        parallelUploads: 20,
        init: function(){
           var submitButton = document.querySelector('#submit-all');
           myDropzone = this;
           submitButton.addEventListener("click", function(){
            myDropzone.processQueue();
           });
           this.on("complete", function(){
            if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
            {
             var _this = this;
             _this.removeAllFiles();
            }            
           });
          },
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            console.log("Successfully uploaded :" + imgName);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });
});


    </script>
