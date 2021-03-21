
php artisan make:migration create_likes_table --create=likes
php artisan migrate
php artisan make:model Like
php artisan make:controller PostLikeController

php artisan make:policy PostPolicy
php artisan make:controller UserPostController
php artisan make:component Post
php artisan make:mail PostLiked --markdown=emails.posts.post_liked
php artisan make:migration add_soft_deletes_to_likes_table --table=likes
php artisan migrate