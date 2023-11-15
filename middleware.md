In Laravel, middleware plays a crucial role in filtering HTTP requests entering your application. Middleware provides a convenient mechanism for filtering HTTP requests and responses in a customizable and reusable way. Middleware can be used for tasks like authentication, authorization, logging, CORS handling, and more.

Here's an explanation of middleware in Laravel with examples:

**Defining Middleware:**

You can create custom middleware in Laravel by using the `make:middleware` Artisan command. For example, let's create a middleware called "CheckAge" that will check if a user is above 18 years old before allowing access to a route.

```bash
php artisan make:middleware CheckAge
```

This command will generate a `CheckAge` middleware file in the `app/Http/Middleware` directory.

**Middleware Implementation:**

Now, let's open the `CheckAge` middleware file and define the logic:

```php
namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    public function handle($request, Closure $next)
    {
        if ($request->age >= 18) {
            return $next($request);
        }

        return redirect('home');
    }
}
```

In this example, the `CheckAge` middleware checks if the "age" parameter in the request is greater than or equal to 18. If it is, the request is allowed to continue to the route; otherwise, the user is redirected to the "home" route.

**Applying Middleware:**

You can apply middleware to routes in the `web.php` file, which is typically used for web-based routes. For instance:

```php
use App\Http\Middleware\CheckAge;

Route::get('adults-only', function () {
    // This route is for adults only
})->middleware(CheckAge::class);
```

In this example, we use the `middleware` method to apply the `CheckAge` middleware to the "adults-only" route.

**Global Middleware:**

You can also define middleware that runs on every HTTP request by adding it to the `$middleware` property in the `App/Http/Kernel.php` file. These are called global middleware and are executed for every HTTP request.

```php
protected $middleware = [
    // ...
    \App\Http\Middleware\CheckAge::class,
];
```

**Route Groups:**

Middleware can be applied to multiple routes using route groups. For example:

```php
Route::middleware([CheckAge::class])->group(function () {
    Route::get('adults-only', function () {
        // This route is for adults only
    });

    Route::get('another-adults-route', function () {
        // Another route for adults
    });
});
```

In this case, both "adults-only" and "another-adults-route" routes use the `CheckAge` middleware.

Laravel's middleware feature provides a flexible and efficient way to handle common tasks and filter requests and responses. It helps in keeping your code clean, organized, and DRY (Don't Repeat Yourself).