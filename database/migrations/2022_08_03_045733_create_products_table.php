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
                    CREATE TABLE products (
                        id                  BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        name                CITEXT,
                        prescription_id     BIGINT,
                        item_type_id        BIGINT,
                        category_id         BIGINT,
                        status              BOOLEAN default true,
                        created_at          TIMESTAMP DEFAULT NOW(),
                        updated_at          TIMESTAMP,
                        created_by          CITEXT,
                        updated_by          CITEXT,
                        constraint fk_item_type foreign key(item_type_id)
                                               references item_types(id),

                        constraint fk_category foreign key(category_id)
                                               references categories(id),

                        CONSTRAINT fk_prescription
                            foreign key (prescription_id) references prescriptions(id)
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
        Schema::dropIfExists('products');
    }
};
