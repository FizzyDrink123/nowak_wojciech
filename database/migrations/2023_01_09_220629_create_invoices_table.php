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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceNo',20)->unique();
            $table->datetime('orderDate');
            $table->string('email',50);
            $table->string('fullName',30);
            $table->string('address',50);
            $table->string('phoneNumber',40);
            $table->string('city',50);
            $table->string('product',100);
            $table->double('price',100);
            $table->double('qunatity',100);
            $table->double('totalPrice',);
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
        Schema::dropIfExists('invoices');
    }
};
