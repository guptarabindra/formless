<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Migration
 * @package    Lumen
 * 
 */

use App\Model\Otp;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * OTP migration definition.
 */
class CreateOtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Otp::TABLE, function (Blueprint $table) {
            $table->increments(Otp::ID);
            $table->string(Otp::PHONE, 20);
            $table->string(Otp::OTP);
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
        Schema::dropIfExists(Otp::TABLE);
    }
}
