<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller']    = "mainpanel/controller_login";
$route['404_override']  = '';

// ADMINISTRACION -- MAINPANEL *****************************
$route['mainpanel'] = "mainpanel/controller_login";
$route['mainpanel/login'] = "mainpanel/controller_login/login";
$route['mainpanel/validar'] = "mainpanel/controller_login/validar";
$route['mainpanel/logout'] = "mainpanel/controller_login/logout";

$route['mainpanel/mis-datos'] = "mainpanel/controller_misdatos";

// $route['mainpanel/xencuestar/lista'] = "mainpanel/controller_xencuestar/listado";
// $route['mainpanel/xencuestar/([0-9]+)/lista-cli'] = "mainpanel/controller_xencuestar/lista_cli/$1";
// $route['mainpanel/xencuestar/actualizar'] = "mainpanel/controller_xencuestar/actualizar";
// $route['mainpanel/xencuestar/edit/([0-9]+)'] = "mainpanel/controller_xencuestar/edit/$1";
// $route['mainpanel/xencuestar/nuevo'] = "mainpanel/controller_xencuestar/nuevo";
// $route['mainpanel/xencuestar/grabar'] = "mainpanel/controller_xencuestar/grabar";

$route['mainpanel/encuesta'] = "mainpanel/controller_encuesta/listado";
$route['mainpanel/encuesta/nuevo/paso1'] = "mainpanel/controller_encuesta/nuevo_paso1";
$route['mainpanel/encuesta/graba_paso1'] = "mainpanel/controller_encuesta/graba_paso1";
$route['mainpanel/encuesta/nuevo/paso2/([0-9]+)'] = "mainpanel/controller_encuesta/nuevo_paso2/$1";
$route['mainpanel/encuesta/lista'] = "mainpanel/controller_encuesta/listado";
$route['mainpanel/encuesta/([0-9]+)/lista-cli'] = "mainpanel/controller_encuesta/lista_cli/$1";
$route['mainpanel/encuesta/actualizar'] = "mainpanel/controller_encuesta/actualizar";
$route['mainpanel/encuesta/edit/([0-9]+)'] = "mainpanel/controller_encuesta/nuevo_paso2/$1";
$route['mainpanel/encuesta/enunciado/delete/([0-9]+)/([0-9]+)'] = "mainpanel/controller_encuesta/delete_enunciado/$1/$2";
$route['mainpanel/encuesta/enunciado/delete/([0-9]+)/([0-9]+)'] = "mainpanel/controller_encuesta/delete_enunciado/$1/$2";
$route['mainpanel/encuesta/edit/enunciado/([0-9]+)'] = "mainpanel/controller_encuesta/editar_enunciado";

//(.*)

$route['mainpanel/fotografias/listado/([0-9]+)'] = "mainpanel/controller_fotografias/listado/$1";
$route['mainpanel/fotografias/nuevo/([0-9]+)'] = "mainpanel/controller_fotografias/nuevo/$1";
$route['mainpanel/fotografias/delete/([0-9]+)'] = "mainpanel/controller_fotografias/delete/$1";
$route['mainpanel/fotografias/edit/([0-9]+)'] = "mainpanel/controller_fotografias/edit/$1";
$route['mainpanel/fotografias/actualizar'] = "mainpanel/controller_fotografias/actualizar";
$route['mainpanel/fotografias/grabar'] = "mainpanel/controller_fotografias/grabar";

$route['mainpanel/productos/listado'] = "mainpanel/controller_productos/listado";
$route['mainpanel/productos/listado/([0-9]+)'] = "mainpanel/controller_productos/listado/$1";
$route['mainpanel/productos/nuevo'] = "mainpanel/controller_productos/nuevo";
$route['mainpanel/productos/delete/([0-9]+)'] = "mainpanel/controller_productos/delete/$1";
$route['mainpanel/productos/edit/([0-9]+)'] = "mainpanel/controller_productos/edit/$1";
$route['mainpanel/productos/actualizar'] = "mainpanel/controller_productos/actualizar";
$route['mainpanel/productos/grabar'] = "mainpanel/controller_productos/grabar";
$route['mainpanel/dow/ficha_tecnica/(.*)'] = "mainpanel/controller_productos/dow_ficha_tecnica/$1";


$route['mainpanel/clientes/listado'] = "mainpanel/controller_cliente/listado";
$route['mainpanel/clientes/nuevo'] = "mainpanel/controller_cliente/nuevo";
$route['mainpanel/clientes/delete/([0-9]+)'] = "mainpanel/controller_cliente/delete/$1";
$route['mainpanel/clientes/edit/([0-9]+)'] = "mainpanel/controller_cliente/edit/$1";
$route['mainpanel/clientes/actualizar'] = "mainpanel/controller_cliente/actualizar";
$route['mainpanel/clientes/grabar'] = "mainpanel/controller_cliente/grabar";

$route['mainpanel/clientes/cartera'] = "mainpanel/controller_cliente/listado_cartera";
$route['mainpanel/clientes/cartera/nuevo'] = "mainpanel/controller_cliente/nueva_cartera";
$route['mainpanel/clientes/cartera/delete/([0-9]+)'] = "mainpanel/controller_cliente/delete_cartera/$1";
$route['mainpanel/clientes/cartera/edit/([0-9]+)'] = "mainpanel/controller_cliente/edit_cartera/$1";
$route['mainpanel/clientes/cartera/actualizar'] = "mainpanel/controller_cliente/actualizar_cartera";
$route['mainpanel/clientes/cartera/grabar'] = "mainpanel/controller_cliente/grabar_cartera";

$route['mainpanel/listado/index'] = "mainpanel/controller_subcategoria/listado";
$route['mainpanel/subcategoria/listado/([0-9]+)'] = "mainpanel/controller_subcategoria/listado/$1";
$route['mainpanel/subcategoria/nuevo'] = "mainpanel/controller_subcategoria/nuevo";
$route['mainpanel/subcategoria/delete/([0-9]+)'] = "mainpanel/controller_subcategoria/delete/$1";
$route['mainpanel/subcategoria/edit/([0-9]+)'] = "mainpanel/controller_subcategoria/edit/$1";
$route['mainpanel/subcategoria/actualizar'] = "mainpanel/controller_subcategoria/actualizar";
$route['mainpanel/subcategoria/grabar'] = "mainpanel/controller_subcategoria/grabar";


$route['mainpanel/trabajos/listado'] = "mainpanel/controller_trabajos/listado";
$route['mainpanel/trabajos/nuevo'] = "mainpanel/controller_trabajos/nuevo";
$route['mainpanel/trabajos/delete/([0-9]+)'] = "mainpanel/controller_trabajos/delete/$1";
$route['mainpanel/trabajos/edit/([0-9]+)'] = "mainpanel/controller_trabajos/edit/$1";
$route['mainpanel/trabajos/actualizar'] = "mainpanel/controller_trabajos/actualizar";
$route['mainpanel/trabajos/grabar'] = "mainpanel/controller_trabajos/grabar";

$route['mainpanel/novedades/listado'] = "mainpanel/controller_novedades/listado";
$route['mainpanel/novedades/nuevo'] = "mainpanel/controller_novedades/nuevo";
$route['mainpanel/novedades/delete/([0-9]+)'] = "mainpanel/controller_novedades/delete/$1";
$route['mainpanel/novedades/edit/([0-9]+)'] = "mainpanel/controller_novedades/edit/$1";
$route['mainpanel/novedades/actualizar'] = "mainpanel/controller_novedades/actualizar";
$route['mainpanel/novedades/grabar'] = "mainpanel/controller_novedades/grabar";


$route['mainpanel/registros/listado'] = "mainpanel/controller_registros/listado";
$route['mainpanel/registros/nuevo'] = "mainpanel/controller_registros/nuevo";
$route['mainpanel/registros/delete/([0-9]+)'] = "mainpanel/controller_registros/delete/$1";
$route['mainpanel/registros/edit/([0-9]+)'] = "mainpanel/controller_registros/edit/$1";
$route['mainpanel/registros/actualizar'] = "mainpanel/controller_registros/actualizar";
$route['mainpanel/registros/grabar'] = "mainpanel/controller_registros/grabar";

$route['mainpanel/suministros/listado'] = "mainpanel/controller_suministros/listado";
$route['mainpanel/suministros/nuevo'] = "mainpanel/controller_suministros/nuevo";
$route['mainpanel/suministros/delete/([0-9]+)'] = "mainpanel/controller_suministros/delete/$1";
$route['mainpanel/suministros/edit/([0-9]+)'] = "mainpanel/controller_suministros/edit/$1";
$route['mainpanel/suministros/actualizar'] = "mainpanel/controller_suministros/actualizar";
$route['mainpanel/suministros/grabar'] = "mainpanel/controller_suministros/grabar";

$route['mainpanel/descargas/listado'] = "mainpanel/controller_descargas/listado";
$route['mainpanel/descargas/nuevo'] = "mainpanel/controller_descargas/nuevo";
$route['mainpanel/descargas/delete/([0-9]+)'] = "mainpanel/controller_descargas/delete/$1";
$route['mainpanel/descargas/edit/([0-9]+)'] = "mainpanel/controller_descargas/edit/$1";
$route['mainpanel/descargas/actualizar'] = "mainpanel/controller_descargas/actualizar";
$route['mainpanel/descargas/grabar'] = "mainpanel/controller_descargas/grabar";
$route['mainpanel/dow/archivo/(.*)'] = "mainpanel/controller_descargas/dow_archivo/$1";

$route['mainpanel/ubicanos/editar'] = "mainpanel/controller_mapa/editar";
$route['mainpanel/ubicanos/actualizar'] = "mainpanel/controller_mapa/actualizar";

$route['mainpanel/configuracion/listado'] = "mainpanel/controller_config/listado";
$route['mainpanel/configuracion/edit/([0-9]+)'] = "mainpanel/controller_config/edit/$1";
$route['mainpanel/configuracion/actualizar'] = "mainpanel/controller_config/actualizar";

$route['mainpanel/mensajes/recibidos'] = "mainpanel/controller_mensajes/recibidos";
$route['mainpanel/mensajes/detalle_recibido/([0-9]+)'] = "mainpanel/controller_mensajes/detalle_recibido/$1";
$route['mainpanel/mensajes/delete/([0-9]+)'] = "mainpanel/controller_mensajes/delete/$1";

$route['mainpanel/cotizaciones/recibidos'] = "mainpanel/controller_cotizaciones/recibidos";
$route['mainpanel/cotizaciones/detalle_recibido/([0-9]+)'] = "mainpanel/controller_cotizaciones/detalle_recibido/$1";
$route['mainpanel/cotizaciones/delete/([0-9]+)'] = "mainpanel/controller_cotizaciones/delete/$1";
$route['mainpanel/cotizaciones/enviar-respuesta'] = "mainpanel/controller_cotizaciones/enviar_respuesta";



/* End of file routes.php */
/* Location: ./application/config/routes.php */