<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Migration
 * @package    Lumen
 */

use App\Model\Workflow;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Workflow migration definition.
 * 
 * @author 
 */
class CreateWorkflowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Workflow::TABLE, function (Blueprint $table) {
            $table->increments(Workflow::ID);
            $table->string(Workflow::NAME);
            $table->string(Workflow::NOMENCLATURE);
            $table->tinyInteger(Workflow::RETRY_COUNT)->default(0)->comment('Maximum Retry');
            $table->tinyInteger(Workflow::IS_MANDATORY)->default(0);
            $table->tinyInteger(Workflow::ORDER)->default(0)->comment('Workflow stage order');
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
        Schema::dropIfExists(Workflow::TABLE);
    }
}
