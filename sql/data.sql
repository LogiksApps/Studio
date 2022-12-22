--
-- MySQL 5.6.30
-- Sun, 15 Jan 2017 16:45:23 +0000
--
INSERT INTO `lgks_links` (`id`, `guid`, `menuid`, `title`, `mode`, `category`, `menugroup`, `class`, `target`, `link`, `iconpath`, `tips`, `site`, `device`, `privilege`, `weight`, `onmenu`, `blocked`, `rules`, `created_by`, `created_on`, `edited_by`, `edited_on`) VALUES
(101, 'globals', 'studio', 'Webmaster', '*', '', '/', '', '', '#', 'fa fa-folder', 'Manage the various components required for running a site', 'studio', '*', '*', 50, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:36:43'),
(102, 'globals', 'studio', 'Data Controls', '*', '', '/', '', '', '#', '', 'Logiks Data Modules', 'studio', '*', '*', 51, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(103, 'globals', 'studio', 'Media & Assets', '*', '', '/', '', '', '#', '', 'Explore various assets, media and userdata', 'studio', '*', '*', 52, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(104, 'globals', 'studio', 'Configurations', '*', '', '/', '', '', '#', '', 'Manage Global and Default Configurations', 'studio', '*', '*', 53, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:37:19'),
(106, 'globals', 'studio', 'Security Manager', '*', '', '/', '', '', '#', '', 'Manage All Security Related Issues', 'studio', '*', '*', 54, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(107, 'globals', 'studio', 'System', '*', '', '/', '', '', '#', '', 'System tools, Install, Update Plugins, Themes, etc', 'studio', '*', '*', 55, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2017-01-10 16:04:04'),
(108, 'globals', 'studio', 'User & Roles', '*', '', '/', '', '', '#', '', 'Privilege and roles for the site', 'studio', '*', '*', 56, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:37:31'),
(109, 'globals', 'studio', 'Log Reports', '*', '', '/', '', '', '#', '', 'Site Wide Reports', 'studio', '*', '*', 57, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:37:53'),
(112, 'globals', 'studio', 'Advanced Tools', '*', '', '/', '', '', '#', '', 'Advanced tools for developers', 'studio', '*', '*', 100, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(114, 'globals', 'studio', 'Power Tools', '*', '', '/', '', '', '#', '', 'Super User Tools, required by root of the user', 'studio', '*', '*', 190, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(119, 'globals', 'studio', 'CMS Help', '*', '', '/', '', '', '#', '', 'CMS Help contents', 'studio', '*', '*', 500, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(120, 'globals', 'studio', 'Page Manager', '*', '', '101', '', '', 'modules/pageManager', '', 'Manage pages for your site', 'studio', '*', '*', 0, 'true', 'false', 'module#pageManager', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(123, 'globals', 'studio', 'DBMS Manager', '*', '', '112', '', '', 'modules/dbEdit', '', 'Manage DBMS from within CMS', 'studio', '*', 'root,bb7c908c7585b849aa7f8bc1e38bac09', 0, 'true', 'false', 'module#dbEdit', '', '1900-01-01 00:00:00', '', '2016-12-26 13:40:46'),
(124, 'globals', 'studio', 'Core Settings', '*', '', '104', '', '', 'modules/settings/core', '', 'Manage Core Configurations', 'studio', 'pc', 'e5d9dee0892c9f474a174d3bfffb7810', 0, 'true', 'false', 'module#settings', '', '1900-01-01 00:00:00', '', '2016-12-16 14:06:54'),
(125, 'globals', 'studio', 'All Connections', '*', '', '104', '', '', 'modules/settingsJSON', '', 'Manage System Settings', 'studio', '*', 'root,suadmin', 1000, 'true', 'false', 'module#settingsJSON', '', '1900-01-01 00:00:00', '', '2016-12-26 12:28:25'),
(128, 'globals', 'studio', 'User Manager', '*', '', '108', '', '', 'modules/credsManager', '', 'Manage users and roles', 'studio', '*', 'root', 0, 'true', 'false', 'module#credsManager', '', '1900-01-01 00:00:00', '', '2016-12-26 12:27:12'),
(129, 'globals', 'studio', 'Permissions Control', '*', '', '108', '', '', 'modules/credsRoles', '', 'Check and manage User permissions', 'studio', '*', 'root,suadmin', 0, 'true', 'false', 'module#credsRoles', '', '1900-01-01 00:00:00', '', '2016-12-29 20:04:05'),
(165, 'globals', 'studio', 'Plugin Manager', '*', '', '107', '', '', 'modules/packMan', '', 'Manage installed plugins, modules, widgets, etc.', 'studio', '*', 'root,suadmin', 500, 'true', 'false', 'module#packMan', '', '1900-01-01 00:00:00', '', '2017-01-10 16:11:49'),
(166, 'globals', 'studio', 'App Settings', '*', '', '104', '', '', 'modules/settings/apps', '', 'Manage Current App Related Settings', 'studio', '*', '*', 100, 'true', 'false', 'module#settings', '', '1900-01-01 00:00:00', '', '2016-12-16 14:06:50'),
(167, 'globals', 'studio', 'Plugin Options', '*', '', '104', '', '', 'modules/settings/plugins', '', 'Manage Plugin Related Options', 'studio', '*', '*', 300, 'true', 'false', 'module#settings', '', '1900-01-01 00:00:00', '', '2016-12-16 14:41:59'),
(168, 'globals', 'studio', 'Domain Map', '*', '', '112', '', '', 'modules/domainManager', '', 'Update Domain-APP map', 'studio', '*', 'e5d9dee0892c9f474a174d3bfffb7810', 0, 'true', 'false', 'module#domainManager', '', '1900-01-01 00:00:00', '', '2016-12-16 16:04:59'),
(169, 'globals', 'studio', 'CMS Branding', '*', '', '104', '', '', 'modules/settings/studio', '', 'Brand and own your own CMS', 'studio', '*', 'e5d9dee0892c9f474a174d3bfffb7810', 500, 'true', 'false', 'module#settings', '', '1900-01-01 00:00:00', '', '2016-12-16 14:06:57'),
(170, 'globals', 'studio', 'Log Book', '*', '', '109', '', '', 'modules/logBook', '', 'Central Place to look into all the logs', 'studio', '*', '*', 0, 'true', 'false', 'module#logBook', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(173, 'globals', 'studio', 'Media Manager', '*', '', '103', '', '', 'modules/mediaManager', '', 'Manage your images, icons and user data', 'studio', '*', '*', 0, 'true', 'false', 'module#mediaManager', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(174, 'globals', 'studio', 'Active Sessions', '*', '', '109', '', '', 'modules/reports/sessions', '', 'All user sessions for site', 'studio', '*', '*', 0, 'true', 'false', 'module#reports', '', '1900-01-01 00:00:00', '', '2016-11-02 18:36:20'),
(175, 'globals', 'studio', 'Service Manager', '*', '', '101', '', '', 'modules/serviceManager', '', 'Manage services (REST API), etc for your site.', 'studio', '*', '*', 0, 'true', 'false', 'module#serviceManager', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(176, 'globals', 'studio', 'Template Manager', '*', '', '101', '', '', 'modules/templateManager', '', 'Manage templates for your site.', 'studio', '*', '*', 0, 'true', 'false', 'module#templateManager', '', '1900-01-01 00:00:00', '', '2016-11-02 09:28:00'),
(177, 'globals', 'studio', 'App Manager', '*', '', '107', '', '', 'modules/appManager', '', 'Maintenance all apps.', 'studio', '*', 'root', 400, 'true', 'false', 'module#appManager', '', '1900-01-01 00:00:00', '', '2017-01-10 16:12:06'),
(178, 'globals', 'studio', 'Plugin Manager', '*', '', '107', '', '', 'modules/pluginManager', '', 'Plugin Management', 'studio', '*', 'root', 400, 'true', 'false', 'module#pluginManager', '', '1900-01-01 00:00:00', '', '2017-01-10 16:12:06');

INSERT INTO `lgks_links` (`id`, `guid`, `menuid`, `title`, `mode`, `category`, `menugroup`, `class`, `target`, `link`, `iconpath`, `tips`, `site`, `device`, `privilege`, `weight`, `onmenu`, `blocked`, `rules`, `created_by`, `created_on`, `edited_by`, `edited_on`) VALUES
(500, 'globals', 'apps', 'Site Manager', '*', '', '/', '', '', '#', 'fa fa-folder', 'Manage the various user component', 'studio', '*', '*', 50, 'true', 'false', '', '', '1900-01-01 00:00:00', '', '2016-11-02 09:36:48'),
(501, 'globals', 'apps', 'Gallery', '*', '', '500', '', '', 'modules/gallery', '', 'Manage your gallery photos here', 'studio', '*', '*', 30, 'true', 'false', 'module#gallery', '', '1900-01-01 00:00:00', '', '2016-11-02 09:36:16'),
(502, 'globals', 'apps', 'Content', '*', '', '500', '', '', 'modules/content', '', 'Manage Content for site', 'studio', '*', '*', 10, 'true', 'false', 'module#content', '', '1900-01-01 00:00:00', '', '2016-11-02 09:42:45');
