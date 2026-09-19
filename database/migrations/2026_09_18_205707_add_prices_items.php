<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('wholesale_price')->default(0)->index()->after('price');
            $table->unsignedBigInteger('purchase_price')->default(0)->index()->after('wholesale_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropIndex(['wholesale_price']);
            $table->dropIndex(['purchase_price']);
            $table->dropColumn('wholesale_price');
            $table->dropColumn('purchase_price');
        });
    }
};
