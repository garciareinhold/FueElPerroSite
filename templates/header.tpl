<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo_fue_el_perro.css" rel="stylesheet">
    <title>{{$tituloPagina}}</title>
  </head>
  <body>
      <header>
        <figure>
          <img src="images/marca_pagina.jpg" alt="logo_pagina" id="logo_pagina">
        </figure>
      </header>
        {if $session=="true"}
          {include file="Admin/navegacionAdmin.tpl"}
          {else}
            {include file="navegacionUsuario.tpl"}
        {/if}
