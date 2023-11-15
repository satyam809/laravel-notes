Routing in Laravel is the process of defining how your application responds to incoming HTTP requests. It is a fundamental part of the framework that helps you map URLs to specific controller methods, allowing you to create clean and structured URLs for your application. Routing in Laravel is defined in the `routes/web.php` or `routes/api.php` file.

Here's an example of how routing works in Laravel:

1. **Basic Route:**

   In your `routes/web.php` file, you can define a basic route like this:

   ```php
   Route::get('/hello', function () {
       return 'Hello, World!';
   });
   ```

   In this example, when a user visits the URL "/hello" in their browser, they will see the message "Hello, World!"

2. **Route Parameters:**

   You can also define routes with parameters to capture values from the URL. For example:

   ```php
   Route::get('/user/{id}', function ($id) {
       return 'User ID: ' . $id;
   });
   ```

   Now, when a user visits "/user/123," the value "123" will be captured and displayed as "User ID: 123."

3. **Named Routes:**

   Named routes allow you to assign a name to a route, making it easier to reference in your code. For example:

   ```php
   Route::get('/profile', 'UserController@showProfile')->name('profile');
   ```

   You can generate URLs for this route using the route's name, like this:

   ```php
   $url = route('profile');
   ```

4. **Controller Routes:**

   It's a good practice to define routes that map to controller methods. Controllers help separate your application logic from your routes. For example:

   ```php
   Route::get('/users', 'UserController@index');
   ```

   In this case, when a user visits "/users," the `index` method of the `UserController` will be executed.

5. **Middleware:**

   You can apply middleware to routes to perform actions before a request reaches the controller. Middleware can be used for tasks like authentication, authorization, and logging. For example:

   ```php
   Route::get('/admin', 'AdminController@index')->middleware('auth');
   ```

   The `auth` middleware will ensure that only authenticated users can access the "/admin" route.

6. **Grouping Routes:**

   You can group routes to apply common attributes, such as middleware, to a set of routes. For example, grouping routes that require authentication:

   ```php
   Route::middleware(['auth'])->group(function () {
       Route::get('/dashboard', 'DashboardController@index');
       Route::get('/profile', 'ProfileController@show');
   });
   ```

   In this example, both "/dashboard" and "/profile" routes require authentication.

Routing in Laravel allows you to create clean, structured, and flexible URLs for your application and efficiently organize your code. It's a fundamental concept for building web applications in Laravel.