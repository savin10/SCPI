<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('phone');
            $table->string('role')->default('0');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Ajouter trois utilisateurs par défaut
        DB::table('users')->insert([
            [
                'username' => 'Admin',
                'phone' => '0123456789',
                'role' => '0',
                'password' => Hash::make('password1'),
                'email' => 'admin@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Commissaire',
                'phone' => '0987654321',
                'role' => '1',
                'password' => Hash::make('password2'),
                'email' => 'commissaire@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Agent',
                'phone' => '1234567890',
                'role' => '2',
                'password' => Hash::make('password3'),
                'email' => 'agent@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
