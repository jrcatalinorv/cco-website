<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Catalino & Co </title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/maruti-login.css" />
    </head>
    <body>
        <div id="loginbox">            
            <div style="background-color:#fff" id="loginform" class="form-vertical">
				 <div class="control-group normal_text"> <h3> Area de Clientes </h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input id="user" type="text" placeholder="Usuario" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input id="pass" type="password" placeholder="Clave" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
 
                    <span id="login" class="pull-right"><button class="btn btn-success" > Acceder </button></span>
                </div>
            </div>
        
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/maruti.login.js"></script> 
		<script type="text/javascript">
var input = document.getElementById("pass");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("login").click();
  }
});


$('#login').click(function(){
	var usuario = $('#user').val();
	var clave = $('#pass').val();
$.getJSON('config/login.php',{
		user:usuario,
		pass:clave	
	},function(data){
	 switch(data['ok'])
		{
			case 1: location.href=""+data['route']+"/home.php"; break;
			case 2: 
				$('#user').val(''); 
				$('#pass').val(''); 
				$('#wrong-text').removeClass('Hideme'); 
			
			break;
			case 3: alert("Hubo un error con la conexion"); break;
			case 4: alert("La cuenta esta desabilitada o fuera de servicio favor contactar con el equipo de soporte"); break;
		}
	});
});	

$('#user').focus(function(){ $('#wrong-text').addClass('Hideme'); });
$('#pass').focus(function(){ $('#wrong-text').addClass('Hideme'); });
</script>  

    </body>

</html>
