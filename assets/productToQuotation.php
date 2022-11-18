<div class="d-grid gap-2">
    <button class="btn btn-success" type="button" onclick="myFunction();" <?php if(isset($product)){ if($product[0]['quantity'] == 0){ echo 'disabled';}}?>>Solicitar cotización</button>

    <br>
    
</div>