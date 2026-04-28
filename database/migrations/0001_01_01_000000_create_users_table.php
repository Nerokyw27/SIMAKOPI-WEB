<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Indicates if the migration should be wrapped in a transaction.
     */
    public $withinTransaction = false;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // M_DataAkun — tabel utama akun (semua role)
        Schema::create('m_data_akun', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('role', 20)->default('customer'); // admin, supplier, customer
            $table->rememberToken();
            $table->timestamps();
        });

        // M_DataSupplier — data supplier (dikelola admin)
        Schema::create('m_data_supplier', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('username');
            $table->string('password');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('akun_id')->nullable();
            $table->foreign('akun_id')->references('id')->on('m_data_akun')->onDelete('set null');
            $table->timestamps();
        });

        // M_DataCustomer — data customer + riwayat pembelian (dilihat admin)
        Schema::create('m_data_customer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('product_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('total_price')->nullable();
            $table->unsignedBigInteger('akun_id')->nullable();
            $table->foreign('akun_id')->references('id')->on('m_data_akun')->onDelete('set null');
            $table->timestamps();
        });

        // Sessions table (Laravel auth requirement)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Password reset tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_data_supplier');
        Schema::dropIfExists('m_data_customer');
        Schema::dropIfExists('m_data_akun');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
    }
};
