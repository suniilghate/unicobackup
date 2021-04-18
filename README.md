##1. .env configuration
    ```bash
    GOOGLE_DRIVE_CLIENT_ID=354234797542-hiptlqd6j8jdk3ptgikhg7tc3ebulb1c.apps.googleusercontent.com
    GOOGLE_DRIVE_CLIENT_SECRET=cSTubzWmkJaiWEigXZbiAiCU
    GOOGLE_DRIVE_REFRESH_TOKEN=1//04qQIdrDqy_cHCgYIARAAGAQSNwF-L9IrKcVWPVvt_CihHiqR0N5yoYC6yQySJt0BT-Cs2cepvU6zohuCcr_GoCqva_zjYI67_gM
    GOOGLE_DRIVE_FOLDER_ID=1kQNVhJmDv98Sle_vppleyMQaCJwz4TmE
    ```
##2. crontab settings/configuration
    ```bash
    crontab -e
    
    * * * * * cd /path_of_application && php artisan schedule:run >> /dev/null 2>&1
    ```
##3. To run the scheduler explicitly 
    ```bash
    - php artisan backup:run --only-db --disable-notifications
    - php artisan schedule:work    
    ```
##4. User table seeder
    ```bash
    - php artisan db:seed --class=UserSeeder
    ```
##5. Steps to clone the project
    ```bash
    git clone https://github.com/suniilghate/unicobackup.git <projectFolder>
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan db:seed --class=UserSeeder
    php artisan serve
    ```        
