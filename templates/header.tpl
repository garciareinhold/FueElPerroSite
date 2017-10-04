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
      <nav class="navbar navbar-inverse">
          <section class="container-fluid">
            <section class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </section>
            <section class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a  href="#" class="anchor-nav navegacion" id="home">Home</a></li>
                <li class="dropdown">
                  <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Diseños <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#" class="anchor-nav navegacion" id=categorias>Categorias</a></li>
                    <li><a href="#" class="anchor-nav navegacion" id=delantales>Listado Delantales</a></li>
                  </ul>
                </li>
                <li><a href="#" class="anchor-nav navegacion" id="contacto">Contacto</a></li>
                <li><a href="/login" class="anchor-nav navegacion" id="login">Login</a></li>
              </ul>
            </section>
          </section>
      </nav>
