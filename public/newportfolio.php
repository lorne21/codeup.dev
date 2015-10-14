<html>
<head>
	<title>Lorne's Page</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<style>
*{
  margin: 0 auto;
  box-sizing: border-box;
}
.slider{
  margin: 20px 20px 0 0;
}
.cube{
  width: 40px;
  perspective: 600px;
  transition: all 1s cubic-bezier(0.175,0.885,0.320,1.275);
  float: right;
  margin: 1px;
}
.cube .container{
  width: 40px;
  height: 200px;
  transform-style: preserve-3d;
  transition: all 1s cubic-bezier(0.175,0.885,0.320,1.275);
}
.cube .side{
  height: 200px;
  position: absolute;
  border: solid 1px #ccc;
  backface-visibility: hidden;
}
.cube .front{
  width: 40px;
  cursor: pointer;
  background-position: center right;
}
.cube .container .left{
  width: 400px;
  overflow: hidden;
  transform: rotateY(-90deg) translateZ(200px) translateX(-200px);
}
.cube.active .container{
  transform: rotateY(90deg);
}
.cube.pre-active{
  margin-right: 400px;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).on('click', '.cube .front', function() {
  var cube = $(this).closest('.cube');
  $('.slider .cube').removeClass('active pre-active');
  cube.next('.cube').addClass('pre-active');
  cube.addClass('active');
});
</script>
</head>
<body>
	<div class="slider">
	    <div class="cube active">
	      <div class="container">
	        <div class="side front" style="background-image: url(http://demo.aparnet.ir/3d-list-transform/final/1.png);"></div>
	        <div class="side left"><img src="http://demo.aparnet.ir/3d-list-transform/final/1.png" /></div>
	      </div>
	    </div>
	    <div class="cube pre-active">
	      <div class="container">
	        <div class="side front" style="background-image: url(http://demo.aparnet.ir/3d-list-transform/final/2.png);"></div>
	        <div class="side left"><img src="http://demo.aparnet.ir/3d-list-transform/final/2.png" /></div>
	      </div>
	    </div>
	    <div class="cube">
	      <div class="container">
	        <div class="side front" style="background-image: url(http://demo.aparnet.ir/3d-list-transform/final/3.png);"></div>
	        <div class="side left"><img src="http://demo.aparnet.ir/3d-list-transform/final/3.png" /></div>
	      </div>
	    </div>
	    <div class="cube">
	      <div class="container">
	        <div class="side front" style="background-image: url(http://demo.aparnet.ir/3d-list-transform/final/8.jpg);"></div>
	        <div class="side left"><img src="http://demo.aparnet.ir/3d-list-transform/final/8.jpg" /></div>
	      </div>
	    </div>
	    <div class="cube">
	      <div class="container">
	        <div class="side front" style="background-image: url(http://demo.aparnet.ir/3d-list-transform/final/7.jpg);"></div>
	        <div class="side left"><img src="http://demo.aparnet.ir/3d-list-transform/final/7.jpg" /></div>
	      </div>
	    </div>
	</div>
</body>
</html>