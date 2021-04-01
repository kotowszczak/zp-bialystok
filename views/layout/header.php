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

<nav id="navbar" class="navbar navbar-expand-sm">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-menu">
    <?php
        zp_menu('top', array(
            'class' => 'navbar-nav justify-content-end'
        ));
    ?>
    </div>
</nav>

<!-- /header -->