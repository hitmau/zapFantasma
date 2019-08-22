
function start_recarrega(cod)
{
	var ob = {cod:cod};
	$.ajax({
							 type: "POST",
							 url:"../modelo/modelo_mostrar_refresh.php",//modelo_mostrar_refresh
							 data: ob,
							 beforeSend: function(objeto){

							 },
							 success: function(data)
							 {

								$("#panel_start").html(data);

							//	setTimeout(function(){
							// },200);

							//	setTimeout(function(){
							//	 $("#panel_start").html("");
							// },200);

							 }
						});
}


function start_ini(cod)
{
	 //var entrada = $("#entrada").val();
	//alert(cod);

	 var ob = {cod:cod};
	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_mostrar_start_ini.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_start").html(data);
                 btn_listar_datos(cod);

								 setTimeout(function(){
								},200000);

                 setTimeout(function(){
                  $("#panel_start").html("");
								},200000);

								setTimeout(function(){
								 $("class").html("btn-danger");
							 });



                }
             });
}

function start_fin(cod)
{
	 //var entrada = $("#entrada").val();
	//alert(cod);

	 var ob = {cod:cod};
	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_mostrar_start_ini.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_start").html(data);
                 btn_listar_datos(cod);

								 setTimeout(function(){
								},200000);

                 setTimeout(function(){
                  $("#panel_start").html("");
								},200000);

								setTimeout(function(){
								 $("class").html("btn-success");
							 });



                }
             });
}

function start_interromper(cod)
{
	 //var entrada = $("#entrada").val();
	//alert(cod);

	 var ob = {cod:cod};
	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_mostrar_start_interromper.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_start").html(data);
                 btn_listar_datos(cod);

								 setTimeout(function(){
								},1000);

                 setTimeout(function(){
                  $("#panel_start").html("");
										location.reload();
								},1300);

                }
             });
}

function btn_guardar_dato(cod)
{
	 var entrada = $("#entrada").val();
	 var itipo = $("#itipo").val();
	 var tiposaida = $("#tiposaida").val();
	 var msganterior = $("#msganterior").val();
	 var iativo = $("#iiiativo").val();

	//alert(cod + " - "+entrada+" - "+itipo+" - "+iativo);

	 var ob = {cod:cod, entrada:entrada, itipo:itipo, tiposaida:tiposaida, iativo:iativo , msganterior:msganterior};
	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_datos.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_respuesta").html(data);
                 btn_listar_datos(cod);

								 setTimeout(function(){
									location.reload();
								},1000);

                 setTimeout(function(){
                  $("#panel_respuesta").html("");
								},1400);

                }
             });
}

function btn_guardar_dato_contato(cod)
{
	 var contato = $("#contato").val();
	 var ativo = $("#ativo").val();
	 var cadastro = $("#cadastro").val();

	 ////alert(contato+" - "+ativo+" - "+cadastro);

	 var ob = {cod:cod, contato:contato, ativo:ativo, cadastro:cadastro};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_contato.php",
                data: ob,
								beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_respuesta_contato").html(data);
                 btn_listar_datos_contato(cod);

                 setTimeout(function(){
                  $("#panel_respuesta_contato").html("");
                 },2000);


                }
             });
}

function btn_guardar_dato_usuario(cod)
{
	 var nome = $("#nome").val();
	 var email = $("#email").val();
	 var telefone = $("#telefone").val();
	 var senha1 = $("#senha1").val();
	 var senha2 = $("#senha2").val();
	 var ativo = $("#ativo").val();
   if (senha1 != senha2){

		////alert("As senhas não estão iguais!");
   } else {
	 //alert(nome+" - "+email+" - "+telefone+" - "+senha1+" - "+senha2+" - "+ativo+"-"+cod);

	 var ob = {cod:cod, nome:nome, email:email, telefone:telefone, senha1:senha1, senha2:senha2, ativo:ativo};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_usuario.php",
                data: ob,
								beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_respuesta_usuario").html(data);
                 btn_listar_datos_usuario(cod);

                 setTimeout(function(){
                  $("#panel_respuesta_usuario").html("");
								},2000);


                }
             }); }
}

function btn_guardar_dato_saida(cod)
{
	 var scodinteracao = $("#scodinteracao").val();
	 var saida = $("#ssaida").val();
	 var stipo = $("#stipo").val();
	 var sativo = $("#sativo").val();

	 ////alert(scodinteracao+" - "+saida+" - "+stipo+" - "+sativo);

	 var ob = {scodinteracao:scodinteracao, saida:saida, stipo:stipo, sativo:sativo};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_datos_saida.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_respuesta").html(data);
                 btn_listar_datos(cod);

                 setTimeout(function(){
                  $("#panel_respuesta").html("");
                 },2000);


                }
             });
}

function btn_listar_datos_contato(cod)
{
	 var ob = {cod:cod};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_listar_datos_contato.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_listado_contato").html(data);

                }
             });
}

function btn_listar_datos(cod)
{
//var e = "teste";
	 var ob = {cod:cod};
   //////alert(cod);
	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_listar_datos.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_listado").html(data);

                }
             });
}

function btn_listar_datos_usuario(cod)
{
//var e = "teste";
	 var ob = {cod:cod};
  //alert(cod);
	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_listar_datos_usuario.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_listado_usuario").html(data);

                }
             });
}

function btn_listar_datos_parametros(cod)
{
	 var ob = {cod:cod};

   $.ajax({
                type: "POST",
                url:"../modelo/modelo_listar_datos_parametros.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_listado_parametros").html(data);

                }
             });
}

function btn_editar(codinteracao)
{
	 var ob = {codinteracao:codinteracao};

	 ////alert(codinteracao);

	 $.ajax({
                type: "POST",
                url:"../vista/vista_editar_datos.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_editar").html(data);

                }
             });
}

function btn_editar_usuario(cod, codusuario)
{
	////alert(cod+" teste "+codusuario);
	 var ob = {cod:cod, codusuario:codusuario};

	 $.ajax({
                type: "POST",
                url:"../vista/vista_editar_datos_usuario.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_editar_usuario").html(data);

                }
             });
}

function btn_editar_contato(codcontato, cod)
{
	 var ob = {cod:cod, codcontato:codcontato};

	 ////alert(codcontato);

	 $.ajax({
                type: "POST",
                url:"../vista/vista_editar_datos_contato.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_editar_contato").html(data);

                }
             });
}

function btn_editar_parametros(codparametros)
{
	 var ob = {codparametros:codparametros};

	 ////alert(codinteracao);

	 $.ajax({
                type: "POST",
                url:"../vista/vista_editar_datos_parametros.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_editar_parametros").html(data);

                }
             });
}

function btn_editar_saida(scodinteracao, scodsaida, cod)
{
	 var ob = {scodinteracao:scodinteracao, scodsaida:scodsaida, cod:cod};

	////alert(scodinteracao+" - "+scodsaida+" - "+cod);

	 $.ajax({
                type: "POST",
                url:"../vista/vista_editar_datos_saida.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_editar_saida").html(data);

                }
             });
}

function btn_guardar_edicion(cod)
{
   var codinteracao = $("#iicodinteracao").val();
	 var entrada = $("#iientrada").val();
	 var tipo = $("#iitipo").val();
	 var tiposaida = $("#tiposaida").val();
	 var servico = $("#iiservico").val();
	 var ativo = $("#iiativo").val();

	////alert(codinteracao+" - "+entrada+" - "+tipo+" - "+servico+" - "+ativo+" - "+cod);

	 var ob = {cod:cod, codinteracao:codinteracao, entrada:entrada, tipo:tipo, tiposaida:tiposaida, servico:servico, ativo:ativo};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_guardar_datos.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_respuesta_edicion").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                 $("#panel_respuesta_edicion").html("");
							 },2000);

                 setTimeout(function(){
                 $("#myModal_editar").modal("hide").fadeIn("");
							 },2500);

                 setTimeout(function(){
                 btn_listar_datos(cod);
							 },3000);


                }
             });
}

function btn_guardar_edicion_contato(cod)
{
   var codcontato = $("#acodcontato").val();
	 var contato = $("#acontato").val();
	 var ativo = $("#aativo").val();
	 var cadastro = $("#acadastro").val();

	 ////alert(codcontato+" - "+contato+" - "+ativo+" - "+cadastro);

	 var ob = {codcontato:codcontato, contato:contato, ativo:ativo, cadastro:cadastro};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_guardar_datos_contato.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_respuesta_edicion_contato").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                 $("#panel_respuesta_edicion_contato").html("");
							 },2000);

                 setTimeout(function(){
                 $("#myModal_editar_contato").modal("hide").fadeIn("");
							 },1500);

                 setTimeout(function(){
                 btn_listar_datos_contato(cod);
							 },3000);


                }
             });
}

function btn_guardar_edicion_usuario(cod)
{
   var codusuario = $("#icodusuario").val();
	 var nome = $("#inome").val();
	 var email = $("#iemail").val();
	 var senha = $("#isenha").val();
	 var telefone = $("#itelefone").val();
	 var ativo = $("#iativo").val();

	 //alert(cod + " --- " + codusuario+" - "+nome+" - "+email+" - "+senha+" - "+telefone+" - "+ativo);

	 var ob = {codusuario:codusuario, nome:nome, email:email, senha:senha,telefone:telefone, ativo:ativo};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_guardar_datos_usuario.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_respuesta_edicion_usuario").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                 $("#panel_respuesta_edicion_usuario").html("");
							 },1000);

                 setTimeout(function(){
                 $("#myModal_editar_usuario").modal("hide").fadeIn("");
							 },1500);

                 setTimeout(function(){
                 btn_listar_datos_usuario(cod);
							 },2000);


                }
             });
}

function btn_guardar_edicion_parametros(cod)
{
   var codparametros = $("#codparametros").val();
	 var ativo = $("#ativo").val();


	 ////alert(codparametros+" - "+ativo);

	 var ob = {codparametros:codparametros, ativo:ativo, cod:cod};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_guardar_datos_parametros.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_respuesta_edicion_parametros").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                 $("#panel_respuesta_edicion_parametros").html("");
							 },2000);

                 setTimeout(function(){
                 $("#myModal_editar_parametros").modal("hide").fadeIn("");
							 },1500);

                 setTimeout(function(){
                 btn_listar_datos_parametros(cod);
							 },2500);


                }
             });
}

function btn_guardar_edicion_saida(cod)
{

	 var acodinteracao = $("#acodinteracao").val();
   var codinteracao = $("#sscodinteracao").val();
	 var codsaida = $("#sscodsaida").val();
	 var saida = $("#saida").val();
	 var tipo = $("#tipo").val();
	 var ativo = $("#ativo").val();

	////alert(codinteracao+" - "+codsaida+" - "+saida+" - "+tipo+" - "+ativo+" - "+cod);
	 var ob = {acodinteracao:acodinteracao, codinteracao:codinteracao, codsaida:codsaida, saida:saida, tipo:tipo, ativo:ativo};

	 $.ajax({
								type: "POST",
								url:"../modelo/modelo_guardar_datos_saida.php",
								data: ob,
								beforeSend: function(objeto){

								},
								success: function(data)
								{

								 $("#panel_respuesta_edicion_saida").html(data);
								 ///btn_listar_datos();

								 setTimeout(function(){
								 $("#panel_respuesta_edicion_saida").html("");
								 },2000);

								 setTimeout(function(){
								 $("#myModal_editar_saida").modal("hide").fadeIn("");
								 },2500);

								 setTimeout(function(){
								 btn_listar_datos(cod);
								 },3000);


								}
						 });
}

function btn_eliminar(codinteracao, cod)
{
	 var ob = {codinteracao:codinteracao, cod:cod};
//alert(codinteracao+" - "+ cod);
	 $.ajax({
                type: "POST",
                url:"../vista/vista_eliminar_datos.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_eliminar").html(data);

                }
             });
}

function btn_eliminar_contato(codcontato, cod)
{
	 var ob = {cod:cod, codcontato:codcontato};

	 $.ajax({
                type: "POST",
                url:"../vista/vista_eliminar_datos_contato.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_eliminar_contato").html(data);

                }
             });
}

function btn_eliminar_usuario(cod, codusuario)
{
	 var ob = {cod:cod, codusuario:codusuario};

	 //alert(cod+ " - " + codusuario);

	 $.ajax({
                type: "POST",
                url:"../vista/vista_eliminar_datos_usuario.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_eliminar_usuario").html(data);

                }
             });
}

function btn_eliminar_saida(scodinteracao, scodsaida)
{
	 var ob = {scodinteracao:scodinteracao, scodsaida:scodsaida};

	 ////alert("btn_eliminar_saida " + scodinteracao+ " - "+scodsaida);

	 $.ajax({
                type: "POST",
                url:"../vista/vista_eliminar_datos_saida.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_eliminar_saida").html(data);

                }
             });
}

function btn_eliminar_dato(cod)
{
     var codinteracao = $("#codinteracao").val();
		////alert(cod);
	 var ob = {codinteracao:codinteracao};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_eliminar_datos.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_eliminar").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_eliminar").html("");
                 },2000);

                 setTimeout(function(){
                  $("#myModal_eliminar").modal("hide").fadeIn("");
                 },2500);

                 setTimeout(function(){
                  btn_listar_datos(cod);
                 },3000);


                }
             });
}

function btn_eliminar_dato_contato(cod)
{
     var codcontato = $("#codcontato").val();
		 ////alert(codcontato);
	 var ob = {codcontato:codcontato};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_eliminar_datos_contato.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_eliminar_contato").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_eliminar_contato").html("");
								},1000);

                 setTimeout(function(){
                  $("#myModal_eliminar_contato").modal("hide").fadeIn("");
								},1000);

                 setTimeout(function(){
                  btn_listar_datos_contato(cod);
								},2000);


                }
             });
}

function btn_eliminar_dato_usuario(cod)
{
     var codusuario = $("#codusuario").val();

	 var ob = {codusuario:codusuario};

	 //alert(cod + " - " + codusuario);

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_eliminar_datos_usuario.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_eliminar_usuario").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_eliminar_usuario").html("");
								},1000);

                 setTimeout(function(){
                  $("#myModal_eliminar_usuario").modal("hide").fadeIn("");
								},1500);

                 setTimeout(function(){
                  btn_listar_datos_usuario(cod);
								},2000);


                }
             });
}

function btn_eliminar_dato_saida(cod)
{
     var codinteracao = $("#codinteracao").val();
		 var codsaida = $("#codsaida").val();

    ////alert(codinteracao+ " - " + codsaida);

	 var ob = {codinteracao:codinteracao, codsaida:codsaida};

	 $.ajax({
                type: "POST",
                url:"../modelo/modelo_eliminar_datos_saida.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_eliminar_saida").html(data);
                 //btn_listar_datos();

                 setTimeout(function(){
                  $("#panel_eliminar_saida").html("");
                 },2000);

                 setTimeout(function(){
                  $("#myModal_eliminar_saida").modal("hide").fadeIn("");
                 },2500);

                 setTimeout(function(){
                  btn_listar_datos(cod);
                 },3000);


                }
             });
}

function select_usuario()
{ //id="select_usuario"

 var codinteracao =  $("#select_usuario").val();
// ////alert("Hola select = "+codinteracao);

    var ob = {codinteracao:codinteracao};

     $.ajax({
                type: "POST",
                url:"../modelo/modelo_mostrar_datos.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_selector").html(data);

                }
             });
}

function select_tipo(cod)
{ //id="select_usuario"

 var codinteracao =  $("#scodinteracao").val();
  //lert("select_tipo = " + codinteracao);

    var ob = {cod:cod, codinteracao:codinteracao};

     $.ajax({
							 type: "POST",
							 url:"../modelo/modelo_mostrar_datos_tipo_saida.php",
							 data: ob,
							 beforeSend: function(objeto){

							 },
							 success: function(data)
							 {

								$("#panel_tipo").html(data);

							 }
						});
}

function select_parametros()
{ //id="select_usuario"

 var codparametros =  $("#select_parametros").val();
////alert("Hola select = "+codinteracao);

    var ob = {codparametros:codparametros};

     $.ajax({
                type: "POST",
                url:"../modelo/modelo_mostrar_datos_parametros.php",
                data: ob,
                beforeSend: function(objeto){

                },
                success: function(data)
                {

                 $("#panel_selector").html(data);

                }
             });
}
