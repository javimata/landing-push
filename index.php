<?php
require_once "php/functions.php";
$config = getConfig();

	/*
	require __DIR__ . '/vendor/autoload.php';

	$options = array(
		'cluster' => 'us2',
		'useTLS' => true
	);
	$pusher = new Pusher\Pusher(
		'6104738ca9ecc29b55c6',
		'3d449381f1e24912b76d',
		'795469',
		$options
	);

	$data['message'] = 'hello world';
	$pusher->trigger('my-channel', 'my-event', $data);
	*/
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if ($config->info->descripcion != ""): ?>
		<meta name="description" content="<?php echo $config->info->descripcion; ?>">
		<?php endif; ?>
		<title><?php echo $config->info->titulo ?></title>

		<?php if( $config->configuracion->openGraph == 1 ): ?>
		<!-- Metas OG - Open Graph para contenido compartido en Facebook -->
		<meta property="og:title" content="<?php echo $config->info->titulo ?>">
		<meta property="og:type" content="article"/>
		<meta property="og:url" content="<?php echo validateUrl($config->info->url); ?>">
		<meta property="og:site_name" content="<?php echo $config->info->titulo; ?>">
		<meta property="og:description" content="<?php echo $config->info->descripcion; ?>">
		<meta property="og:image" content="<?php echo $config->info->url; ?><?php echo $config->info->logo ?>"/>
		<?php endif; ?>

		<?php if ( $config->configuracion->pwa == 1 ): ?>
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="theme-color" content="#4f3676">
		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<link rel="shortcut icon" type="image/png" href="./images/logo/logo_1024.png">
		<link rel="apple-touch-icon" href="./images/logo/logo_1024.png">
		<link rel="apple-touch-startup-image" href="./images/logo/logo_1024.png">
		<link rel="manifest" href="./manifest.json">
		<?php endif; ?>

		<?php if( $config->configuracion->pusher == 1 ): ?>
		<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
		<script>

			// Enable pusher logging - don't include this in production
			Pusher.logToConsole = true;

			var pusher = new Pusher('6104738ca9ecc29b55c6', {
				cluster: 'us2',
				forceTLS: true
			});

			var channel = pusher.subscribe('my-channel');
			channel.bind('my-event', function(data) {
				alert(JSON.stringify(data));
			});
		</script>		
		<?php endif; ?>

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
		<link rel="icon" href="images/favicon.png" type="image/x-icon">

		<?php if ( configFonts() != "" ): ?>
		<!-- GOOGLE FONT -->
		<link href="https://fonts.googleapis.com/css?family=<?php echo configFonts(); ?>" rel="stylesheet">
		<?php endif; ?>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" media="screen" href="dist/css/app.css">
		<link rel="stylesheet" media="screen" href="dist/css/styles.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php if ( $config->info->fbPixel != "" ): ?>
		<!-- Facebook Pixel Code -->
		<script async>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '<?php echo $config->info->fbPixel; ?>');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" alt="facebook pixel" style="display:none"
		src="https://www.facebook.com/tr?id=<?php echo $config->info->fbPixel; ?>&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<?php endif ?>

		<?php if ( $config->info->googleAnalytics != "" ): ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $config->info->googleAnalytics; ?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?php echo $config->info->googleAnalytics; ?>');
		</script>
		<!-- End Google Analytics -->
		<?php endif ?>

	</head>
	<body data-gotop="<?php echo $config->configuracion->gotop; ?>" data-popup="<?php echo $config->configuracion->popup; ?>">

		<?php if ( $config->configuracion->loading == 1 ): ?>
		<div class="loading">
			<div class="loading-logo"><img src="images/logo.png" alt="Loading" class="mb-1" width="151" height="70" class="img-fluid" /><br /><p>Cargando...</p></div>
		</div>
		<?php endif; ?>

		<?php if ( $config->contactos->whatsapp != "" ): ?>
		<div class="floating">
			<a href="https://wa.me/<?php echo cleanString($config->contactos->whatsapp); ?>" target="_blank" class="btn-floating">
				<img src="images/ico-float-whatsapp.png" class="img-fluid" width="72" height="72" />
			</a>
		</div>
		<?php endif; ?>

		<?php if ( $config->contactos->messenger != "" ): ?>
		<div class="floating-messenger">
			<a href="http://m.me/<?php echo $config->contactos->messenger; ?>" target="_blank" class="btn-floating">
				<img src="images/ico-float-messenger.png" class="img-fluid" width="72" height="72" />
			</a>
		</div>
		<?php endif; ?>

		<section id="header">
			
			<div class="container">
				<div class="row align-items-center py-1">

					<div class="col-5 col-lg-4">
						<a class="navbar-brand p-1" href="#" data-aos="fade-left" data-aos-delay="0">
							<img src="<?php echo $config->info->logo; ?>" alt="<?php echo $config->info->titulo; ?>" class="img-fluid" width="151" height="70" />
						</a>
					</div>
					<div class="col-7 col-lg-8">
						<nav class="navbar navbar-expand-lg float-right float-lg-none p-0" data-aos="fade-right" data-aos-delay="300">
							<button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#navbarMain2" aria-controls="navbarMain2" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon d-inline"><i class="fas fa-bars fa-lg"></i></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarMain">
								<ul class="navbar-nav w-100 justify-content-end align-items-end">
									<?php echo createMenu($config->menu, 'li'); ?>
									<?php foreach ($config->redes as $red): ?>
									<li class="nav-item"><a href="<?php echo $red->url ?>" target="_blank"><i class="<?php echo $red->icon ?> fa-lg"></i></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</nav>
					</div>		
					<div class="col-12 d-lg-none bg-menu">
						<div class="collapse navbar-collapse" id="navbarMain2">
							<ul class="navbar-nav w-100 align-items-center menu-movil">
								<?php echo createMenu($config->menu, 'li'); ?>
								<?php foreach ($config->redes as $red): ?>
								<li class="nav-item"><a href="<?php echo $red->url ?>" target="_blank"><i class="<?php echo $red->icon ?> fa-lg"></i></a></li>
								<?php endforeach; ?>
								<li class="nav-item"><span class="d-none d-xl-inline">Pide más Información al </span><i class="fas fa-phone"></i> <a href="tel:<?php echo cleanString($config->contactos->telefono); ?>"><?php echo $config->contactos->telefono; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		
		</section>

		<section id="slider">

			<?php include_once ('slider.php'); ?>
			
		</section>


		<section id="servicios" class="py-5">

			<header id="header-section" class="text-center mb-4" data-aos="fade-up" data-aos-delay="0">
				<h2 class="title-section">Servicios</h2>
			</header>

			<div class="container">
				<div class="row">
					
					<div class="col-sm-6 col-md-3">
						<div class="box-servicios text-center" data-aos="fade-up" data-aos-delay="300">
							<div class="box-servicios-icon mb-3">
								<span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-globe fa-stack-1x fa-inverse"></i>
								</span>
							</div>
							<div class="box-servicios-content">
								<h4 class="mb-2">Desarrollo web</h4>
								<p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="box-servicios text-center" data-aos="fade-up" data-aos-delay="600">
							<div class="box-servicios-icon mb-3">
								<span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-ad fa-stack-1x fa-inverse"></i>
								</span>
							</div>
							<div class="box-servicios-content">
								<h4 class="mb-2">Web marketing</h4>
								<p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="box-servicios text-center" data-aos="fade-up" data-aos-delay="900">
							<div class="box-servicios-icon mb-3">
								<span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-chalkboard-teacher fa-stack-1x fa-inverse"></i>
								</span>
							</div>
							<div class="box-servicios-content">
								<h4 class="mb-2">Consultoria web</h4>
								<p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="box-servicios text-center" data-aos="fade-up" data-aos-delay="1200">
							<div class="box-servicios-icon mb-3">
								<span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-mail-bulk fa-stack-1x fa-inverse"></i>
								</span>
							</div>
							<div class="box-servicios-content">
								<h4 class="mb-2">Social media</h4>
								<p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
							</div>
						</div>
					</div>

				</div>
			</div>

		</section>


		<section id="beneficios" class="py-5">

			<div class="container py-lg-5">
				<div class="row align-items-center">
					<div class="col-md-5 pb-3 pb-md-0">
						<img src="images/beneficios.jpg" alt="Beneficios" class="img-fluid" data-aos="fade-left" data-aos-delay="300" width="640" height="418">
					</div>
					<div class="col-md-7">
						<div class="box-content text-white" data-aos="fade-right" data-aos-delay="600">
							<h2 class="mb-1">Beneficios</h2>
							<span class="subtitle mb-3 d-block">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span>
							<div class="box-content-text"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio voluptate laudantium, magnam autem ratione id ipsam dolore atque asperiores? Iusto ipsam culpa accusantium quos nostrum eligendi unde cupiditate perspiciatis tempore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam quibusdam quaerat vero sed pariatur. </p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

		<section id="clientes" class="py-5">

			<div class="slider-logos py-2">

				<h2 class="mb-4 text-center">Algunos clientes</h2>

				<div class="slide-logos d-flex justify-content-around align-items-center">
					<?php $files = glob('images/logos/*.{jpg,png,gif}', GLOB_BRACE);
					foreach($files as $file):
						list($ancho, $alto) = getimagesize($file);
					?>
					<div><img src="<?php echo $file; ?>" class="img-fluid" alt="Logo" width="<?php echo $ancho; ?>" height="<?php echo $alto; ?>" /></div>
					<?php endforeach; ?>
				</div>

			</div>

		</section>

		<section id="contacto" class="py-5 text-white">
			
			<div class="container pt-md-4">
				<div class="row">
					<div class="col">

						<header id="header-section" class="text-center" data-aos="fade-up" data-aos-delay="300">
							<h4 class="title-section">¿Encontraste la opción que deseas?</h4>
						</header>

						<div class="box-form" data-aos="fade-up" data-aos-delay="600">
							<div class="form-text text-center mb-3">
								Es posible cotizar según tus necesidades, déjanos tus datos y te contactamos para presentarte una propuesta personalizada.
							</div>

							<?php createForm( $config->forms->cotiza ); ?>

						</div>

					</div>

				</div>
			</div>
		</section>

		<footer id="footer" class="pt-5 pb-3">
			
			<div class="container pt-md-4">
				<div class="row">
					<div class="col-12 col-lg-3 text-center text-lg-left">
						<div class="logo-footer">
							<img src="images/logo.png" alt="<?php echo $config->info->titulo; ?>" width="151" height="70" class="img-fluid">
						</div>
						<div class="redes-footer py-3">
							<ul class="list-inline">
								<?php foreach ($config->redes as $red): ?>
								<li class="list-inline-item"><a href="<?php echo $red->url ?>" target="_blank"><i class="<?php echo $red->icon ?> fa-lg"></i></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="col-12 col-lg-2 text-center text-lg-left mb-3 mb-lg-0">
						<ul class="navbar-nav w-100">
							<?php echo createMenu($config->menu, 'li'); ?>
						</ul>
					</div>
					<div class="col-12 col-lg-3 text-center text-lg-left">
						<div class="box-direccion-footer">

							<?php echo $config->contactos->direccion; ?><br>
							<div class="phone-footer mt-3">
								Teléfono y Whatsapp<br>
								<i class="fas fa-phone"></i> <a href="tel:<?php echo cleanString($config->contactos->telefono); ?>"><?php echo $config->contactos->telefono; ?></a>
							</div>

						</div>
					</div>
					<div class="col-12 col-lg-4 mt-5 mt-lg-0">
						<div class="form-title mb-3">
							<h5>Regístrate en nuestro Newsletter</h5>
						</div>
						<?php echo createForm( $config->forms->newsletter ); ?>
					</div>
				</div>
			</div>
		</footer>

		<section id="copyright">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="copy py-2">
							<?php echo replaceValues( $config->info->copyright ); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php if ( $config->configuracion->popup == 1 ): ?>
			<?php include_once "popup.php"; ?>
		<?php endif ?>

		<script src="dist/js/main.js"></script>
		<script defer src="dist/js/app.js"></script>

		<?php if ( $config->configuracion->gotop == 1 ): ?>
		<a href="#" class="scrollup" aria-label="">&nbsp;</a>
		<?php endif; ?>

		<?php if ( $config->configuracion->pwa == 1 ): ?>
		<script src="script_sw.js"></script>
		<?php endif; ?>

		<script async src="dist/js/bundle.js"></script>

	</body>
</html>