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
                    CREATE TABLE product_masters (
                        id                  BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        product_id          BIGINT,
                        state_id            BIGINT,
                        mrp                 decimal,
                        pts                 decimal,
                        ptr                 decimal,
                        status              BOOLEAN default true,
                        created_at          TIMESTAMP DEFAULT NOW(),
                        updated_at          TIMESTAMP,
                        created_by          CITEXT,
                        updated_by          CITEXT,
                        constraint fk_product foreign key(product_id)
                                               references products(id),

                        constraint fk_state foreign key(state_id)
                                               references states(id)
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
        Schema::dropIfExists('product_masters');
    }
};
