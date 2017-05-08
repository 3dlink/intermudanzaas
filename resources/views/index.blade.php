<!DOCTYPE html>
<html>
<head>
	<title>Intermudanzas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	{!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

	{!! HTML::style('/css/flip.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

	{!! HTML::style('css/toastr.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

	{!! HTML::style('/css/styles.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

	{!! HTML::style('/css/responsive.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

	{!! HTML::style('/css/slick.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

	{!! HTML::style('/css/slick-theme.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

	{!! HTML::style('/font-awesome-4.7.0/css/font-awesome.min.css', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

</head>
<body>

	<div class="clearfix">
		<section id="home" class="home">
			<div class="home-menu">
				<nav class="mobile-menu-holder desktop-hidden">
					<ul class="menu">
						<a class="item-link"><li class="menu-item item-selected" onclick="changeSelectedMobile(0)">Inicio</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelectedMobile(1)">Nosotros</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelectedMobile(2)">Beneficios</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelectedMobile(3)">Mudanzas Internacionales</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelectedMobile(4)">Galería</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelectedMobile(5)">Contacto</li></a>
					</ul>
				</nav>

				<div class="intermudanzas"><a href="{{url('/home')}}">INTERMUDANZAS</a></div>
				<nav class="menu-holder desktop-hidden burguer"><img src="images/burguer.png"></nav>
				
				<nav class="menu-holder mobile-hidden">
					<ul class="menu">
						<a class="item-link"><li class="menu-item item-selected" onclick="changeSelected(0)">Inicio</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelected(1)">Nosotros</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelected(2)">Beneficios</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelected(3)">Mudanzas Internacionales</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelected(4)">Galería</li></a>
						<a class="item-link"><li class="menu-item" onclick="changeSelected(5)">Contacto</li></a>
					</ul>
				</nav>
			</div>
			<div id="home-slider" class="home-slider">
				<div class="slide1 slide">
					<img class="logo" src="images/LOGO.png">
				</div>
				<div class="slide2 slide">
					<div class="slide-quote">
						<img src="images/qtizq.png" class="quote-open-1">
						<span class="quote-line1">APRENDEMOS Y EVOLUCIONAMOS</span><br>
						<span class="quote-line2">CON LA TECNOLOGÍA</span>
						<img src="images/qtder.png" class="quote-close-1">
					</div>
				</div>
				<div class="slide3 slide">
					<div class="slide-quote">
						<img src="images/qtizq.png" class="quote-open-2">
						<span class="quote-line1">SU MUDANZA ES</span><br>
						<span class="quote-line2">NUESTRA RESPONSABILIDAD</span>
						<img src="images/qtder.png" class="quote-close-2">
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class="clearfix">
		<section id="nosotros" class="quienes-somos">
			<div class="grid-100 quienes-somos-left">
				<img class="quienes-somos-fondo mobile-hidden" src="images/fondo_quienessomos.png">

				<div class="grid-60 quienes-somos-contenido mobile-grid-100">
					<h3 class="quienes-somos-title title">Quiénes somos</h3>
					<p class="quienes-somos-span">Intermudanzas C.A. de Venezuela es una empresa venezolana de origen y capital colombiano, creada en 1.995 con animo de satisfacer las necesidades del rubro más delicado y complejo del transporte internacional, las mudanzas internacionales de hogares, empresa, funcionarios y diplomáticos.</p>
					<p class="quienes-somos-span">En Intermudanzas C.A. nos gusta mucho lo que hacemos, por eso lo hacemos muy bien. Cada día aprendemos y evolucionamos con la tecnología, para liberar lo mas valioso que tiene el hombre, el tiempo, Intermudanzas C.A. es libertad, sosiego, tranquilidad, seguridad, somos lo únicos que garantizamos no saqueos, perdidas ni robos.</p>

					<button class="quienes-somos-terminosYcondiciones">Términos y Condiciones</button>
				</div>

				<div class="grid-60 quienes-somos-contenido-2 mobile-grid-100">
					<div  id="terminosYcondiciones" class="content">
						<h4 class="terminos-y-condiciones-title">Términos y condiciones</h4>
						<p class="terminos-y-condiciones-p p-title">Por su seguridad verifique:</p>
						<p class="terminos-y-condiciones-p">
							El valor de su mudanza deberá ser cobrado según la negociación:<br>
							1. Factura legal en bsf, Intermudanzas CA RIF. : J30284779-6<br>
							2. Cuenta de cobro en Dolares US$. Intermudanzas CA<br>
							3. Factura régimen simplificado en pesos en Colombia, Antonio Rodriguez.<br>
							4. Los certificados de pago usted los deberá enviar a contabilidad: pagos@intermudanzas.com.<br>
							5. Sus correos solo deben ser dirigidos a xxx@intermudanzas.com.<br>
							Si no cumple estos requisitos su mudanza es gratis.<br>
							Intermudanzas no responde por negocios realizados por terceros que dicen ser representantes.<br>
							Le recomendamos antes de transferir solicitar verificación con su código asignado de 4 dígitos.<br>
							No permita por ningún motivo que su mudanza salga de su hogar sin la respectiva lista de chequeo y cada paquete tenga en hoja carta la etiqueta de identificación, que incluye su código y No de pieza o paquete y el logo y RIF. que garantiza que es una mudanza hecha por Intermudanzas C.A.<br>
						</p>
						<div class="separador"></div>
						<p class="terminos-y-condiciones-p">
							Intermudanzas C.A. de Venezuela, no tiene subsidiarias, agentes corresponsales, intermediarios, todos sus correos son corporativos, @intermudanzas.com.<br>
							Informe cualquier acto sospechoso. Tel: +57-315-787-6633 voz o whatsApp.<br>
							Una oferta de bajo precio puede resultar un error grave, ese es el atractivo, no la realidad.<br>
							Debido a la alta demanda y dificultad de coneccion vía tel, le rogamos dejar mensaje, o llenar el formulario de contacto.
						</p>
						<p class="terminos-y-condiciones-p p-title">Para su seguridad, hay personas que se hacen pasar por funcionarios de Intermudanzas C.A.</p>
						<p class="terminos-y-condiciones-p">
							Intermudanzas C.A. de Venezuela, no avala, no responde, ni garantiza servicios realizados o contratados por personal que trabajo en tiempos pasados.<br>Si desea verificar que su servicio si esta protegido por intermudanzas CA de Venezuela, por favor llame al +57-315-787-6633 o escriba al email: antonio.rodriguez@intermudanzas.com
						</p>
						<p class="terminos-y-condiciones-p p-title">Politica de privacidad</p>
						<p class="terminos-y-condiciones-p">
							Intermudanzas C.A. No vende, no intercambia, no cede, no revela, ni utiliza, con interés comercial, la información personal recopilada en este sitio.<br>
							La información personal se solicita y utiliza con su permiso únicamente para procesar sus solicitudes de manera eficaz. </p>
						</div>
						<img class="quienes-somos-contenido-2-close" src="images/x-close.png">
					</div>
				</div>
			</section>
		</div>

		<div class="clearfix">
			<section id="beneficios" class="beneficios">
				<div class="grid-100 mobile-grid-100">
					<h3 class="beneficios-title title">Beneficios</h3>

					<div class="beneficios-content clearfix">
						<div class="grid-20 beneficio-container servicios-vip fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder"><img class="beneficio-img" src="images/servicios_vip.png"></div>
							<h4 class="beneficio-name">SERVICIOS VIP</h4>
						</div>

						<div class="grid-20 beneficio-container alianzas-estrategicas fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/alianzas_estrategicas.png">
							</div>
							<h4 class="beneficio-name">ALIANZAS <br> ESTRATÉGICAS</h4>
						</div>

						<div class="grid-20 beneficio-container dtd-services fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/dtd_service.png">
							</div>
							<h4 class="beneficio-name">DOOR TO DOOR <br> SERVICE</h4>
						</div>

						<div class="mobile-clearfix tablet-clearfix"></div>

						<div class="grid-20 beneficio-container mudanza-maritima fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/mudanza_maritima.png">
							</div>
							<h4 class="beneficio-name">MUDANZA MARÍTIMA</h4>
						</div>

						<div class="grid-20 beneficio-container tramites-aduaneros fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/tramites_aduaneros.png">
							</div>
							<h4 class="beneficio-name">TRÁMITES <br> ADUANEROS</h4>
						</div>


						<div class="clearfix mobile-hidden tablet-hidden"></div>

						<div class="grid-20 beneficio-container confianza fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/confianza.png">
							</div>
							<h4 class="beneficio-name">CONFIANZA</h4>
						</div>

						<div class="mobile-clearfix tablet-clearfix"></div>

						<div class="grid-20 beneficio-container precio-beneficio fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/precio_beneficio.png">
							</div>
							<h4 class="beneficio-name">PRECIO <br> BENEFICIO</h4>
						</div>

						<div class="grid-20 beneficio-container honestidad fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/honestidad.png">
							</div>
							<h4 class="beneficio-name">HONESTIDAD</h4>
						</div>

						<div class="grid-20 beneficio-container garantia fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/garantia.png">
							</div>
							<h4 class="beneficio-name">GARANTÍA</h4>
						</div>

						<div class="mobile-clearfix tablet-clearfix"></div>

						<div class="grid-20 beneficio-container clientes-felices fleft mobile-grid-30 tablet-grid-30" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
							<div class="beneficios-img-holder">
								<img class="beneficio-img" src="images/clientes_felices.png">
							</div>
							<h4 class="beneficio-name">CLIENTES FELICES</h4>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="clearfix">
			<section id="mudanzas" class="mudanzas">
				<div class="grid-100">
					<h3 class="mudanzas-title title">Mudanzas Internacionales</h3>
					<p class="mudanzas-flecha"><img src="images/flechaabajo.png"></p>

					<div class="mudanzas-container">
						<div class="grid-33 tab-fix fleft mobile-grid-100 tablet-grid-50 mobile-clearfix">
							<div class="flip">
								<div class="flip_items">
									<div id="" class="pais1 box pais front">
										<div class="table">
											<div class="front-content">
												<h3 class="flip-title title">Colombia</h3>
												<p class="front-p"><i>VER <span class="flip-simbolo">+</span></i></p>
											</div>
										</div>
									</div>
									<div class="box pais back pais1">
										<div class="mask_flip">
											<div class="mudanzas-back">
												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  copia tetur adipiscing elit.  copiatetur adipiscing elit.  copia</span><br>
												<div class="separador"></div>

												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span><br>
												<div class="separador"></div>


												<button class="mudanzas-saber-mas">SABER MÁS</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="grid-33 tab-fix fleft mobile-grid-100 tablet-grid-50 mobile-clearfix tablet-clearfix">
							<div class="flip">
								<div class="flip_items">
									<div id="" class="pais2 box pais front">
										<div class="table">
											<div class="front-content">
												<h3 class="flip-title title">Venezuela</h3>
												<p class="front-p"><i>VER <span class="flip-simbolo">+</span></i></p>
											</div>
										</div>
									</div>
									<div class="box pais back pais2">
										<div class="mask_flip">
											<div class="mudanzas-back">
												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  copia tetur adipiscing elit.  copiatetur adipiscing elit.  copia</span><br>
												<div class="separador"></div>

												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span><br>
												<div class="separador"></div>


												<button class="mudanzas-saber-mas">SABER MÁS</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="grid-33 tab-fix fleft mobile-grid-100 tablet-grid-50 mobile-clearfix">
							<div class="flip">
								<div class="flip_items">
									<div id="" class="pais3 box pais front">
										<div class="table">
											<div class="front-content">
												<h3 class="flip-title title">Ecuador</h3>
												<p class="front-p"><i>VER <span class="flip-simbolo">+</span></i></p>
											</div>
										</div>
									</div>
									<div class="box pais back pais3">
										<div class="mask_flip">
											<div class="mudanzas-back">
												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  copia tetur adipiscing elit.  copiatetur adipiscing elit.  copia</span><br>
												<div class="separador"></div>

												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span><br>
												<div class="separador"></div>


												<button class="mudanzas-saber-mas">SABER MÁS</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="clearfix tablet-hidden"></div>

						<div class="grid-33 tab-fix fleft mobile-grid-100 tablet-grid-50 mobile-clearfix tablet-clearfix">
							<div class="flip">
								<div class="flip_items">
									<div id="" class="pais4 box pais front">
										<div class="table">
											<div class="front-content">
												<h3 class="flip-title title">Panamá</h3>
												<p class="front-p"><i>VER <span class="flip-simbolo">+</span></i></p>
											</div>
										</div>
									</div>
									<div class="box pais back pais4">
										<div class="mask_flip">
											<div class="mudanzas-back">
												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  copia tetur adipiscing elit.  copiatetur adipiscing elit.  copia</span><br>
												<div class="separador"></div>

												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span><br>
												<div class="separador"></div>


												<button class="mudanzas-saber-mas">SABER MÁS</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="grid-33 tab-fix fleft mobile-grid-100 tablet-grid-50 mobile-clearfix">
							<div class="flip">
								<div class="flip_items">
									<div id="" class="pais5 box pais front">
										<div class="table">
											<div class="front-content">
												<h3 class="flip-title title">Estados Unidos</h3>
												<p class="front-p"><i>VER <span class="flip-simbolo">+</span></i></p>
											</div>
										</div>
									</div>
									<div class="box pais back pais5">
										<div class="mask_flip">
											<div class="mudanzas-back">
												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  copia tetur adipiscing elit.  copiatetur adipiscing elit.  copia</span><br>
												<div class="separador"></div>

												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span><br>
												<div class="separador"></div>


												<button class="mudanzas-saber-mas">SABER MÁS</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="grid-33 tab-fix fleft mobile-grid-100 tablet-grid-50 mobile-clearfix tablet-clearfix">
							<div class="flip">
								<div class="flip_items">
									<div id="" class="pais6 box pais front">
										<div class="table">
											<div class="front-content">
												<h3 class="flip-title title">Brasil</h3>
												<p class="front-p"><i>VER <span class="flip-simbolo">+</span></i></p>
											</div>
										</div>
									</div>
									<div class="box pais back pais6">
										<div class="mask_flip">
											<div class="mudanzas-back">
												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  copia tetur adipiscing elit.  copiatetur adipiscing elit.  copia</span><br>
												<div class="separador"></div>

												<img class="mudanzas-back-flecha" src="images/flechaderecha.png">
												<span class="mudanzas-back-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span><br>
												<div class="separador"></div>


												<button class="mudanzas-saber-mas">SABER MÁS</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
		</div>

		<div class="clearfix">
			<section id="galeria" class="galeria">
				<div class="grid-100 clearfix mobile-grid-100">
					<h3 class="mudanzas-title title">Galería</h3>
					<p class="mudanzas-flecha"><img src="images/flechaabajo.png"></p>

					<div class="galeria-holder clearfix">
						<img class="flecha flecha-izq" src="images/flechaizq.png">
						<img class="flecha flecha-der" src="images/flechader.png">


						<div class="galeria-slide outer outer-left mobile-grid-100 tablet-hidden" data-index="0" style="background-image: url('images/fondo_outer.png');">0</div>
						<div class="galeria-slide inner inner-left mobile-grid-100" data-index="1" style="background-image: url('images/fondo_inner.png');">1</div>
						<div class="galeria-slide middle mobile-grid-100" data-toggle="modal" data-target="#galeria-image" data-index="2" style="background-image: url('images/fondo_middle.png');">2</div>
						<div class="galeria-slide inner inner-right mobile-grid-100" data-index="3" style="background-image: url('images/fondo_inner.png');">3</div>
						<div class="galeria-slide outer outer-right mobile-grid-100 tablet-hidden" data-index="4" style="background-image: url('images/fondo_outer.png');">4</div>

					</div>
				</div>
			</section>
		</div>

		<div class="clearfix">
			<div id="contacto" class="contacto">
				<div class="grid-100 clearfix mobile-grid-100 contacto-left">
					<div class="grid-50 form-container contact-form fleft mobile-grid-100">
						<div class="grid-50 fleft contact-container mobile-grid-100 tablet-grid-100">
							<label class="contact-form-label">Nombre</label><br>
							<input class="contact-form-input" type="text" name="nombre" id="nombre">
						</div>
						<div class="grid-50 fleft contact-container mobile-grid-100 tablet-grid-100">
							<label class="contact-form-label">Apellido</label><br>
							<input class="contact-form-input" type="text" name="apellido" id="apellido">
						</div>

						<div class="grid-50 fleft contact-container mobile-grid-100 tablet-grid-100">
							<label class="contact-form-label">E-mail</label><br>
							<input class="contact-form-input" type="email" name="email" id="email">
						</div>

						<div class="grid-50 fleft contact-container mobile-grid-100 tablet-grid-100">
							<label class="contact-form-label">Teléfono</label><br>
							<input class="contact-form-input" type="text" name="telefono" id="telefono">
						</div>

						<div class="grid-100 contact-container mobile-grid-100">
							<label class="contact-form-label">Mensaje</label><br>
							<textarea class="contact-form-input" rows="3" id="mensaje"></textarea>
							<br>
							<span class="contact-warning">Todos los campos son obligatorios</span>
						</div>
						<div class="grid-100 contact-container mobile-grid-100" style="text-align: center;">
							<button class="contact-submit">ENVIAR</button>
						</div>
					</div>
					<div class="grid-50 fleft contact-right mobile-grid-100">
						<img class="contact-logo" src="images/intermudanzas-logo.png">
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<footer class="footer">
			<div class="grid-50 footer-span footer-span-left fleft mobile-grid-100 tablet-grid-100">Sedes: Venezuela-Colombia-Ecuador-Panamá-Estados Unidos-Brasil</div>
			<div class="grid-50 footer-span footer-span-right fleft mobile-grid-100 tablet-grid-100">+58-212 905-6316  &ensp; / &ensp;  0414-704-9758 &ensp;  /&ensp;  0212 905 6389</div>

			<div class="clearfix"></div>

			<div class="social-media grid-100">
				SÍGUENOS&nbsp;
				<i class="fa fa-facebook-square fa-lg social-icon" aria-hidden="true"></i>&ensp;
				<i class="fa fa-instagram fa-lg social-icon" aria-hidden="true"></i>
			</div>

		</footer>

		<div id="galeria-image" class="modal fade in" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="img-holder"></div>
					</div>
				</div>
			</div>
		</div>


		{!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', array('type' => 'text/javascript')) !!}
		{!! HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('type' => 'text/javascript')) !!}
		{!! HTML::script('/js/scrollTo.js', array('type'=> 'text/javascript')) !!}
		{!! HTML::script('/js/slick.js', array('type'=> 'text/javascript')) !!}
		{!! HTML::script('/js/toastr.min.js') !!}
		{!! HTML::script('/js/script.js', array('type'=> 'text/javascript')) !!}

	</body>
	</html>