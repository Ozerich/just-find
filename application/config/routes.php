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

$route['default_controller'] = 'site_controller';
$route['404_override'] = '';

$route['update_all'] = 'live_controller/update_all';

$route['rules'] = 'site_controller/rules';
$route['index'] = 'site_controller/index';
$route['about'] = 'site_controller/about';
$route['registration'] = 'site_controller/registration';
$route['sponsors'] = 'site_controller/sponsors';
$route['ie'] = 'site_controller/ie';
$route['login'] = 'site_controller/login';

$route['team'] = 'team_controller';
$route['team/(:any)'] = 'team_controller/$1';

$route['admin'] = 'admin_controller/main';
$route['admin/team/new'] = 'admin_controller/new_team';
$route['admin/task/new'] = 'admin_controller/new_task';
$route['admin/(:any)'] = 'admin_controller/$1';

$route['live'] = 'live_controller';
$route['live/(:any)'] = 'live_controller/$1';



/* End of file routes.php */
/* Location: ./application/config/routes.php */