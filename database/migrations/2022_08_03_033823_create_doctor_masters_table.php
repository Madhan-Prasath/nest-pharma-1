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
                    CREATE TABLE doctor_masters (
                        id                  BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        billing_id          BIGINT,
                        stockist_id         BIGINT,
                        status              BOOLEAN default true,
                        created_at          TIMESTAMP DEFAULT NOW(),
                        updated_at          TIMESTAMP,
                        created_by          CITEXT,
                        updated_by          CITEXT,
                        constraint fk_billing foreign key(billing_id)
                                               references billings(id),
                        constraint fk_stockist foreign key(stockist_id)
                                               references stockists(id)

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
        Schema::dropIfExists('doctor_masters');
    }
};
