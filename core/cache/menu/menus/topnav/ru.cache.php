<?php  return array (
  0 => 
  array (
    'text' => 'Содержимое',
    'parent' => 'topnav',
    'action' => '',
    'description' => '',
    'icon' => '<i class="icon-file-text-o icon icon-large"></i>',
    'menuindex' => 0,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_site',
    'namespace' => 'core',
    'id' => 'site',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Создать ресурс',
        'parent' => 'site',
        'action' => 'resource/create',
        'description' => 'Создать новый ресурс',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'new_document',
        'namespace' => 'core',
        'id' => 'new_resource',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Перейти на сайт',
        'parent' => 'site',
        'action' => '',
        'description' => 'Будет загружена главная страница сайта в новой вкладке',
        'icon' => '',
        'menuindex' => 1,
        'params' => '',
        'handler' => 'MODx.preview(); return false;',
        'permissions' => '',
        'namespace' => 'core',
        'id' => 'preview',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      2 => 
      array (
        'text' => 'Группы ресурсов',
        'parent' => 'site',
        'action' => 'security/resourcegroup',
        'description' => 'Управление принадлежностью ресурсов к группам ресурсов',
        'icon' => '',
        'menuindex' => 2,
        'params' => '',
        'handler' => '',
        'permissions' => 'access_permissions',
        'namespace' => 'core',
        'id' => 'resource_groups',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      3 => 
      array (
        'text' => 'Типы содержимого',
        'parent' => 'site',
        'action' => 'system/contenttype',
        'description' => 'Вы можете добавить новые типы содержимого для ресурсов, например такие как .html, .js, и т.п.',
        'icon' => '',
        'menuindex' => 3,
        'params' => '',
        'handler' => '',
        'permissions' => 'content_types',
        'namespace' => 'core',
        'id' => 'content_types',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
    ),
    'controller' => '',
  ),
  1 => 
  array (
    'text' => 'Медиа',
    'parent' => 'topnav',
    'action' => '',
    'description' => '',
    'icon' => '<i class="icon-file-image-o icon icon-large"></i>',
    'menuindex' => 1,
    'params' => '',
    'handler' => '',
    'permissions' => 'file_manager',
    'namespace' => 'core',
    'id' => 'media',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Управление медиа',
        'parent' => 'media',
        'action' => 'media/browser',
        'description' => 'Отображение, загрузка и управление медиа-файлами',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'file_manager',
        'namespace' => 'core',
        'id' => 'file_browser',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Источники файлов',
        'parent' => 'media',
        'action' => 'source',
        'description' => 'Управление источниками файлов',
        'icon' => '',
        'menuindex' => 1,
        'params' => '',
        'handler' => '',
        'permissions' => 'sources',
        'namespace' => 'core',
        'id' => 'sources',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
    ),
    'controller' => '',
  ),
  2 => 
  array (
    'text' => 'Пакеты',
    'parent' => 'topnav',
    'action' => '',
    'description' => '',
    'icon' => '<i class="icon-cube icon icon-large"></i>',
    'menuindex' => 2,
    'params' => '',
    'handler' => '',
    'permissions' => 'components',
    'namespace' => 'core',
    'id' => 'components',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Установщик',
        'parent' => 'components',
        'action' => 'workspaces',
        'description' => 'Управление пакетами и репозиториями',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'packages',
        'namespace' => 'core',
        'id' => 'installer',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Babel',
        'parent' => 'components',
        'action' => 'index',
        'description' => 'Управление мультиязычной системой',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => '',
        'namespace' => 'babel',
        'id' => 'babel',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      2 => 
      array (
        'text' => 'Console',
        'parent' => 'components',
        'action' => 'index',
        'description' => 'Консоль для выполнения php-кода',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'console',
        'namespace' => 'console',
        'id' => 'console',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      3 => 
      array (
        'text' => 'Конфигурация',
        'parent' => 'components',
        'action' => 'home',
        'description' => 'Установка и обновление конфигурации сайта.',
        'icon' => '<i class="icon icon-wrench"></i>',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => '',
        'namespace' => 'clientconfig',
        'id' => 'clientconfig',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      4 => 
      array (
        'text' => 'SEO Suite',
        'parent' => 'components',
        'action' => 'home',
        'description' => 'Управление URL-адресами 404 и перенаправлениями.',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => '',
        'namespace' => 'seosuite',
        'id' => 'seosuite.menu.seosuite',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      5 => 
      array (
        'text' => 'MIGX',
        'parent' => 'components',
        'action' => 'index',
        'description' => '',
        'icon' => '',
        'menuindex' => 1,
        'params' => '&configs=migxconfigs||packagemanager',
        'handler' => '',
        'permissions' => '',
        'namespace' => 'migx',
        'id' => 'MIGX',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
    ),
    'controller' => '',
  ),
  3 => 
  array (
    'text' => 'Управление',
    'parent' => 'topnav',
    'action' => '',
    'description' => '',
    'icon' => '<i class="icon-sliders icon icon-large"></i>',
    'menuindex' => 3,
    'params' => '',
    'handler' => '',
    'permissions' => 'menu_tools',
    'namespace' => 'core',
    'id' => 'manage',
    'children' => 
    array (
      0 => 
      array (
        'text' => 'Пользователи',
        'parent' => 'manage',
        'action' => 'security/user',
        'description' => 'Добавление, обновление, и назначение прав пользователям',
        'icon' => '',
        'menuindex' => 0,
        'params' => '',
        'handler' => '',
        'permissions' => 'view_user',
        'namespace' => 'core',
        'id' => 'users',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      1 => 
      array (
        'text' => 'Очистить кэш',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Очистить кэш сайта во всех контекстах',
        'icon' => '',
        'menuindex' => 1,
        'params' => '',
        'handler' => 'MODx.clearCache(); return false;',
        'permissions' => 'empty_cache',
        'namespace' => 'core',
        'id' => 'refresh_site',
        'children' => 
        array (
          0 => 
          array (
            'text' => 'Обновить URI-ссылки',
            'parent' => 'refresh_site',
            'action' => '',
            'description' => 'Перегенерировать URI ресурсов',
            'icon' => '',
            'menuindex' => 0,
            'params' => '',
            'handler' => 'MODx.refreshURIs(); return false;',
            'permissions' => 'empty_cache',
            'namespace' => 'core',
            'id' => 'refreshuris',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
        ),
        'controller' => '',
      ),
      2 => 
      array (
        'text' => 'Удалить блокировки',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Удалить все блокировки. Эти блокировки являются результатом того, что другие пользователи редактируют эти страницы',
        'icon' => '',
        'menuindex' => 2,
        'params' => '',
        'handler' => 'MODx.removeLocks();return false;',
        'permissions' => 'remove_locks',
        'namespace' => 'core',
        'id' => 'remove_locks',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      3 => 
      array (
        'text' => 'Перезагрузить права доступа',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Перезагрузить все права доступа и очистить кэш',
        'icon' => '',
        'menuindex' => 3,
        'params' => '',
        'handler' => 'MODx.msg.confirm({
    title: _(\'flush_access\')
    ,text: _(\'flush_access_confirm\')
    ,url: MODx.config.connector_url
    ,params: {
        action: \'security/access/flush\'
    }
    ,listeners: {
        \'success\': {fn:function() { location.href = \'./\'; },scope:this},
        \'failure\': {fn:function(response) { Ext.MessageBox.alert(\'failure\', response.responseText); },scope:this},
    }
});',
        'permissions' => 'access_permissions',
        'namespace' => 'core',
        'id' => 'flush_access',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      4 => 
      array (
        'text' => 'Завершить все сеансы',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Завершить все сеансы работы пользователей и произвести принудительный выход из системы всех пользователей',
        'icon' => '',
        'menuindex' => 4,
        'params' => '',
        'handler' => 'MODx.msg.confirm({
    title: _(\'flush_sessions\')
    ,text: _(\'flush_sessions_confirm\')
    ,url: MODx.config.connector_url
    ,params: {
        action: \'security/flush\'
    }
    ,listeners: {
        \'success\': {fn:function() { location.href = \'./\'; },scope:this}
    }
});',
        'permissions' => 'flush_sessions',
        'namespace' => 'core',
        'id' => 'flush_sessions',
        'children' => 
        array (
        ),
        'controller' => '',
      ),
      5 => 
      array (
        'text' => 'Отчёты',
        'parent' => 'manage',
        'action' => '',
        'description' => 'Различные отчеты MODX для администратора',
        'icon' => '',
        'menuindex' => 5,
        'params' => '',
        'handler' => '',
        'permissions' => 'menu_reports',
        'namespace' => 'core',
        'id' => 'reports',
        'children' => 
        array (
          0 => 
          array (
            'text' => 'Расписание сайта',
            'parent' => 'reports',
            'action' => 'resource/site_schedule',
            'description' => 'Просмотр расписания публикаций и снятия с публикации',
            'icon' => '',
            'menuindex' => 0,
            'params' => '',
            'handler' => '',
            'permissions' => 'view_document',
            'namespace' => 'core',
            'id' => 'site_schedule',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
          1 => 
          array (
            'text' => 'Журнал панели управления',
            'parent' => 'reports',
            'action' => 'system/logs',
            'description' => 'Просмотр последних действий менеджеров сайта',
            'icon' => '',
            'menuindex' => 1,
            'params' => '',
            'handler' => '',
            'permissions' => 'mgr_log_view',
            'namespace' => 'core',
            'id' => 'view_logging',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
          2 => 
          array (
            'text' => 'Журнал ошибок',
            'parent' => 'reports',
            'action' => 'system/event',
            'description' => 'Открыть error.log MODX',
            'icon' => '',
            'menuindex' => 2,
            'params' => '',
            'handler' => '',
            'permissions' => 'view_eventlog',
            'namespace' => 'core',
            'id' => 'eventlog_viewer',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
          3 => 
          array (
            'text' => 'Информация о системе',
            'parent' => 'reports',
            'action' => 'system/info',
            'description' => 'Просмотр информации о сервере, настройках PHP, информации о базе данных MySQL, и многое другое',
            'icon' => '',
            'menuindex' => 3,
            'params' => '',
            'handler' => '',
            'permissions' => 'view_sysinfo',
            'namespace' => 'core',
            'id' => 'view_sysinfo',
            'children' => 
            array (
            ),
            'controller' => '',
          ),
        ),
        'controller' => '',
      ),
    ),
    'controller' => '',
  ),
);