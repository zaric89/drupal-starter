# Drupal starter project
## Docksal powered Drupal 8 With Composer Installation


### Setup instructions

1. Clone this repo into your Projects directory

    ```
    git clone git@git.etondigital.com:drupal/drupal-starter.git drupal-starter
    cd drupal-starter
    ```

2. Initialize the site

    This will initialize local settings and install the site via drush

    ```
    fin init
    ```

3. Download project database from the Dev server

    ```
    (Example for importing Drupal starter db from docksal settings dir)
    fin db import .docksal/settings/ds.sql
    ```

4. Point your browser to

    ```
    http://drupal-starter.docksal
    ```

### Start Gulp watch from container

    cd web/themes/{THEME_NAME}
    fin exec ./node_modules/gulp/bin/gulp.js watch

