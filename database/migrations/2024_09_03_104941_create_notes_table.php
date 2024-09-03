<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    public function up()
    {
        // Crée une table appelée "notes"
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); // Crée une colonne "id" qui est la clé primaire de la table
            $table->string('title'); // Crée une colonne "title" de type string (chaîne de caractères)
            $table->text('content'); // Crée une colonne "content" de type texte
            $table->timestamps(); // Crée deux colonnes "created_at" et "updated_at" pour gérer les dates de création et de mise à jour automatiquement
        });
    }

    public function down()
    {
        // Supprime la table "notes" si elle existe
        Schema::dropIfExists('notes');
    }
}
