<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Migration
 * @package    Lumen
 * 
 */

use App\Model\User;
use App\Model\Workflow;
use App\Model\WorkflowMap;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * WorkflowMap migration definition.
 * 
 * @author 
 */
class CreateWorkflowMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(WorkflowMap::TABLE, function (Blueprint $table) {
            $table->increments(WorkflowMap::ID);
            $table->unsignedInteger(WorkflowMap::USER_ID);
            $table->foreign(WorkflowMap::USER_ID)->references(User::ID)->on(User::TABLE);
            $table->unsignedInteger(WorkflowMap::WORKFLOW_ID);
            $table->foreign(WorkflowMap::WORKFLOW_ID)->references(Workflow::ID)->on(Workflow::TABLE);
            $table->tinyInteger(WorkflowMap::STATUS)->default(0)->comment('1 for completed, 0 for initiated');
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
        Schema::dropIfExists(WorkflowMap::TABLE);
    }
}
