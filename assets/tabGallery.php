<style>
/* The grid: Four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
}

/* Style the images inside the grid */
.column img {
  opacity: 0.8; 
  cursor: pointer; 
}

.column img:hover {
  opacity: 1;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The expanding image container */
.containerImg {
  position: relative;
  display: none;
}

.miniatureImg{
    width: 5em;
    height: 5em;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}

.sectionImgBar {
    flex: 1;
    display: flex;
    overflow: auto;

    margin-bottom: 5em;
}
</style>

<!-- The four columns -->

<div class="row">
    <div class="sectionImgBar">
        <div class="column">
            <img class="miniatureImg" src="./resourses/dummy/maxter.jpg" alt="Lights" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img class="miniatureImg" src="./resourses/dummy/shiba1.jpg" alt="Snow" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img class="miniatureImg" src="./resourses/dummy/shiba2.jpg" alt="Mountains" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img class="miniatureImg" src="./resourses/dummy/shiba3.jpg" alt="Nature" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img class="miniatureImg" src="./resourses/dummy/shiba4.jpg" alt="Nature" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img class="miniatureImg" src="./resourses/dummy/shiba5.jpg" alt="Nature" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img class="miniatureImg" src="./resourses/dummy/shiba6.jpg" alt="Nature" onclick="myFunction(this);">
        </div>
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
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>
