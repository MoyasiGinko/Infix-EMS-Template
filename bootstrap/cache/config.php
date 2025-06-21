<?php return array (
  'apidoc' => 
  array (
    'type' => 'static',
    'laravel' => 
    array (
      'autoload' => false,
      'docs_url' => '/doc',
      'middleware' => 
      array (
      ),
    ),
    'router' => 'laravel',
    'base_url' => NULL,
    'postman' => 
    array (
      'enabled' => true,
      'name' => NULL,
      'description' => NULL,
      'auth' => NULL,
    ),
    'routes' => 
    array (
      0 => 
      array (
        'match' => 
        array (
          'domains' => 
          array (
            0 => '*',
          ),
          'prefixes' => 
          array (
            0 => '*',
          ),
          'versions' => 
          array (
            0 => 'v1',
          ),
        ),
        'include' => 
        array (
        ),
        'exclude' => 
        array (
        ),
        'apply' => 
        array (
          'headers' => 
          array (
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
          ),
          'response_calls' => 
          array (
            'methods' => 
            array (
              0 => 'GET',
            ),
            'config' => 
            array (
              'app.env' => 'documentation',
              'app.debug' => false,
            ),
            'cookies' => 
            array (
            ),
            'queryParams' => 
            array (
            ),
            'bodyParams' => 
            array (
            ),
          ),
        ),
      ),
    ),
    'strategies' => 
    array (
      'metadata' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Metadata\\GetFromDocBlocks',
      ),
      'urlParameters' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\UrlParameters\\GetFromUrlParamTag',
      ),
      'queryParameters' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\QueryParameters\\GetFromQueryParamTag',
      ),
      'headers' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\RequestHeaders\\GetFromRouteRules',
      ),
      'bodyParameters' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\BodyParameters\\GetFromBodyParamTag',
      ),
      'responses' => 
      array (
        0 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\UseTransformerTags',
        1 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\UseResponseTag',
        2 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\UseResponseFileTag',
        3 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\UseApiResourceTags',
        4 => 'Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls',
      ),
    ),
    'logo' => false,
    'default_group' => 'general',
    'example_languages' => 
    array (
      0 => 'bash',
      1 => 'javascript',
    ),
    'fractal' => 
    array (
      'serializer' => NULL,
    ),
    'faker_seed' => NULL,
    'routeMatcher' => 'Mpociot\\ApiDoc\\Matching\\RouteMatcher',
  ),
  'app' => 
  array (
    'app_pro' => false,
    'app_sync' => false,
    'debug' => true,
    'name' => 'Infix Edu',
    'force_https' => false,
    'allow_custom_domain' => false,
    'debug_blacklist' => 
    array (
      '_COOKIE' => 
      array (
      ),
      '_SERVER' => 
      array (
        0 => 'ACLOCAL_PATH',
        1 => 'ALLUSERSPROFILE',
        2 => 'ANT_HOME',
        3 => 'APPDATA',
        4 => 'CATALINA_HOME',
        5 => 'ChocolateyInstall',
        6 => 'ChocolateyLastPathUpdate',
        7 => 'CHROME_CRASHPAD_PIPE_NAME',
        8 => 'CLASSPATH',
        9 => 'COLORTERM',
        10 => 'COMMONPROGRAMFILES',
        11 => 'CommonProgramFiles(x86)',
        12 => 'CommonProgramW6432',
        13 => 'COMPUTERNAME',
        14 => 'COMSPEC',
        15 => 'CONFIG_SITE',
        16 => 'DISPLAY',
        17 => 'DriverData',
        18 => 'EXEPATH',
        19 => 'FPS_BROWSER_APP_PROFILE_STRING',
        20 => 'FPS_BROWSER_USER_PROFILE_STRING',
        21 => 'GIT_ASKPASS',
        22 => 'GIT_PAGER',
        23 => 'HOME',
        24 => 'HOMEDRIVE',
        25 => 'HOMEPATH',
        26 => 'HOSTNAME',
        27 => 'INFOPATH',
        28 => 'INTEL_DEV_REDIST',
        29 => 'JAVA_HOME',
        30 => 'JRE_HOME',
        31 => 'LANG',
        32 => 'LOCALAPPDATA',
        33 => 'LOGONSERVER',
        34 => 'M2_HOME',
        35 => 'MANPATH',
        36 => 'MINGW_CHOST',
        37 => 'MINGW_PACKAGE_PREFIX',
        38 => 'MINGW_PREFIX',
        39 => 'MSYS',
        40 => 'MSYSTEM',
        41 => 'MSYSTEM_CARCH',
        42 => 'MSYSTEM_CHOST',
        43 => 'MSYSTEM_PREFIX',
        44 => 'NUMBER_OF_PROCESSORS',
        45 => 'OLDPWD',
        46 => 'OneDrive',
        47 => 'ORIGINAL_PATH',
        48 => 'ORIGINAL_TEMP',
        49 => 'ORIGINAL_TMP',
        50 => 'ORIGINAL_XDG_CURRENT_DESKTOP',
        51 => 'OS',
        52 => 'PATH',
        53 => 'PATHEXT',
        54 => 'PKG_CONFIG_PATH',
        55 => 'PKG_CONFIG_SYSTEM_INCLUDE_PATH',
        56 => 'PKG_CONFIG_SYSTEM_LIBRARY_PATH',
        57 => 'PLINK_PROTOCOL',
        58 => 'PROCESSOR_ARCHITECTURE',
        59 => 'PROCESSOR_IDENTIFIER',
        60 => 'PROCESSOR_LEVEL',
        61 => 'PROCESSOR_REVISION',
        62 => 'ProgramData',
        63 => 'PROGRAMFILES',
        64 => 'ProgramFiles(x86)',
        65 => 'ProgramW6432',
        66 => 'PROMPT',
        67 => 'PS1',
        68 => 'PSModulePath',
        69 => 'PUBLIC',
        70 => 'PWD',
        71 => 'SHELL',
        72 => 'SHLVL',
        73 => 'SSH_ASKPASS',
        74 => 'SYSTEMDRIVE',
        75 => 'SYSTEMROOT',
        76 => 'TEMP',
        77 => 'TERM_PROGRAM',
        78 => 'TERM_PROGRAM_VERSION',
        79 => 'TMP',
        80 => 'TMPDIR',
        81 => 'USERDOMAIN',
        82 => 'USERDOMAIN_ROAMINGPROFILE',
        83 => 'USERNAME',
        84 => 'USERPROFILE',
        85 => 'VSCODE_GIT_ASKPASS_EXTRA_ARGS',
        86 => 'VSCODE_GIT_ASKPASS_MAIN',
        87 => 'VSCODE_GIT_ASKPASS_NODE',
        88 => 'VSCODE_GIT_IPC_HANDLE',
        89 => 'WebStorm',
        90 => 'WINDIR',
        91 => 'WSLENV',
        92 => 'WT_PROFILE_ID',
        93 => 'WT_SESSION',
        94 => '_',
        95 => 'PHP_SELF',
        96 => 'SCRIPT_NAME',
        97 => 'SCRIPT_FILENAME',
        98 => 'PATH_TRANSLATED',
        99 => 'DOCUMENT_ROOT',
        100 => 'REQUEST_TIME_FLOAT',
        101 => 'REQUEST_TIME',
        102 => 'argv',
        103 => 'argc',
        104 => 'APP_NAME',
        105 => 'APP_ENV',
        106 => 'APP_KEY',
        107 => 'APP_DEBUG',
        108 => 'APP_URL',
        109 => 'LOG_CHANNEL',
        110 => 'LOG_DEPRECATIONS_CHANNEL',
        111 => 'LOG_LEVEL',
        112 => 'DB_CONNECTION',
        113 => 'DB_HOST',
        114 => 'DB_PORT',
        115 => 'DB_DATABASE',
        116 => 'DB_USERNAME',
        117 => 'DB_PASSWORD',
        118 => 'BROADCAST_DRIVER',
        119 => 'CACHE_DRIVER',
        120 => 'QUEUE_CONNECTION',
        121 => 'SESSION_DRIVER',
        122 => 'SESSION_LIFETIME',
        123 => 'MEMCACHED_HOST',
        124 => 'FILESYSTEM_DRIVER',
        125 => 'REDIS_HOST',
        126 => 'REDIS_PASSWORD',
        127 => 'REDIS_PORT',
        128 => 'MAIL_MAILER',
        129 => 'MAIL_HOST',
        130 => 'MAIL_PORT',
        131 => 'MAIL_USERNAME',
        132 => 'MAIL_PASSWORD',
        133 => 'MAIL_ENCRYPTION',
        134 => 'MAIL_FROM_ADDRESS',
        135 => 'MAIL_FROM_NAME',
        136 => 'AWS_ACCESS_KEY_ID',
        137 => 'AWS_SECRET_ACCESS_KEY',
        138 => 'AWS_DEFAULT_REGION',
        139 => 'AWS_BUCKET',
        140 => 'AWS_USE_PATH_STYLE_ENDPOINT',
        141 => 'PUSHER_APP_ID',
        142 => 'PUSHER_APP_KEY',
        143 => 'PUSHER_APP_SECRET',
        144 => 'PUSHER_APP_CLUSTER',
        145 => 'MIX_PUSHER_APP_KEY',
        146 => 'MIX_PUSHER_APP_CLUSTER',
        147 => 'PAGINATION_LIMIT',
        148 => 'BBB_SECURITY_SALT',
        149 => 'BBB_SERVER_BASE_URL',
        150 => 'SHELL_VERBOSITY',
      ),
      '_ENV' => 
      array (
        0 => 'APP_NAME',
        1 => 'APP_ENV',
        2 => 'APP_KEY',
        3 => 'APP_DEBUG',
        4 => 'APP_URL',
        5 => 'LOG_CHANNEL',
        6 => 'LOG_DEPRECATIONS_CHANNEL',
        7 => 'LOG_LEVEL',
        8 => 'DB_CONNECTION',
        9 => 'DB_HOST',
        10 => 'DB_PORT',
        11 => 'DB_DATABASE',
        12 => 'DB_USERNAME',
        13 => 'DB_PASSWORD',
        14 => 'BROADCAST_DRIVER',
        15 => 'CACHE_DRIVER',
        16 => 'QUEUE_CONNECTION',
        17 => 'SESSION_DRIVER',
        18 => 'SESSION_LIFETIME',
        19 => 'MEMCACHED_HOST',
        20 => 'FILESYSTEM_DRIVER',
        21 => 'REDIS_HOST',
        22 => 'REDIS_PASSWORD',
        23 => 'REDIS_PORT',
        24 => 'MAIL_MAILER',
        25 => 'MAIL_HOST',
        26 => 'MAIL_PORT',
        27 => 'MAIL_USERNAME',
        28 => 'MAIL_PASSWORD',
        29 => 'MAIL_ENCRYPTION',
        30 => 'MAIL_FROM_ADDRESS',
        31 => 'MAIL_FROM_NAME',
        32 => 'AWS_ACCESS_KEY_ID',
        33 => 'AWS_SECRET_ACCESS_KEY',
        34 => 'AWS_DEFAULT_REGION',
        35 => 'AWS_BUCKET',
        36 => 'AWS_USE_PATH_STYLE_ENDPOINT',
        37 => 'PUSHER_APP_ID',
        38 => 'PUSHER_APP_KEY',
        39 => 'PUSHER_APP_SECRET',
        40 => 'PUSHER_APP_CLUSTER',
        41 => 'MIX_PUSHER_APP_KEY',
        42 => 'MIX_PUSHER_APP_CLUSTER',
        43 => 'PAGINATION_LIMIT',
        44 => 'BBB_SECURITY_SALT',
        45 => 'BBB_SERVER_BASE_URL',
        46 => 'SHELL_VERBOSITY',
      ),
      '_POST' => 
      array (
      ),
    ),
    'env' => 'production',
    'url' => 'http://localhost/InfixEdu_v8.2.8/public',
    'short_url' => 'localhost/InfixEdu_v8.2.8/public',
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'key' => 'base64:WmF1Q/97brUXtVsoH5aJkzPIcj9VEU6Sb2JhCRKKjq0=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Barryvdh\\DomPDF\\ServiceProvider',
      23 => 'Unicodeveloper\\Paystack\\PaystackServiceProvider',
      24 => 'Laravel\\Passport\\PassportServiceProvider',
      25 => 'App\\Providers\\AppServiceProvider',
      26 => 'App\\Providers\\AuthServiceProvider',
      27 => 'App\\Providers\\EventServiceProvider',
      28 => 'App\\Providers\\RouteServiceProvider',
      29 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
      30 => 'Intervention\\Image\\ImageServiceProvider',
      31 => 'Anhskohbo\\NoCaptcha\\NoCaptchaServiceProvider',
      32 => 'Rahulreghunath\\Textlocal\\ServiceProvider',
      33 => 'Jenssegers\\Agent\\AgentServiceProvider',
      34 => 'Craftsys\\Msg91\\Msg91LaravelServiceProvider',
      35 => 'Yajra\\DataTables\\DataTablesServiceProvider',
      36 => 'App\\Providers\\BroadcastServiceProvider',
      37 => 'Larabuild\\Optionbuilder\\ServiceProvider',
      38 => 'Larabuild\\Pagebuilder\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'PDF' => 'Barryvdh\\DomPDF\\Facade',
      'Carbon' => 'Carbon\\Carbon',
      'Paystack' => 'Unicodeveloper\\Paystack\\Facades\\Paystack',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'Agent' => 'Jenssegers\\Agent\\Facades\\Agent',
      'Msg91' => 'Craftsys\\Msg91\\Facade\\Msg91',
      'DataTables' => 'Yajra\\DataTables\\Facades\\DataTables',
      'Str' => 'Illuminate\\Support\\Str',
      'Toastr' => 'Brian2694\\Toastr\\Facades\\Toastr',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'passport',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'backup' => 
  array (
    'mysql' => 
    array (
      'mysql_path' => 'mysql',
      'mysqldump_path' => 'mysqldump',
      'compress' => false,
      'local-storage' => 
      array (
        'disk' => 'local',
        'path' => 'backups',
      ),
      'cloud-storage' => 
      array (
        'enabled' => false,
        'disk' => 's3',
        'path' => 'path/to/your/backup-folder/',
        'keep-local' => true,
      ),
    ),
  ),
  'bigbluebutton' => 
  array (
    'BBB_SECURITY_SALT' => '8cd8ef52e8e101574e400365b55e11a6',
    'BBB_SERVER_BASE_URL' => 'http://test-install.blindsidenetworks.com/bigbluebutton/',
    'hash_algorithm' => 'sha1',
    'servers' => 
    array (
      'server1' => 
      array (
        'BBB_SECURITY_SALT' => '',
        'BBB_SERVER_BASE_URL' => '',
      ),
      'server2' => 
      array (
        'BBB_SECURITY_SALT' => '',
        'BBB_SERVER_BASE_URL' => '',
      ),
    ),
    'create' => 
    array (
      'passwordLength' => 8,
      'welcomeMessage' => NULL,
      'dialNumber' => NULL,
      'maxParticipants' => 0,
      'logoutUrl' => NULL,
      'record' => false,
      'duration' => 0,
      'isBreakout' => false,
      'moderatorOnlyMessage' => NULL,
      'autoStartRecording' => false,
      'allowStartStopRecording' => true,
      'webcamsOnlyForModerator' => false,
      'logo' => NULL,
      'copyright' => NULL,
      'muteOnStart' => false,
      'lockSettingsDisableCam' => false,
      'lockSettingsDisableMic' => false,
      'lockSettingsDisablePrivateChat' => false,
      'lockSettingsDisablePublicChat' => false,
      'lockSettingsDisableNote' => false,
      'lockSettingsLockedLayout' => false,
      'lockSettingsLockOnJoin' => false,
      'lockSettingsLockOnJoinConfigurable' => false,
      'guestPolicy' => 'ALWAYS_ACCEPT',
    ),
    'join' => 
    array (
      'redirect' => true,
      'joinViaHtml5' => true,
    ),
    'getRecordings' => 
    array (
      'state' => 'any',
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
      ),
    ),
    'prefix' => 'infix_edu_cache',
  ),
  'captcha' => 
  array (
    'secret' => NULL,
    'sitekey' => NULL,
    'options' => 
    array (
      'timeout' => 30,
    ),
  ),
  'clickatell' => 
  array (
    'api_key' => NULL,
  ),
  'coreinfixedu' => 
  array (
    'name' => 'CoreInfixEdu',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'infixedu_v828',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'infixedu_v828',
        'username' => 'root',
        'password' => 'moyasi17',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => NULL,
      ),
      'mysql2' => 
      array (
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3307',
        'database' => 'origin_db',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'infixedu_v828',
        'username' => 'root',
        'password' => 'moyasi17',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'infixedu_v828',
        'username' => 'root',
        'password' => 'moyasi17',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
      'cache' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 1,
      ),
    ),
  ),
  'debug-server' => 
  array (
    'host' => 'tcp://127.0.0.1:9912',
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\fonts',
      'font_cache' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\fonts',
      'temp_dir' => 'C:\\Users\\Moyasi\\AppData\\Local\\Temp',
      'chroot' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8',
      'allowed_protocols' => 
      array (
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
    'orientation' => 'portrait',
    'defines' => 
    array (
      'font_dir' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\fonts/',
      'font_cache' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\fonts/',
      'temp_dir' => 'C:\\Users\\Moyasi\\AppData\\Local\\Temp',
      'chroot' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8',
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => false,
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
      'default_ttl' => 10800,
    ),
    'transactions' => 
    array (
      'handler' => 'db',
    ),
    'temporary_files' => 
    array (
      'local_path' => 'C:\\Users\\Moyasi\\AppData\\Local\\Temp',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\app/public',
        'url' => 'http://localhost/InfixEdu_v8.2.8/public/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
      ),
      'ftp' => 
      array (
        'driver' => 'ftp',
        'host' => NULL,
        'username' => NULL,
        'password' => NULL,
        'port' => NULL,
        'root' => '',
        'passive' => true,
        'ssl' => true,
        'timeout' => 30,
      ),
      'sftp' => 
      array (
        'driver' => 'sftp',
        'host' => '139.59.7.19',
        'username' => 'rashed',
        'password' => '@midhakaN@!',
        'port' => 21,
        'root' => '',
        'passive' => true,
        'ssl' => true,
        'timeout' => 30,
      ),
      'custom' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8/uploads',
      ),
      'log' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\logs',
      ),
    ),
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => false,
      'report_queries' => true,
      'maximum_number_of_collected_queries' => 200,
      'report_query_bindings' => true,
      'report_view_data' => true,
      'grouping_type' => NULL,
    ),
    'send_logs_as_events' => true,
  ),
  'google-calendar' => 
  array (
    'default_auth_profile' => 'service_account',
    'auth_profiles' => 
    array (
      'service_account' => 
      array (
        'credentials_json' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\app/google-calendar/service-account-credentials.json',
      ),
      'oauth' => 
      array (
        'credentials_json' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\app/google-calendar/oauth-credentials.json',
        'token_json' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\app/google-calendar/oauth-token.json',
      ),
    ),
    'calendar_id' => NULL,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'himalayasms' => 
  array (
    'key' => '560F935496062E',
    'senderid' => 'KalashAlert',
    'campaign' => '5144',
    'routeid' => '125',
    'type' => 'text',
    'api_endpoint' => 'https://sms.techhimalaya.com/base/smsapi/index.php',
    'methods' => 
    array (
      'send' => 'https://sms.techhimalaya.com/base/smsapi/index.php',
    ),
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'light',
    'enable_share_button' => true,
    'register_commands' => false,
    'ignored_solution_providers' => 
    array (
      0 => 'Facade\\Ignition\\SolutionProviders\\MissingPackageSolutionProvider',
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'laravel-page-speed' => 
  array (
    'enable' => false,
  ),
  'laravelpwa' => 
  array (
    'name' => 'Infix Edu',
    'manifest' => 
    array (
      'name' => 'Infix Edu',
      'short_name' => 'Infix Edu',
      'start_url' => 'http://localhost/InfixEdu_v8.2.8/public',
      'background_color' => '#ffffff',
      'theme_color' => '#000000',
      'display' => 'standalone',
      'orientation' => 'any',
      'status_bar' => 'black',
      'icons' => 
      array (
        '72x72' => 
        array (
          'path' => '/images/icons/icon-72x72.png',
          'purpose' => 'any',
        ),
        '96x96' => 
        array (
          'path' => '/images/icons/icon-96x96.png',
          'purpose' => 'any',
        ),
        '128x128' => 
        array (
          'path' => '/images/icons/icon-128x128.png',
          'purpose' => 'any',
        ),
        '144x144' => 
        array (
          'path' => '/images/icons/icon-144x144.png',
          'purpose' => 'any',
        ),
        '152x152' => 
        array (
          'path' => '/images/icons/icon-152x152.png',
          'purpose' => 'any',
        ),
        '192x192' => 
        array (
          'path' => '/images/icons/icon-192x192.png',
          'purpose' => 'any',
        ),
        '384x384' => 
        array (
          'path' => '/images/icons/icon-384x384.png',
          'purpose' => 'any',
        ),
        '512x512' => 
        array (
          'path' => '/images/icons/icon-512x512.png',
          'purpose' => 'any',
        ),
      ),
      'splash' => 
      array (
        '640x1136' => '/images/icons/splash-640x1136.png',
        '750x1334' => '/images/icons/splash-750x1334.png',
        '828x1792' => '/images/icons/splash-828x1792.png',
        '1125x2436' => '/images/icons/splash-1125x2436.png',
        '1242x2208' => '/images/icons/splash-1242x2208.png',
        '1242x2688' => '/images/icons/splash-1242x2688.png',
        '1536x2048' => '/images/icons/splash-1536x2048.png',
        '1668x2224' => '/images/icons/splash-1668x2224.png',
        '1668x2388' => '/images/icons/splash-1668x2388.png',
        '2048x2732' => '/images/icons/splash-2048x2732.png',
      ),
      'shortcuts' => 
      array (
        0 => 
        array (
          'name' => 'Shortcut Link 1',
          'description' => 'Shortcut Link 1 Description',
          'url' => 'http://localhost/InfixEdu_v8.2.8/public',
          'icons' => 
          array (
            'src' => '/images/icons/icon-72x72.png',
            'purpose' => 'any',
          ),
        ),
        1 => 
        array (
          'name' => 'Shortcut Link 2',
          'description' => 'Shortcut Link 2 Description',
          'url' => 'http://localhost/InfixEdu_v8.2.8/public',
        ),
      ),
      'custom' => 
      array (
      ),
    ),
  ),
  'logging' => 
  array (
    'default' => 'daily',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 7,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'url' => NULL,
        'host' => 'sandbox.smtp.mailtrap.io',
        'port' => '2525',
        'encryption' => 'tls',
        'username' => '',
        'password' => '',
        'timeout' => NULL,
        'local_domain' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@aora.com',
      'name' => 'Infix Edu',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'modules' => 
  array (
    'namespace' => 'Modules',
    'stubs' => 
    array (
      'enabled' => false,
      'path' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8/vendor/nwidart/laravel-modules/src/Commands/stubs',
      'files' => 
      array (
        'routes/web' => 'Routes/web.php',
        'routes/api' => 'Routes/api.php',
        'views/index' => 'Resources/views/index.blade.php',
        'views/master' => 'Resources/views/layouts/master.blade.php',
        'scaffold/config' => 'Config/config.php',
        'composer' => 'composer.json',
        'assets/js/app' => 'Resources/assets/js/app.js',
        'assets/sass/app' => 'Resources/assets/sass/app.scss',
        'webpack' => 'webpack.mix.js',
        'package' => 'package.json',
      ),
      'replacements' => 
      array (
        'routes/web' => 
        array (
          0 => 'LOWER_NAME',
          1 => 'STUDLY_NAME',
        ),
        'routes/api' => 
        array (
          0 => 'LOWER_NAME',
        ),
        'webpack' => 
        array (
          0 => 'LOWER_NAME',
        ),
        'json' => 
        array (
          0 => 'LOWER_NAME',
          1 => 'STUDLY_NAME',
          2 => 'MODULE_NAMESPACE',
          3 => 'PROVIDER_NAMESPACE',
        ),
        'views/index' => 
        array (
          0 => 'LOWER_NAME',
        ),
        'views/master' => 
        array (
          0 => 'LOWER_NAME',
          1 => 'STUDLY_NAME',
        ),
        'scaffold/config' => 
        array (
          0 => 'STUDLY_NAME',
        ),
        'composer' => 
        array (
          0 => 'LOWER_NAME',
          1 => 'STUDLY_NAME',
          2 => 'VENDOR',
          3 => 'AUTHOR_NAME',
          4 => 'AUTHOR_EMAIL',
          5 => 'MODULE_NAMESPACE',
          6 => 'PROVIDER_NAMESPACE',
        ),
      ),
      'gitkeep' => true,
    ),
    'paths' => 
    array (
      'modules' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\Modules',
      'assets' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\public\\modules',
      'migration' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\database/migrations',
      'generator' => 
      array (
        'config' => 
        array (
          'path' => 'Config',
          'generate' => true,
        ),
        'command' => 
        array (
          'path' => 'Console',
          'generate' => true,
        ),
        'migration' => 
        array (
          'path' => 'Database/Migrations',
          'generate' => true,
        ),
        'seeder' => 
        array (
          'path' => 'Database/Seeders',
          'generate' => true,
        ),
        'factory' => 
        array (
          'path' => 'Database/factories',
          'generate' => true,
        ),
        'model' => 
        array (
          'path' => 'Entities',
          'generate' => true,
        ),
        'routes' => 
        array (
          'path' => 'Routes',
          'generate' => true,
        ),
        'controller' => 
        array (
          'path' => 'Http/Controllers',
          'generate' => true,
        ),
        'filter' => 
        array (
          'path' => 'Http/Middleware',
          'generate' => true,
        ),
        'request' => 
        array (
          'path' => 'Http/Requests',
          'generate' => true,
        ),
        'provider' => 
        array (
          'path' => 'Providers',
          'generate' => true,
        ),
        'assets' => 
        array (
          'path' => 'Resources/assets',
          'generate' => true,
        ),
        'lang' => 
        array (
          'path' => 'Resources/lang',
          'generate' => true,
        ),
        'views' => 
        array (
          'path' => 'Resources/views',
          'generate' => true,
        ),
        'test' => 
        array (
          'path' => 'Tests/Unit',
          'generate' => true,
        ),
        'test-feature' => 
        array (
          'path' => 'Tests/Feature',
          'generate' => true,
        ),
        'repository' => 
        array (
          'path' => 'Repositories',
          'generate' => false,
        ),
        'event' => 
        array (
          'path' => 'Events',
          'generate' => false,
        ),
        'listener' => 
        array (
          'path' => 'Listeners',
          'generate' => false,
        ),
        'policies' => 
        array (
          'path' => 'Policies',
          'generate' => false,
        ),
        'rules' => 
        array (
          'path' => 'Rules',
          'generate' => false,
        ),
        'jobs' => 
        array (
          'path' => 'Jobs',
          'generate' => false,
        ),
        'emails' => 
        array (
          'path' => 'Emails',
          'generate' => false,
        ),
        'notifications' => 
        array (
          'path' => 'Notifications',
          'generate' => false,
        ),
        'resource' => 
        array (
          'path' => 'Transformers',
          'generate' => false,
        ),
      ),
    ),
    'commands' => 
    array (
      0 => 'Nwidart\\Modules\\Commands\\ChannelMakeCommand',
      1 => 'Nwidart\\Modules\\Commands\\CheckLangCommand',
      2 => 'Nwidart\\Modules\\Commands\\CommandMakeCommand',
      3 => 'Nwidart\\Modules\\Commands\\ComponentClassMakeCommand',
      4 => 'Nwidart\\Modules\\Commands\\ComponentViewMakeCommand',
      5 => 'Nwidart\\Modules\\Commands\\ControllerMakeCommand',
      6 => 'Nwidart\\Modules\\Commands\\DisableCommand',
      7 => 'Nwidart\\Modules\\Commands\\DumpCommand',
      8 => 'Nwidart\\Modules\\Commands\\EnableCommand',
      9 => 'Nwidart\\Modules\\Commands\\EventMakeCommand',
      10 => 'Nwidart\\Modules\\Commands\\FactoryMakeCommand',
      11 => 'Nwidart\\Modules\\Commands\\InstallCommand',
      12 => 'Nwidart\\Modules\\Commands\\JobMakeCommand',
      13 => 'Nwidart\\Modules\\Commands\\LaravelModulesV6Migrator',
      14 => 'Nwidart\\Modules\\Commands\\ListCommand',
      15 => 'Nwidart\\Modules\\Commands\\ListenerMakeCommand',
      16 => 'Nwidart\\Modules\\Commands\\MailMakeCommand',
      17 => 'Nwidart\\Modules\\Commands\\MiddlewareMakeCommand',
      18 => 'Nwidart\\Modules\\Commands\\MigrateCommand',
      19 => 'Nwidart\\Modules\\Commands\\MigrateFreshCommand',
      20 => 'Nwidart\\Modules\\Commands\\MigrateRefreshCommand',
      21 => 'Nwidart\\Modules\\Commands\\MigrateResetCommand',
      22 => 'Nwidart\\Modules\\Commands\\MigrateRollbackCommand',
      23 => 'Nwidart\\Modules\\Commands\\MigrateStatusCommand',
      24 => 'Nwidart\\Modules\\Commands\\MigrationMakeCommand',
      25 => 'Nwidart\\Modules\\Commands\\ModelMakeCommand',
      26 => 'Nwidart\\Modules\\Commands\\ModelPruneCommand',
      27 => 'Nwidart\\Modules\\Commands\\ModelShowCommand',
      28 => 'Nwidart\\Modules\\Commands\\ModuleDeleteCommand',
      29 => 'Nwidart\\Modules\\Commands\\ModuleMakeCommand',
      30 => 'Nwidart\\Modules\\Commands\\NotificationMakeCommand',
      31 => 'Nwidart\\Modules\\Commands\\ObserverMakeCommand',
      32 => 'Nwidart\\Modules\\Commands\\PolicyMakeCommand',
      33 => 'Nwidart\\Modules\\Commands\\ProviderMakeCommand',
      34 => 'Nwidart\\Modules\\Commands\\PublishCommand',
      35 => 'Nwidart\\Modules\\Commands\\PublishConfigurationCommand',
      36 => 'Nwidart\\Modules\\Commands\\PublishMigrationCommand',
      37 => 'Nwidart\\Modules\\Commands\\PublishTranslationCommand',
      38 => 'Nwidart\\Modules\\Commands\\RequestMakeCommand',
      39 => 'Nwidart\\Modules\\Commands\\ResourceMakeCommand',
      40 => 'Nwidart\\Modules\\Commands\\RouteProviderMakeCommand',
      41 => 'Nwidart\\Modules\\Commands\\RuleMakeCommand',
      42 => 'Nwidart\\Modules\\Commands\\SeedCommand',
      43 => 'Nwidart\\Modules\\Commands\\SeedMakeCommand',
      44 => 'Nwidart\\Modules\\Commands\\SetupCommand',
      45 => 'Nwidart\\Modules\\Commands\\TestMakeCommand',
      46 => 'Nwidart\\Modules\\Commands\\UnUseCommand',
      47 => 'Nwidart\\Modules\\Commands\\UpdateCommand',
      48 => 'Nwidart\\Modules\\Commands\\UseCommand',
    ),
    'scan' => 
    array (
      'enabled' => false,
      'paths' => 
      array (
        0 => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\vendor/*/*',
      ),
    ),
    'composer' => 
    array (
      'vendor' => 'nwidart',
      'author' => 
      array (
        'name' => 'Nicolas Widart',
        'email' => 'n.widart@gmail.com',
      ),
    ),
    'cache' => 
    array (
      'enabled' => false,
      'key' => 'laravel-modules',
      'lifetime' => 60,
    ),
    'register' => 
    array (
      'translations' => true,
      'files' => 'register',
    ),
    'activators' => 
    array (
      'file' => 
      array (
        'class' => 'Nwidart\\Modules\\Activators\\FileActivator',
        'statuses-file' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\modules_statuses.json',
        'cache-key' => 'activator.installed',
        'cache-lifetime' => 604800,
      ),
    ),
    'activator' => 'file',
  ),
  'msg91' => 
  array (
    'auth_key' => NULL,
    'sender_id' => NULL,
    'route' => NULL,
    'country' => NULL,
    'limit_credit' => true,
  ),
  'optionbuilder' => 
  array (
    'layout' => 'layouts.builder',
    'section' => 'content',
    'style_var' => 'styles',
    'script_var' => 'scripts',
    'db_prefix' => 'infixedu__',
    'url_prefix' => '',
    'route_middleware' => 
    array (
    ),
    'developer_mode' => 'yes',
    'add_bootstrap' => 'yes',
    'add_jquery' => 'yes',
    'add_select2' => 'yes',
  ),
  'pagebuilder' => 
  array (
    'layout' => 'layouts.builder',
    'section' => 'content',
    'style_var' => 'styles',
    'script_var' => 'scripts',
    'site_layout' => 'layouts.pb-site',
    'site_section' => 'site_content',
    'site_style_var' => 'styles',
    'site_script_var' => 'scripts',
    'db_prefix' => 'infixedu__',
    'url_prefix' => '',
    'route_middleware' => 
    array (
      0 => 'auth',
      1 => 'subdomain',
    ),
    'add_bootstrap' => 'yes',
    'add_jquery' => 'yes',
  ),
  'parentregistration' => 
  array (
    'name' => 'ParentRegistration',
  ),
  'passport' => 
  array (
    'guard' => 'web',
    'private_key' => NULL,
    'public_key' => NULL,
    'client_uuids' => false,
    'personal_access_client' => 
    array (
      'id' => NULL,
      'secret' => NULL,
    ),
  ),
  'paymentGateway' => 
  array (
    'Xendit' => 'App\\PaymentGateway\\XenditPayment',
    'PayPal' => 'App\\PaymentGateway\\PaypalPayment',
    'Stripe' => 'App\\PaymentGateway\\StripePayment',
    'Paystack' => 'App\\PaymentGateway\\PaystackPayment',
    'RazorPay' => 'App\\PaymentGateway\\RazorPayPayment',
    'MercadoPago' => 'App\\PaymentGateway\\MercadoPagoPayment',
    'CcAveune' => 'App\\PaymentGateway\\CcAveunePayment',
    'PhonePe' => 'App\\PaymentGateway\\PhonePay',
  ),
  'paypal' => 
  array (
    'client_id' => '',
    'secret' => '',
    'settings' => 
    array (
      'mode' => 'sandbox',
      'http.ConnectionTimeOut' => 30,
      'log.LogEnabled' => true,
      'log.FileName' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage/logs/paypal.log',
      'log.LogLevel' => 'ERROR',
    ),
  ),
  'paystack' => 
  array (
    'publicKey' => false,
    'secretKey' => false,
    'paymentUrl' => 'https://api.paystack.co',
    'merchantEmail' => false,
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'rolepermission' => 
  array (
    'name' => 'RolePermission',
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
    'fcm' => 
    array (
      'key' => NULL,
    ),
    'google' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect_uri' => NULL,
      'webhook_uri' => NULL,
      'scopes' => 
      array (
        0 => 'https://www.googleapis.com/auth/userinfo.email',
        1 => 'https://www.googleapis.com/auth/calendar',
      ),
      'approval_prompt' => 'force',
      'access_type' => 'offline',
      'include_granted_scopes' => true,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'infix_edu_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'spondonit' => 
  array (
    'item_id' => '101101',
    'module_manager_model' => 'App\\InfixModuleManager',
    'module_manager_table' => 'infix_module_managers',
    'settings_model' => 'App\\SmGeneralSettings',
    'module_model' => 'Nwidart\\Modules\\Facades\\Module',
    'user_model' => 'App\\User',
    'settings_table' => 'sm_general_settings',
    'database_file' => 'infixeduV6.sql',
  ),
  'telescope' => 
  array (
    'domain' => NULL,
    'path' => 'telescope',
    'driver' => 'database',
    'storage' => 
    array (
      'database' => 
      array (
        'connection' => 'mysql',
      ),
    ),
    'enabled' => true,
    'middleware' => 
    array (
      0 => 'web',
      1 => 'Laravel\\Telescope\\Http\\Middleware\\Authorize',
    ),
    'ignore_paths' => 
    array (
    ),
    'ignore_commands' => 
    array (
    ),
    'watchers' => 
    array (
      'Laravel\\Telescope\\Watchers\\CacheWatcher' => true,
      'Laravel\\Telescope\\Watchers\\CommandWatcher' => 
      array (
        'enabled' => true,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\DumpWatcher' => true,
      'Laravel\\Telescope\\Watchers\\EventWatcher' => true,
      'Laravel\\Telescope\\Watchers\\ExceptionWatcher' => true,
      'Laravel\\Telescope\\Watchers\\JobWatcher' => true,
      'Laravel\\Telescope\\Watchers\\LogWatcher' => true,
      'Laravel\\Telescope\\Watchers\\MailWatcher' => true,
      'Laravel\\Telescope\\Watchers\\ModelWatcher' => 
      array (
        'enabled' => true,
        'events' => 
        array (
          0 => 'eloquent.*',
        ),
      ),
      'Laravel\\Telescope\\Watchers\\NotificationWatcher' => true,
      'Laravel\\Telescope\\Watchers\\QueryWatcher' => 
      array (
        'enabled' => true,
        'ignore_packages' => true,
        'slow' => 100,
      ),
      'Laravel\\Telescope\\Watchers\\RedisWatcher' => true,
      'Laravel\\Telescope\\Watchers\\RequestWatcher' => 
      array (
        'enabled' => true,
        'size_limit' => 64,
      ),
      'Laravel\\Telescope\\Watchers\\GateWatcher' => 
      array (
        'enabled' => true,
        'ignore_abilities' => 
        array (
        ),
        'ignore_packages' => true,
      ),
      'Laravel\\Telescope\\Watchers\\ScheduleWatcher' => true,
    ),
  ),
  'templatesettings' => 
  array (
    'name' => 'TemplateSettings',
  ),
  'textlocal' => 
  array (
    'key' => 'rghcuvdUML0-WSnvgevxlu2ptIANgeLh7vNluVSIco',
    'sender' => 'TXTLCL',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
    ),
  ),
  'toastr' => 
  array (
    'options' => 
    array (
      'closeButton' => true,
      'debug' => false,
      'newestOnTop' => false,
      'progressBar' => false,
      'positionClass' => 'toast-top-right',
      'preventDuplicates' => false,
      'onclick' => NULL,
      'showDuration' => '300',
      'hideDuration' => '1000',
      'timeOut' => '5000',
      'extendedTimeOut' => '1000',
      'showEasing' => 'swing',
      'hideEasing' => 'linear',
      'showMethod' => 'fadeIn',
      'hideMethod' => 'fadeOut',
    ),
  ),
  'toyyibpay' => 
  array (
    'client_secret' => '',
    'redirect_uri' => '',
    'sandbox' => true,
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
  ),
  'twilio' => 
  array (
    'twilio' => 
    array (
      'default' => 'twilio',
      'connections' => 
      array (
        'twilio' => 
        array (
          'sid' => '',
          'token' => '',
          'from' => '',
        ),
      ),
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\resources\\views',
    ),
    'compiled' => 'C:\\xampp2\\htdocs\\InfixEdu_v8.2.8\\storage\\framework\\views',
  ),
  'vimeo' => 
  array (
    'default' => 'main',
    'connections' => 
    array (
      'main' => 
      array (
        'common_use' => false,
        'client' => NULL,
        'secret' => NULL,
        'access' => NULL,
      ),
      'alternative' => 
      array (
        'client_id' => 'your-alt-client-id',
        'client_secret' => 'your-alt-client-secret',
        'access_token' => NULL,
      ),
    ),
  ),
  'zoom' => 
  array (
    'apiKey' => NULL,
    'apiSecret' => NULL,
    'baseUrl' => 'https://api.zoom.us/v2/',
    'token_life' => 604800,
    'authentication_method' => 'jwt',
    'max_api_calls_per_request' => '5',
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'authenticate_session' => 'Laravel\\Sanctum\\Http\\Middleware\\AuthenticateSession',
      'encrypt_cookies' => 'App\\Http\\Middleware\\EncryptCookies',
      'verify_csrf_token' => 'App\\Http\\Middleware\\VerifyCsrfToken',
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
      'starts_with' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
    'callback' => 
    array (
      0 => '$',
      1 => '$.',
      2 => 'function',
    ),
  ),
  'behaviourrecords' => 
  array (
    'name' => 'BehaviourRecords',
  ),
  'bulkprint' => 
  array (
    'name' => 'BulkPrint',
  ),
  'chat' => 
  array (
    'name' => 'Chat',
  ),
  'downloadcenter' => 
  array (
    'name' => 'DownloadCenter',
  ),
  'examplan' => 
  array (
    'name' => 'ExamPlan',
  ),
  'fees' => 
  array (
    'name' => 'Fees',
  ),
  'lesson' => 
  array (
    'name' => 'Lesson',
  ),
  'menumanage' => 
  array (
    'name' => 'MenuManage',
  ),
  'studentabsentnotification' => 
  array (
    'name' => 'StudentAbsentNotification',
  ),
  'twofactorauth' => 
  array (
    'name' => 'TwoFactorAuth',
  ),
  'wallet' => 
  array (
    'name' => 'Wallet',
  ),
);
