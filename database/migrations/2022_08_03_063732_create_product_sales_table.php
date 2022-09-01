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
                    CREATE TABLE product_sales (
                        id                      BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        doctor_master_id        BIGINT,
                        product_master_id       BIGINT,
                        distribution_method_id  BIGINT references distribution_methods(id),
                        sales_unit              BIGINT,
                        free_unit               BIGINT,
                        sales_total             DECIMAL,
                        free_total              DECIMAL,
                        distributed_date        TIMESTAMP,
                        status                  BOOLEAN default false,
                        created_at              TIMESTAMP DEFAULT NOW(),
                        updated_at              TIMESTAMP,
                        created_by              CITEXT,
                        updated_by              CITEXT,
                        constraint fk_doctor_master foreign key(doctor_master_id)
                                               references doctor_masters(id),

                        constraint fk_product_master foreign key(product_master_id)
                                               references product_masters(id)
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
        Schema::dropIfExists('product_sales');
    }
};
