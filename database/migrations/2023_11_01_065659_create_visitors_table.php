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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id(); // ID (Primary Key)
            $table->string('no_visitors'); // No Tamu
            $table->string('guest_name'); // Nama Tamu
            $table->string('address'); // Alamat
            $table->string('phone_number'); // Nomor Telepon
            $table->string('email'); // Email
            $table->timestamp('check_in_time'); // Waktu Masuk
            $table->timestamp('check_out_time')->nullable(); // Waktu Keluar
            $table->string('visitor_photo')->nullable(); // Foto Pengunjung (Opsional)
            $table->text('special_notes')->nullable(); // Catatan Khusus
            $table->enum('type', ['Guest', 'Visitor']); // Tipe (Tamu atau Pengunjung)
            $table->integer('queue_number'); // Nomor Antrian
            $table->string('office_institution_name'); // Nama Kantor/Instansi
            $table->string('status'); // Status
            $table->unsignedBigInteger('department_id'); // ID Bidang (Foreign Key ke Tabel Bidang)
            $table->string('purpose'); // ID Keperluan (Foreign Key ke Tabel Keperluan)
            $table->unsignedBigInteger('security_guard_id')->nullable(); // Security Guard ID
            $table->unsignedBigInteger('receptionist_id')->nullable(); // Receptionist ID
            $table->unsignedBigInteger('user_id')->nullable(); //user create
            $table->integer('number_of_people'); // Kolom untuk Jumlah Orang (Jumlah Pengunjung)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
