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
                    CREATE TABLE patches (
                        id                  BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        head_quarter_id     BIGINT,
                        patch                CITEXT,
                        status              BOOLEAN default true,
                        created_at          TIMESTAMP DEFAULT NOW(),
                        updated_at          TIMESTAMP,
                        created_by          CITEXT,
                        updated_by          CITEXT,
                        constraint fk_head_quarter foreign key(head_quarter_id)
                                               references head_quarters(id)
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
        Schema::dropIfExists('patches');
    }
};
