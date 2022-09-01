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
                    CREATE TABLE product_targets (
                        id                  BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        product_master_id   BIGINT references product_masters(id),
                        head_quarter_id     BIGINT references head_quarters(id),
                        scope               CITEXT,
                        target              BIGINT,
                        month               DATE,
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
        Schema::dropIfExists('product_targets');
    }
};
