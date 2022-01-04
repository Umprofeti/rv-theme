<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head( );?>
    <title>RendezVous Corp</title>
</head>
<body>
    <header>
        <div class="container-fluid">
          
            <div class="row" id="cabecera-texto">
                <div class="col" id="elemento-padre">
                  <h1 class="title-page text-center"><?php bloginfo('name'); ?></h1>
                  <?php dynamic_sidebar('subtitle'); ?>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="cosaloca">
                    <div class="container-fluid">
                      <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                      >
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <?php the_custom_logo(); ?>
                      <?php wp_nav_menu(); ?>
                    </div>
                  </nav>
            </div>
            <div class="row">
              <div class="col">
                <div class="trapecio" id="trapecio">
                    <p class="text-slogan"><?php bloginfo('description'); ?></p>
                </div>
              </div>
            </div>
    </header>