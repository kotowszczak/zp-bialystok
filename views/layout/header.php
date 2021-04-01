<!-- header -->
<header id="header" class="clear">
    <div class="logo">
        <a title="Otwórz stronę główną" href="<?php zp_url('/') ?>">
            <!-- <img src="<?php asset('/img/zp-bialystok-logo.png') ?>"
                alt="Logo zakładu poprawczego w Białymstoku" class="logo-img">
-->
        </a>
    </div>

    <div class="title">
        <a href="<?php zp_url('/') ?>" title="Otwórz stronę główną">Zakład Poprawczy w Białymstoku</a>
    </div>

    <div class="motto">
        Przyjmij każdego takim jakim jest. <br />
        Każdy ma wady, nawet najlepszy. <br />
        Jesteśmy tylko ludźmi - nie aniołami. <br />

        Casar Flaischlen.
    </div>
</header>

<nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <?php
        zp_menu('top', array(
                'id' => 'top-menu'
            ));
        ?>

        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

<!-- /header -->