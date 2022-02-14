<script>
    //Image Show Before Upload Start
    function showImage(data, imgId){
      if(data.files && data.files[0]){
        var obj = new FileReader();

        obj.onload = function(d){
          var image = document.getElementById(imgId);
          image.src = d.target.result;
        };
        obj.readAsDataURL(data.files[0]);
      }
    }
    //Image Show Before Upload End
</script>
