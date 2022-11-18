<div class="row">
    <div class="sectionImageBar">
      <?php
        if(isset($product)){
          $productImages = $productApi->selectProductImages($product[0]['productId']);
          for($i = 0;$i < count($productImages);$i++){
            echo '<div class="cardSectionImageBar col-xl-3">
                    <img class="miniatureImg" src="'.'data:image;base64,'.base64_encode($productImages[$i]["photo"]).'" alt="Lights" onclick="displayImage(this);">
                  </div>';
          }
        }
      ?>
    </div>
</div>

<div class="containerImg">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <img id="expandedImg" 
        style="
            width: auto;
            max-width: 40em;
            height: auto;
            max-height: 18em;
            
            display: block;
            margin-left: auto;
            margin-right: auto;"
            >
    <div id="imgtext"></div>
</div>

<script>
function displayImage(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>
