<div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Pixel</h1>
            </div>

           
    <label for="formGroupExampleInput" class="form-label">FaceBook</label>     
<div class="input-group mb-3">
    <?php

        $select_pixel = $getdata->select_pixel(5);
        foreach($select_pixel as $sp){
    ?>
        <input type="number" class="form-control" id="code_id" value="<?php echo $sp['p_face']; ?>" placeholder="Pixel code" aria-label="Recipient's username" aria-describedby="button-addon2">
    <?php
        }
    ?>
    
    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="updata_pixel()">Lưu</button>
</div>



<script>

       
    function updata_pixel(){

        const id = 5
        const code_id = document.getElementById('code_id').value
        $.ajax({
            type:'post',
            url: 'php/pixel/update_pixel.php',
            data:{
                id:id,
                code:code_id
            }
        })
    }
</script>
