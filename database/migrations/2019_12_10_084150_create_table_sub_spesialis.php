<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateTableSubSpesialis extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('sub_spesialis', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('spesialis_id');
                $table->string('nama_spesialis');
                $table->text('keterangan');
                $table->enum('aktif', ['Y', 'N'])->default('Y');
                $table->softDeletes()->default(null);
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
            Schema::dropIfExists('sub_spesialis');
        }
    }
