<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
	<a href="https://kredo.jp/">
		<img src="https://kredo.jp/wp/wp-content/themes/kreedo-theme/images/common/logo_top.png">
	</a>
</p>

Setup
===========
1. Clone repository<br>
`git clone git@github.com:Kredo-It-Abroad/Kredo-Career.git`

2. Go to your directory<br>
`cd [your_directory]`

3. Install Composer Libraries<br>
`composer install`

5. Setup Environment<br>
`[create database]`<br>
`[create .env file to your directory]`<br>
`php artisan migrate --seed`<br>

6. Install Node Modules<br>
`npm install`

7. Render your css and js files<br>
`npm run dev` or `npm run production`

7. Setup file storage<br>
`php artisan storage:link`
