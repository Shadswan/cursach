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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreign('sender')->references('id')->on('users');//отправитель
            $table->foreign('chat_id')->references('id')->on('chats'); //чат где хранится сообщение
            //$table->foreign('type')->references('id')->on('chat_types'); // тип чата(2 участника или более) мб это не надо
            $table->text('content')->nullable();//Текст сообщения
            //$table->string('type')->default('text'); //Тип(text, image, file, video)
            $table->string('file_link')->nullable();//Ссылка на файл в файловом хранилище
            $table->timestamps('read_at')->nullable();//Когда прочитано
            $table->softDeletes(); //Возможно восстановить
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
