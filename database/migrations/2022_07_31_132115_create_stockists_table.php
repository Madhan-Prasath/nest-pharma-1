<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        $sql = <<<SQL
                    CREATE TABLE stockists (
                        id                  BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        sales_manager_id     BIGINT,
                        name                CITEXT,
                        email               CITEXT,
                        status              BOOLEAN default true,
                        created_at          TIMESTAMP DEFAULT NOW(),
                        updated_at          TIMESTAMP,
                        created_by          CITEXT,
                        updated_by          CITEXT,
                        constraint fk_stock_lister foreign key(sales_manager_id)
                                               references sales_managers(id)
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
        Schema::dropIfExists('stockists');
    }
};
