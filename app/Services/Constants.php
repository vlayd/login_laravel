<?php

define('NAME_APP', 'Sistema Login');

//___________________CDN___________________
define('CDN', 'http://localhost/cdn/');
define('CDN_CSS', CDN.'css/');
define('CDN_JS', CDN.'js/');
define('CDN_JS_PLUGIN', CDN_JS.'plugins/');
define('CDN_JS_INIT', CDN_JS.'init/');

//___________________PATH___________________
define('PATH_PERFIL', 'assets/upload/perfil/');
define('PATH_SEM_FOTO', 'assets/img/apoio/no-foto.jpg');

//___________________SELECT BD___________________
define('SELECT_USUARIOS_NIVEIS', [
                                    'usuarios.id AS id',
                                    'usuarios.nome AS nome',
                                    'usuarios.endereco',
                                    'email', 'telefone', 'foto',
                                    'niveis.nome AS nivel',
                                ]);


//_______________________CSS_____________________
define('CDN_CSS_NUCLEO_ICON',
    '
    <link href="'.CDN_CSS.'nucleo-icons.css" rel="stylesheet" />
    <link href="'.CDN_CSS.'nucleo-svg.css" rel="stylesheet" />
    '
);
define('CDN_CSS_NUCLEO_FONTAWESOME',
    '
    <link href="'.CDN.'fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="'.CDN.'fontawesome/fontawesome/css/all.min.css" rel="stylesheet" />
    '
);
define('CDN_CSS_MAIN', '<link href="'.CDN_CSS.'argon-dashboard.css?v=2.0.5" rel="stylesheet" />');




//_______________________JS______________________
define('CDN_JS_CORE',
    '
    <script src="'.CDN_JS.'core/jquery-3.6.0.min.js"></script>
    <script src="'.CDN_JS.'core/popper.min.js"></script>
    <script src="'.CDN_JS.'core/bootstrap.min.js"></script>
    '
);
define('CDN_JS_SCROLLBAR',
    '
    <script src="'.CDN_JS_PLUGIN.'perfect-scrollbar.min.js"></script>
    <script src="'.CDN_JS_PLUGIN.'smooth-scrollbar.min.js"></script>
    <script src="'.CDN_JS_INIT.'perfect-scrollbar.js"></script>
    '
);
define('CDN_JS_NUCLEO_FONTAWESOME',
    '
    <script src="'.CDN.'fontawesome/js/all.min.js" rel="stylesheet"></script>
    <script src="'.CDN.'fontawesome/fontawesome/js/all.min.js" rel="stylesheet"></script>
    '
);
define('CDN_JS_MAIN', '<script src="'.CDN_JS.'argon-dashboard.min.js?v=2.0.5"></script>');
define('CDN_JS_DATATABLES',
    '
    <script src="'.CDN_JS_PLUGIN.'datatables.js"></script>
    <script src="'.CDN_JS_INIT.'datatables.js"></script>
    '
);
