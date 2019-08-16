<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ZapFantasma</title>



      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -70px;
	left: 0px;
	right: 0px;
	bottom: 0px;
	width: auto;
	height: auto;
	background-image: url(https://newevolutiondesigns.com/images/freebies/city-wallpaper-9.jpg);
	background-size: cover;
	-webkit-filter: blur(0px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -70px;
	left: 0px;
	right: 0px;
	bottom: 0px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 20px);
	left: calc(50% - 280px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: red !important;
  left: -20px;
}

.header2{
	position: absolute;
	top: calc(50% - 17px);
	left: calc(50% - 219px);
  opacity: 0.5;
	z-index: 2;
}

.header2 div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header2 div span{
	color: #cf4 !important;
  left: -20px;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 2px solid rgba(255,255,255,1);
	border-radius: 5px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 2px solid rgba(255,255,255,1);
	border-radius: 5px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 2px solid #fff;
	cursor: pointer;
	border-radius: 5px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
  top: 20px;
}

.login input[type=button]:hover{
	opacity: 1;
}

.login input[type=button]:active{
	opacity: 1;
}

.login input[type=text]:focus{
	outline: none;
	border: 2px solid rgba(255,0,70,1);
}

.login input[type=password]:focus{
	outline: none;
	border: 2px solid rgba(255,0,70,1);
}

.login input[type=button]:focus{
	outline: 2px solid blue;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,1);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,1);
}

input[type=submit]:hover {
  background-color: #5379fa;
}

input[type=submit] {
  width: 260px;
	height: 35px;
	background: transparent;
	border: 2px solid rgba(255,255,255,1);
	border-radius: 5px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 5px;
	margin-top: 10px;
}
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>ZAP<span>Fantasma</span></div>
    </div>
    <div class="header2">
			<div><span>Fantasma</span></div>
    </div>
		<br>
		<div class="login">

      <!-- Formulário de Login -->
        <form action="ope.php" method="post">
            <input type="text" name="login" id="login" placeholder="  Usuário " maxlength="25" />
            <input type="password" name="senha" id="senha" placeholder="  Senha "/>
            <input type="submit" value="Entrar">
        </form>
        <script>
        function envia()
                {
               	 var login = $("#login").val();
               	 var senha = $("#senha").val();

               	 alert(login+" - "+senha);

               	 var ob = {login:login, senha:senha};

                    $.ajax({
                      type: "POST",
                      url:"ope.php",
                      data: ob,
                      beforeSend: function(objeto){

                      },
                      success: function(data)
                      {

                       //$("#panel_respuesta").html(data);
                       //btn_listar_datos();

                       //setTimeout(function(){
                      //  location.reload();
                       //},2000);

                       //setTimeout(function(){
                      //  $("#panel_respuesta").html("");
                       //},2000);


                      }
                   });
                }
</script>
		</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



</body>

</html>
