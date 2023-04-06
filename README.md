# SGY WP Boilerplate

## Custom directory structure
Using the [`composer/installers` package]('https://github.com/composer/installers'), we have defined where Wordpress and plugins are installed with settings added to the `installer-paths` and `wordpress-install-dir` in the root composer .json.

The application loads through to `/web` via the root .htaccess redirect settings. The control flow then delegates to the `wp-config.php` file there and flows through to the `/config/application.php` file. This custom setup allows us to define environment specific settings for any project.

## .env settings
The default configuration (if a `WP_ENV` setting is not added in the `.env`) is `production`. Currently the 2 supported environment settings are:
 - development
 - staging
Environment-specific overrides for *development* or *staging* go in their respective `config/environments/{{WP_ENV}}.php` files.
**Note:** Other environment specific settings can be applied by creating a new file in the `/config/environments` directory and referencing that file in the root `.env` file.

*/config/application.php*
```
$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';
if (file_exists($env_config)) {
    require_once $env_config;
}
```
A good default policy is to deviate from the production config as little as possible. Try to define as much of your configuration settings in the `/config/application.php` file as possible.