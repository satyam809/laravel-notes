In Laravel, database migration is a powerful feature that allows you to version and manage your database schema within your application's codebase. It provides a structured and consistent way to modify database tables, create new tables, and define their structure using PHP code. Database migrations make it easy to collaborate on database changes and deploy them across different environments. Here's an explanation of how database migration works in Laravel with an example:

**Creating a Migration:**

1. To create a new migration, you can use the `make:migration` Artisan command. For example, to create a migration for a "posts" table, run:

   ```bash
   php artisan make:migration create_posts_table
   ```

2. This command generates a new migration file in the `database/migrations` directory. Open the generated migration file to define the structure of your "posts" table.

**Defining the Table Structure:**

3. In the migration file, you can use the `Schema` facade to define the table's structure. For example, you can specify the columns, their data types, and constraints:

   ```php
   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   public function up()
   {
       Schema::create('posts', function (Blueprint $table) {
           $table->id(); // Auto-increment primary key
           $table->string('title');
           $table->text('content');
           $table->timestamps(); // Created at and updated at timestamps
       });
   }

   public function down()
   {
       Schema::dropIfExists('posts');
   }
   ```

4. The `up` method is used to define the table structure, and the `down` method defines how to roll back the migration, typically by dropping the table.

**Running Migrations:**

5. To apply the migration and create the "posts" table, run the following Artisan command:

   ```bash
   php artisan migrate
   ```

**Rolling Back Migrations:**

6. If needed, you can roll back the last batch of migrations using the `migrate:rollback` command:

   ```bash
   php artisan migrate:rollback
   ```

**Example Scenario:**

Let's say you have a Laravel application, and you want to add a "posts" table to store blog posts. You create a migration to define the table structure. The migration file is located at `database/migrations/2023_10_16_123456_create_posts_table.php`. It defines the table with columns for post titles, content, and timestamps.

After running `php artisan migrate`, the "posts" table is created in your database, allowing you to store blog posts. If you later need to modify the table's structure, you can create a new migration and update the table definition without affecting the existing data.

Database migrations in Laravel help you manage your database schema as part of your application's codebase, making it easier to collaborate, version control, and maintain your database structure.