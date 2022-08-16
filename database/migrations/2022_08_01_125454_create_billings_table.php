<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        $sql = <<<SQL
                    CREATE TABLE billings (
                        id                  BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
                        patch_id            BIGINT,
                        billing_name        CITEXT,
                        doctor_name        CITEXT,
                        status              BOOLEAN default true,
                        created_at          TIMESTAMP DEFAULT NOW(),
                        updated_at          TIMESTAMP,
                        created_by          CITEXT,
                        updated_by          CITEXT,
                        constraint fk_patch foreign key(patch_id)
                                               references patches(id)
                    );
                SQL;
        DB::statement($sql);

    }

    public function down()
    {
        Schema::dropIfExists('billings');
    }

};
