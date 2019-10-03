<script>
    $function(){
        $("#upload").change(function(){
          const file = $(this) [0].files[0]
          const fileReader = newFileReader()
          fileReader.onloadend = function(){
            $('#im').attr('src',fileReader.result)

          }  
          fileReader.readAsDataURL(file)
        })
                
    })
    </script>