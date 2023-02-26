<?php 
session_start();
//koneksi ke database
include 'koneksi.php';
?>
<?php include'menu.php'; 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!--- link icon --->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--- link lightbox --->
	<link rel="stylesheet" type="text/css" href="lightbox.min.css" />
	<script src="lightbox-plus-jquery.min.js"></script>
	<!--- link animasi swiper --->
	<link rel="stylesheet" type="text/css" href="swiper.min.css" />
	<!--- link animasi tulisan --->
	<link rel="stylesheet" href="animate.css-master/animate.css" />
	<!-- font style -->
	<link href="https://fonts.googleapis.com/css?family=Acme|Creepster|Faster+One|Holtwood+One+SC|Sedgwick+Ave&display=swap" rel="stylesheet">  
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Zhi+Mang+Xing&display|Marvel=swap" rel="stylesheet">


	<title>BEYOUTIFUL : Tentang Kami</title>

	<style>


		<!--- animasi zoom --->
		.zoom {
			transition: transform .8s; /* Animation */
			margin: 0 auto;
		}
		.zoom:hover {
			transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
		}

		<!---- navbar ---->
		.dropdown-menu{
			display: none;
		}
		.dropdown:hover .dropdown-menu {
			display: block;
		}  
		.dropdown-item:hover {
			background-color:#009999;
		}


		<!---- parallax jumbotron ---->
		.jumbotron{
			background-attachment: fixed;
		}
		<!---- galeri ---->
		section.galeri {
			font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
			font-size: 14px;
			color:#000;
			margin: 0;
			padding: 0;
		}
		.card img:hover {
			filter: grayscale(100%);
			transform: scale(1.1);
			transition: 1s;
		}
		#watch:hover {
			background-color: #CCC;
		}

	</style>

</head>

<body>

 <!-- awal tentang kami -->

 <section class="mb-4 pt-4">
   <div class="container change">
     <div class="row">
       <div class="col-sm-12 text-center">
        <br><br><br>

		<div class="container">
			<h2 style="font-family:'Marvel', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7);">Tentang Kami</h2><hr>	

      </div>
    </div>
    <div class="row justify-content-center">
     <div class="col-sm-5 text-center">
       <p style="font-family: 'Marvel', sans-serif;">Merawat kesehatan kulit merupakan salah satu bagian dari menjaga kesehatan tubuh yang perlu dilakukan. Kulit yang bersih dan terawat, tentu akan memberikan tampilan yang lebih menarik. Bukan hanya itu, merawat kulit tubuh dan wajah secara teratur juga dapat mencegah berbagai masalah, seperti jerawat. Dalam hal ini, perawatan kulit dapat dilakukan dengan berbagai macam cara. Mulai dari menggunakan berbagai macam produk seperti produk sabun atau pembersih wajah, pelembap dengan kandungan tabir surya, hingga menggunakan masker wajah untuk memberikan nutrisi bagi kulit. Di samping itu, menggunakan produk scrub untuk mengangkat sel kulit mati pada wajah dan tubuh juga bisa dilakukan agar kulit tetap bersih dan terawat. Selain dapat menjaga kesehatan kulit dan meningkatkan penampilan yang lebih menarik, melakukan perawatan kulit juga memberikan berbagai manfaat bagi kesehatan mental. Meskipun sepele, kebiasaan merawat kulit ini diketahui dapat mengurangi risiko kecemasan hingga depresi. 
      </p>
    </div>
    <div class="col-sm-5 text-center">
     <p style="font-family: 'Marvel', sans-serif;">Bahkan, jika kebiasaan ini 
dilakukan sebagai rutinitas setiap hari dapat membantu meningkatkan mood lebih baik. Dilihat dari banyak manfaat dari merawat kulit, dewasa ini berbagai macam brand skincare muncul di masyarakat. Bahkan brand skincare lokal pun jumlahnya sudah tak terhitung, bersamaan dengan itu banyak dari brand tersebut yang menggantongi izin edar. Sebagian dari mereka menggunakan bahan kimia sehingga berpotensi merusak kulit. Hal ini membuat masyarakat khawatir dalam memilih skincare yang aman bagi kulit mereka. Hal inilah yang menjadi ide awal dibalik adanya website kami ini. Melalui website ini, kami berharap dapat manghapus rasa khawatir masyarakat dalam memilih jenis brand skincare yang aman bagi kulit mereka sekaligus sudah memiliki izin resmi dari pemerintah. Harapannya, dengan adanya website ini dapat menumbuhkan semangat masyarakat dalam merawat kulit mereka demgan produk yang aman dan teepercaya tanpa perlu khawatir dengan produk yang mengandung bahan kimia.
     </p>
   </div>
 </div>
</div>
</section>

<!-- akhir tentang kami -->

<!-- awal copyright -->
<div class="footer text-center" style="background-color:#FF6195; height: 54px; color: #FFF;  font-family:'Acme', sans-serif; text-shadow:1px 1px 1px rgba(0,0,0,0.7); margin-top: 52px;">
  <p style="padding-top: 16px">© Copyright By BEYOUTIFUL</p>
</div>
<!-- akhir copyright -->

	<!--- JS galeri --->

	<script type="text/javascript" src="swiper.min.js"></script>
	<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="parallaxie.js-master/parallaxie.js"></script>

	<script>
		<!-- scroll navbar -->



		<!-- animasi watch video -->
		$('#lokasi').on('mouseenter', function(){
			$(this).addClass('animated rubberBand infinite');
		})

		$('#lokasi').on('mouseleave', function(){
			$(this).removeClass('animated rubberBand infinite');
		})

		<!-- animasi icon dokter -->
		$('#dokter').on('mouseenter', function(){
			$(this).addClass('animated rubberBand infinite');
		})

		$('#dokter').on('mouseleave', function(){
			$(this).removeClass('animated rubberBand infinite');
		})
		<!-- animasi watch video -->
		$('#fasilitas').on('mouseenter', function(){
			$(this).addClass('animated rubberBand infinite');
		})

		$('#fasilitas').on('mouseleave', function(){
			$(this).removeClass('animated rubberBand infinite');
		})

		<!-- parallax -->  
		$('.jumbotron').parallaxie({
			speed: 0.5
		});


		<!-- swiper --> 
		var swiper = new Swiper('.swiper-container', {
			effect: 'coverflow',
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: 'auto',
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows : true,
			},
			pagination: {
				el: '.swiper-pagination',
			},
		});
	</script>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>



	<!-- GetButton.io widget -->
	<script type="text/javascript">
		(function () {
			var options = {
            whatsapp: "+6285338318819", // WhatsApp number
            call: "+6285338318819", // Call phone number
            call_to_action: "Hubungi Kami", // Call to action
            button_color: "#FF6195", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "call,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->


</body>
</html>