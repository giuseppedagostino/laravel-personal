<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// includo il model
use App\Article;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('title', 100); // titolo
            $table->string('slug'); // slug
            $table->string('subtitle', 200); // sottotitolo
            $table->string('image'); // immagine
            $table->string('author', 80); // autore
            $table->text('content'); // contenuto
            $table->date('publication_date'); // data di pubblicazione

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
        Schema::dropIfExists('articles');
    }
}
