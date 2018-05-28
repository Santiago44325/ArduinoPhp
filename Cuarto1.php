//testando o git 
<html><!-- InstanceBegin template="Templates/design_template.dwt" codeOutsideHTMLIsLocked="true" -->
	<head>
		<!-- InstanceBeginEditable name="doctitle" -->
		<title>Sistema de Control de la Vivienda</title>
		<!-- InstanceEndEditable -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
		<!-- InstanceBeginEditable name="head" -->
		<!-- InstanceEndEditable -->
	</head>
	<body>
	
		<div class="bannerArea">
			<div class="container">
				<div class="bannernav"><a href="#" >Privacy Policy</a> &bull; <a href="#" >Contacto</a> &bull; <a href="#" >Site Map</a></div>
				<div class="toplogo"><a href="#"><img src="images/banner_logo.gif" border="0" /></a></div>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div class="topnavigationArea">
			<div class="container"> 
				<div class="topnavigationgroup">
					<ul id="MenuBar1" class="MenuBarHorizontal">
					<li><a href="arduino.php">Home</a></li>
						<li><a class="MenuBarItemSubmenu" href="#">Cuartos</a>
							<ul>
								<li><a href="#">CUARTO 1</a></li>
								<li><a href="#">Cuarto 2</a></li>
								<li><a href="#">Cuarto 3</a></li>
							</ul>
						</li>
						<li><a class="MenuBarItemSubmenu" href="#">Salas</a>
							<ul>
								<li><a href="#">CUARTO 1</a></li>
								<li><a href="#">Cuarto 2</a></li>
								<li><a href="#">Cuarto 3</a></li>
							</ul>
						</li>
						
						<li><a class="MenuBarItemSubmenu" href="#">Vacio</a>
							<ul>
								<li><a class="MenuBarItemSubmenu" href="#">vacio</a>
									<ul>
										<li><a href="#">vacio</a></li>
										<li><a href="#">vacio</a></li>
									</ul>
								</li>
								<li><a href="#">Vacio</a></li>
								<li><a href="#">Vacio</a></li>
							</ul>
						</li>
						<li style="border-right-style: solid;"><a href="#">Vacio</a></li>
					</ul>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div class="contentArea">
			<div class="container"><!-- InstanceBeginEditable name="content" -->
				<div class="contentleft">
					<?php
 $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
 // Se conecta ao IP e Porta:
 socket_connect($sock,"169.254.218.235", 83);

 // Executa a ação correspondente ao botão apertado.

   if(isset($_POST['bits'])){
   $msg = $_POST['bits'];
   // fora
   if(isset($_POST['Fora' ])) {   if($msg[0]=='1')  {   $msg[0]='0';  } else  {   $msg[0]='1';  } }
   //quarto1
   if(isset($_POST['Quarto1'])) {   if($msg[1]=='1')  {   $msg[1]='0';  } else  {   $msg[1]='1'; } }
   //quarto2
   if(isset($_POST['Quarto2'])) {   if($msg[2]=='1')  {    $msg[2]='0'; } else  {   $msg[2]='1'; } }
   //Sala
   if(isset($_POST['Sala' ])) {   if($msg[3]=='1')  {   $msg[3]='0';  } else  {   $msg[3]='1'; } }
 //Quarto 3
   if(isset($_POST['quarto3' ])) {    if($msg[4]=='1') {   $msg[4]='0';  } else  {   $msg[4]='1';  } }
 //Quarto 4
   if(isset($_POST['quarto4' ])) {   if($msg[5]=='1')  {   $msg[5]='0'; } else  {   $msg[5]='1';  } }
  //Quarto5 
   if(isset($_POST['quarto5' ])) {    if($msg[6]=='1') {   $msg[6]='0';  } else  {   $msg[6]='1'; } }
//Alarma
	  // -------------------------------------------------------------------------------

   if(isset($_POST['Pequeno']))
 { 
   $msg = 'P#'; 
 }
   if(isset($_POST['Grande' ]))
 {
   $msg = 'G#'; 
 }
   socket_write($sock,$msg,strlen($msg));
 }

  socket_write($sock,'R#',2); //Requisita o status do sistema.

 //  if(isset($_POST['alarme' ])) {    if($msg[7]=='1') {   $msg[7]='0';  } else  {   $msg[7]='1'; } }
					//---------------------------------------------------
// Espera e lê o status e define a cor dos botões de acordo.

   $status = socket_read($sock,10);
   if (($status[8]=='L')&&($status[9]=='#')) 
 {
   if ($status[0]=='0') $cor1 = "gris";   else   $cor1 = "lightgreen";
   if ($status[1]=='0') $cor2 = "gris";   else   $cor2 = "lightgreen";
   if ($status[2]=='0') $cor3 = "gris";   else   $cor3 = "lightgreen";   
   if ($status[3]=='0') $cor4 = "gris";   else   $cor4 = "lightgreen";   
   if ($status[4]=='0') $cor5 = "gris";  else   $cor5 = "lightgreen";   
   if ($status[5]=='0') $cor6 = "gris";   else   $cor6 = "lightgreen";   
   if ($status[6]=='0') $cor7 = "gris";   else   $cor7 = "lightgreen";
   if ($status[7]=='0') $cor8 = "gris";   else   $cor8 = "lightgreen";
   
echo "<form method =\"post\" action=\"cuarto1.php\">";

echo "<input type=\"hidden\" name=\"bits\" value=\"$status \">";

echo "<button style=\"width:170; Height:50; background-color: $cor1 ;font: bold 14px Arial\" type = \"Submit\" Name = \"Fora\">Lampara 1</button>&nbsp&nbsp&nbsp";
            
echo "<button style=\"width:170;Height:50; background-color: $cor2 ;font: bold 14px Arial\" type = \"Submit\" Name = \"Quarto1\">Ventilador</button>&nbsp&nbsp&nbsp";

echo "<button style=\"width:170;Height:50; background-color: $cor3 ;font: bold 14px Arial\" type = \"Submit\" Name = \"Quarto2\">Cuarto 1</button>&nbsp&nbsp&nbsp";

echo "<button style=\"width:170;Height:50; background-color: $cor4 ;font: bold 14px Arial\" type = \"Submit\" Name = \"Sala\">Cuarto 2</button>&nbsp&nbsp&nbsp";

echo "<button style=\"width:170;Height:50; background-color: $cor5 ;font: bold 14px Arial\" type = \"Submit\" Name = \"quarto3\">Cuarto 3</button>&nbsp&nbsp&nbsp";

echo "<button style=\"width:170;Height:50; background-color: $cor6 ;font: bold 14px Arial\" type = \"Submit\" Name = \"quarto4\">Cuarto 4</button>&nbsp&nbsp&nbsp";

echo "<button style=\"width:170;Height:50; background-color: $cor7 ;font: bold 14px Arial\" type = \"Submit\" Name = \"quarto5\">Cuarto 5</button>&nbsp&nbsp&nbsp";

echo "<button style=\"width:170;Height:50; background-color: $cor8 ;font: bold 14px Arial\" type = \"Submit\" Name = \"alarme\">Lig/Delig Alarme</button>&nbsp&nbsp&nbsp";

echo "<button style=\"width:170;Height:50;font: bold 14px Arial\" type = \"Submit\"Name = \"Pequeno\">Portón Pequeño</button>&nbsp&nbsp&nbsp";

echo "<button style=\"width:170;Height:50;font: bold 14px Arial\" type = \"Submit\"Name = \"Grande\">Portón Grande</button>&nbsp&nbsp&nbsp";


echo "</form>";

 }
 // Caso ele não receba o status corretamente, avisa erro.
 else { echo "Falha ao receber status da casa."; }
 socket_close($sock);
 ?>
				</div>
			<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="sidebar" -->
			<div class="contentright">
				UTILIZACION:
                 EL SISTEMA DE GERENCIAMIENTO DE TU RESIDENCIA, ES MUY FACIL DE SE USAR, EN LOS BUTONES QUE ESTAN A LA DERECHA .....				
				
				
 
			</div>
			<!-- InstanceEndEditable -->
			<div style="clear:both;"></div>
			</div>
		</div>
		<div class="footerArea">
			<div class="container"> 
					<div class="copyright">&copy; 2014 Rosario Company.  Todos los Derechos Reservados.</
			</div>
		</div>
		
		<script type="text/javascript">
		<!--
		var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
		//-->
		</script>
	</body>
<!-- InstanceEnd --></html>
