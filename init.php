<?php

/*  AJAX  */
define('IS_AJAX', (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || isset($_GET['json']) || isset($_POST['json']) || !empty($_GET['ajax']) || !empty($_POST['ajax']) );

/*  END AJAX  */
ob_start();

//zmienna okreslajaca biezacy plik
/**************************************************************************************************/
$pos = strrpos($_SERVER['SCRIPT_NAME'], '/');
if ( $pos === false ) { // note: three equal signs
    $PHP_SELF = $_SERVER['SCRIPT_NAME'];
    $URL_PATH = '';
}else{
    $PHP_SELF = substr($_SERVER['SCRIPT_NAME'], $pos + 1);
    $URL_PATH = substr($_SERVER['SCRIPT_NAME'], 0, $pos);
}

//$_SERVER['DOCUMENT_ROOT'] - where paache root dir
//jesli sciezka to aktualny katalog, lub jest podana w sposób bezwzglêdny
if ( defined('ROOT_DIR') && ROOT_DIR != '.' && substr( ROOT_DIR, 0, 1) != '/' && substr( ROOT_DIR, 1, 1) != ':'  ) {
    $parts = explode('/', ROOT_DIR );

    //echo '$URL_PATH: ' . $URL_PATH . '<br /><br />' . "\n";
    for ( $i = 0, $lp = count($parts); $i < $lp; $i++ ) {
        if( $parts[$i] == '.' ){

        }else if( $parts[$i] == '..' ){
            $URL_PATH = dirname($URL_PATH);
        }else{
            $URL_PATH .= '/' . $parts[$i];
        }
        //echo $i .'. $URL_PATH: ' . $URL_PATH . '<br />' . "\n";
    }

    if ( $URL_PATH == '\\' ){
        $URL_PATH = '';
    }

    if ( $URL_PATH && substr($URL_PATH, -1) == '/' ){
        $URL_PATH = substr($URL_PATH, 0, -1);
    }
}

$URL_PATH = str_replace('app/webroot/', '', $URL_PATH);
$SELF_URL = $_SERVER['SCRIPT_NAME'];

//zmienna okreslajaca biezacy plik
define('PHP_SELF', $PHP_SELF);

//zmienna okreslajaca sciezke w adresie URL
define('URL_PATH', $URL_PATH);

//zmienna okreslajaca sciezke w adresie URL
define('SELF_URL', $SELF_URL);

//zmienna okre¶lajace

$SITE_URL = 'http://' . (( !empty($GLOBALS['SERVER_NAME']) ) ? $GLOBALS['SERVER_NAME'] :  ( ( empty($_SERVER['HTTP_HOST']) ) ? 'localhost' : $_SERVER['HTTP_HOST'] )) . URL_PATH;
define('SITE_URL', $SITE_URL );

define("ZP_URL", 'http://bialystok.zp.gov.pl');

function asset($url, $return = false)
{
    if (strpos($url, '://') !== false ) {
        if (! $return) {
            echo $url;
        }

        return $url;
    }

    if ($return) {
        return SITE_URL . $url;
    }

    echo SITE_URL . $url;
}


function zp_url($url, $return = false)
{
    if ($url === '#') {
        if (! $return) {
            echo $url;
        }

        return $url;
    }

    if (strpos($url, '://') !== false ) {
        if (! $return) {
            echo $url;
        }

        return $url;
    }

    if (substr($url, 0, 1) !== '/') {
        $url = '/' . $url;
    }

    if ($return) {
        return ZP_URL . $url;
    }

    echo ZP_URL . $url;
}

function h($str)
{
    return htmlspecialchars($str, null, 'utf-8');
}

function zp_menu($menuName, $menuOptions = array())
{
    static $zp_menus = array(
        'main' => array (
            array (
                'class' => 'home-link',
                'link' => '/',
                'title' => 'Przejdź do Strony Głównej',
                'label' => 'START',
            ),

            array (
                'link' => 'uc.php',
                'title' => 'Link do informacji dla rodziców',
                'label' => 'Dla rodziców',
            ),

            array (
                'link' => 'uc.php',
                'title' => 'Link do informacji dla pracowników',
                'label' => 'Dla pracowników',
            ),

//            array (
//                'link' => 'http://zp.bialystok.pl/index.php/kontrola-zarzadcza',
//                'title' => '',
//                'label' => 'Kontrola zarządcza',
//            ),

            array (
                'link' => 'uc.php',
                'title' => '',
                'label' => 'Hostel',
            ),

            array (
                'link' => 'uc.php',
                'title' => 'Link do Mapy serwisu',
                'label' => 'Mapa serwisu',
            ),


            array (
                'link' => 'uc.php',
                'title' => 'Link do deklaracji dostępności',
                'label' => 'Deklaracja dostępności',
            ),
        ),

        'top' => array(
            array (
                'link' => 'uc.php',
                'title' => 'Link do strony z informacjami o placówce',
                'label' => 'O PLACÓWCE',
            ),
            array (
                'link' => 'uc.php',
                'title' => 'Link do strony z informacjami kontaktowymi',
                'label' => 'KONTAKT',
            ),
            array (
                'link' => 'uc.php',
                'title' => 'Link do strony z informacjami na temat COVID-19',
                'label' => 'COVID-19',
            ),
            array (
                'link' => 'uc.php',
                'title' => 'Link do Biuletynu Informacji Publicznej',
                'label' => 'BIP',
                'class' => 'bip',
                'icon' => array(
                    'src' => '/img/bip.png',
                    'alt' => 'Ikonka Biuletynu Informacji Publicznej'
                )
            ),
        )
    );

    if (! isset($zp_menus[$menuName])) {
        return;
    }

    $menuItems = $zp_menus[$menuName];

    echo '<ul '.(isset($menuOptions['id']) ? 'id="'.$menuOptions['id'].'" ' : '') . 'class="nav'.(isset($menuOptions['class']) ? ' '.$menuOptions['class'] : '').'">' . "\n";
    foreach ($menuItems as $menuItem) {
        echo '<li class="nav-item' . (! empty($menuItem['class']) ? ' ' . $menuItem['class'] : '' ) . '">' . "\n";
        echo '<a
            title="'.( isset($menuItem['title']) ? $menuItem['title'] : $menuItem['label'] ) .
            '" href="'.(isset($menuItem['link']) ? zp_url($menuItem['link'], true) : '#').'"
            class="nav-link'.( isset($menuItem['icon']) ? ' with-img' : '' ) . ( isset($menuItem['class']) ? ' ' . $menuItem['class'] : '' ).'">';

        if (isset($menuItem['icon'])) {
            $icon = $menuItem['icon'];

            echo '<span class="nav-title">' . $menuItem['label'] . '</span>';
            echo '<img src="'. asset($icon['src'], true) .'" alt="'. h($icon['alt']) .'" class="nav-img" />';
        } else {
            echo $menuItem['label'];
        }

        echo '</a>'. "\n";
        echo '</li>'. "\n";
    }
    echo '</ul>'. "\n";
}


