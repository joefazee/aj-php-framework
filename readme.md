# AJ - PHP Framework

A mini-framework I designed to show my students how HTTP frameworks work and, more importantly, teach them OOP.

The framework follows a similar routing pattern found in Laravel or Express. Below is how to run it.

## How to install

We use composer to manage to autoload—no external libraries.

```bash
get clone git@github.com:joefazee/aj-php-framework.git
cd aj-php-framework
composer install
php -S localhost:9000 -t public
```

## Example routes

To add new route, navigate to `routes/web.php`

```php
use \App\Controllers\HomeController;

$router->get('/', [HomeController::class]); // Class-based call back

// Function callback
$router->get('/login', function($req, $res) {
	$res->render('auth/login');
});


$router->post('/login', function($req, $res) {

	$identity = $req->input('identity');
	$password = $req->input('password');

	if($identity === 'admin' && $password == 'admin') {

	}

	$res->redirect('/login');

});

// Dynamic routing
$router->get('/users/{username}', function($req, $res) {
    var_dump($req->username);
});

// More dynamic routing
$router->get('/users/{username}/profile/{id}', function($req, $res) {
    var_dump($req->username);
    ar_dump($req->id);
});

```

## Some information about routing

The framework supports a function callback or class-based callbacks.

# Important Improvement

The framework, as it is now, is not optimized for production. Here is a list of essential steps that need to happen.

- Security (Input sanitization, CSRF etc )
- Dependency Managament (Bring in an iOC container)
- Database access interface
- Change from regex (Maybe we should cache the compiled route for now) routing to Trie data structure or something to make it faster
- Add Testing
- Middleware support
- Authentication
- Command Line interface

If you want to have fun, make a PR
