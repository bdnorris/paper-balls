//$(document).foundation()
/*
Dropzone.autoDiscover = false;

var myDropzone = new Dropzone("#dzone", {
//$("#dropzone").dropzone({
  //url: "upload.php",
  maxFilesize: 10,
  acceptedFiles: "image/png, image/gif, image/jpeg, application/pdf",
  uploadMultiple: true
});
*/


Dropzone.options.dzone = {
  //paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 25, // MB
  /*accept: function(file, done) {
    if (file.name == "justinbieber.jpg") {
      done("Naha, you don't.");
    }
    else { done(); }
  }*/

  acceptedFiles: "image/png, image/gif, image/jpeg, application/pdf",
  //uploadMultiple: true,
  /*init: function() {
    this.on("successmultiple", function() {
      console.log("Success");
    });
    this.on("error", function () {
        //alert('Upload Error');
        alert("Upload Error");
    });
  }*/
}
