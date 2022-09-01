<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<'SQL'
                    CREATE TABLE free_units (
                        id                  BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        doctor_master_id    BIGINT references doctor_masters(id),
                        product_master_id   BIGINT references  product_masters(id),
                        free_unit           BIGINT,
                        month               TIMESTAMP,
                        status              BOOLEAN default true,
                        created_at          TIMESTAMP DEFAULT NOW(),
                        updated_at          TIMESTAMP,
                        created_by          CITEXT,
                        updated_by          CITEXT
                    );
                SQL;
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('free_units');
    }
};
