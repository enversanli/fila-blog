<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(config('filamentblog.tables.prefix').'posts', function (Blueprint $table) {
            $table->string('redirect_platform')->nullable()->after('photo_alt_text');
            $table->string('redirect_url')->nullable()->after('redirect_platform');
        });
    }

    public function down(): void
    {
        Schema::table(config('filamentblog.tables.prefix').'posts', function (Blueprint $table) {
            $table->dropColumn(['redirect_platform', 'redirect_url']);
        });
    }
};
