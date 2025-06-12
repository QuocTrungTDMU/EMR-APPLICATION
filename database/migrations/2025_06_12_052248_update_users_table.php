<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kiểm tra từng cột trước khi thêm
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }

            if (!Schema::hasColumn('users', 'nks_user_id')) {
                $table->string('nks_user_id')->nullable()->after('phone');
            }

            if (!Schema::hasColumn('users', 'nks_access_token')) {
                $table->text('nks_access_token')->nullable()->after('nks_user_id');
            }

            if (!Schema::hasColumn('users', 'activation_code')) {
                $table->text('activation_code')->nullable()->after('nks_access_token');
            }

            if (!Schema::hasColumn('users', 'status')) {
                $table->string('status')->default('active')->after('activation_code');
            }

            if (!Schema::hasColumn('users', 'last_login_at')) {
                $table->timestamp('last_login_at')->nullable()->after('status');
            }
        });

        // Thêm indexes riêng biệt để tránh lỗi
        $this->addIndexIfNotExists('users', 'nks_user_id');
        $this->addIndexIfNotExists('users', 'status');
        $this->addIndexIfNotExists('users', 'phone');
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Xóa indexes trước (nếu tồn tại)
            $this->dropIndexIfExists('users', 'users_nks_user_id_index');
            $this->dropIndexIfExists('users', 'users_status_index');
            $this->dropIndexIfExists('users', 'users_phone_index');

            // Xóa columns
            $table->dropColumn([
                'phone',
                'nks_user_id',
                'nks_access_token',
                'activation_code',
                'status',
                'last_login_at'
            ]);
        });
    }

    /**
     * Thêm index nếu chưa tồn tại
     */
    private function addIndexIfNotExists(string $table, string $column): void
    {
        try {
            Schema::table($table, function (Blueprint $table) use ($column) {
                $table->index($column);
            });
        } catch (\Exception $e) {
            // Bỏ qua lỗi nếu index đã tồn tại
            if (!str_contains($e->getMessage(), 'Duplicate key name')) {
                throw $e;
            }
        }
    }

    /**
     * Xóa index nếu tồn tại
     */
    private function dropIndexIfExists(string $table, string $indexName): void
    {
        try {
            Schema::table($table, function (Blueprint $table) use ($indexName) {
                $table->dropIndex($indexName);
            });
        } catch (\Exception $e) {
            // Bỏ qua lỗi nếu index không tồn tại
        }
    }
};
