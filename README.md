cara clone :
ambil url dari proyek: git clone url:clone
masuk ke proyek: cd namafolder
ini optional: git config --global user.email "you@example.com" atau git config --global user.name "Your Name"
git add .
git commit -m "message"
git push
Melakukan update pada folder lokal komputer: git pull

Setting laravel :
-Regenerate vendor folder
composer update
-regenerate the autoload.php
composer dump-autoload
-Reinstall composer
composer install
-Regenerate env
copy .env.example .env (Windows)
cp .env.example .env (Linux/Git Bash)
-Generate new key
php artisan key:generate
