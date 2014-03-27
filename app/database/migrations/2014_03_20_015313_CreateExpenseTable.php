<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("expense", function(Blueprint $table)
		{
            $table->increments("id");
            $table
                ->integer("userId")
                ->nullable()
                ->default(null);
            $table
                ->integer("categoryId")
                ->nullable()
                ->default(null);
            $table
                ->float("total")
                ->nullable()
                ->default(null);
            $table
                ->date("date")
                ->nullable()
                ->default(null);

            $table
                ->string("province")
                ->nullable()
                ->default(null);

            $table
                ->text("comments")
                ->nullable()
                ->default(null);

            $table
                ->string("start")
                ->nullable()
                ->default(null);

            $table
                ->string("destination")
                ->nullable()
                ->default(null);

            $table
                ->float("kilometers")
                ->nullable()
                ->default(null);
            $table
                ->float("kmRate")
                ->nullable()
                ->default(null);
            $table
                ->float("tps")
                ->nullable()
                ->default(null);
            $table
                ->float("tvq")
                ->nullable()
                ->default(null);
            $table
                ->float("cti")
                ->nullable()
                ->default(null);
            $table
                ->float("neat")
                ->nullable()
                ->default(null);
            $table
                ->string("description")
                ->nullable()
                ->default(null);


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
		Schema::table("expense", function(Blueprint $table)
		{
            Schema::dropIfExists("expense");
		});
	}

}