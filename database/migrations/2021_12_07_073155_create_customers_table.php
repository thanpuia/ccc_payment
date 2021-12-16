<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('token')->nullable();

            $table->string('amount',20)->nullable();
            $table->string('name',60)->nullable();
            $table->string('locality',60)->nullable();
            $table->string('city',50)->nullable();
            $table->string('district',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('center',100)->nullable();

            $table->boolean('free')->nullable();
            $table->string('reason',200)->nullable();

            $table->boolean('pcr')->nullable();
            $table->boolean('truenat')->nullable();
            $table->boolean('rat')->nullable();
            $table->string('other_expense',50)->nullable();
            $table->string('other_name')->nullable();

            $table->boolean('ccc')->nullable();
            $table->string('ccc_days',10)->nullable();
          
            $table->timestamp('ccc_start',0)->nullable();
            $table->timestamp('ccc_end',0)->nullable();
            $table->string('issuer_name',50)->nullable();
            $table->string('issuer_designation',20)->nullable();
            $table->string('issuer_office_address',50)->nullable();

            $table->string  ('order_id')->nullable();
            $table->string  ('tracking_id')->nullable();
            $table->string  ('bank_ref_no')->nullable();
            $table->boolean('payment_status')->nullable();
            $table->softDeletes('deleted_at', 0);

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
        Schema::dropIfExists('customers');
    }
}
