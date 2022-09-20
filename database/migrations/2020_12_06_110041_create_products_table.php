<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('period');
            $table->unsignedInteger('website');
            $table->unsignedInteger('storage');
            $table->unsignedInteger('bandwidth');
            $table->unsignedInteger('ram')->nullable();
            $table->unsignedInteger('cpu')->nullable();
            $table->unsignedInteger('database')->nullable();
            $table->unsignedInteger('subdomains')->nullable();
            $table->unsignedInteger('addondomains')->nullable();
            $table->unsignedInteger('email')->nullable();
            $table->unsignedInteger('ftp')->nullable();
            $table->unsignedInteger('cronjobs')->nullable();
            $table->boolean('freedomain')->default(1);
            $table->boolean('freessl')->default(1);
            $table->boolean('freecdn')->default(1);
            // $table->boolean('is_filterable')->default(0);
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('special_price', 8, 2)->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('featured')->default(1);
 
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}