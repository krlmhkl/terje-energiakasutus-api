<?php
namespace Deployer;
require 'recipe/laravel.php';
//require 'contrib/rsync.php';

// Project name
set('application', 'energia');
set('remote_user', 'virt98394');
set('http_user', 'virt98394');
set('keep_releases', 2);

// Hosts
host('ta20truu.itmajakas.ee')
    ->setHostname('ta20truu.itmajakas.ee')
    ->set('http_user', 'virt98394')
    ->set('deploy_path', '~/domeenid/www.ta20truu.itmajakas.ee/api');

// Tasks
task('deploy:update_code', function () {
    upload(__DIR__ . "/", '{{release_path}}', [
        'options' => [
            '--exclude deploy.php',
            '--exclude .env',
            '--exclude node_modules/',
            '--exclude .git/',
            '--exclude storage/',
            '--exclude vendor/'
        ]
    ]);
});
//Restart opcache
task('opcache:clear', function () {
    run('killall php80-cgi || true');
})->desc('Clear opcache');
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
   // 'artisan:migrate',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'deploy:publish'
]);
after('deploy:failed', 'deploy:unlock');
