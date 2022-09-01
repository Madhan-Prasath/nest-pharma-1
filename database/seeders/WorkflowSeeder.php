<?php

namespace Database\Seeders;

use Heloufir\FilamentWorkflowManager\Models\Workflow;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModel;
use Heloufir\FilamentWorkflowManager\Models\WorkflowPermission;
use Heloufir\FilamentWorkflowManager\Models\WorkflowStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Heloufir\FilamentWorkflowManager\Forms\Components\WorkflowStatusInput;

class WorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        // Create Workflow name

        $workflow = Workflow::create([
            'name' => 'Sale',
            'model' =>'App\Models\ProductSale'
        ]);

        //Create Workflow Status
        $initiated_status = WorkflowStatus::create(
            [
                'name' => 'Initiated',
                'color' => '#33d6d0',
                'is_end' => false,

            ]
        );

        $approved_status = WorkflowStatus::create(
            [
                'name' => 'Approved',
                'color' => '#54e846',
                'is_end' => true,
            ]
        );

        $rejected_status = WorkflowStatus::create(
            [
                'name' => 'Rejected',
                'color' => '#db3939',
                'is_end' => true,

            ]
        );

        //Create Workflow status Flow order
        $null_to_initiated = WorkflowModel::create([
            'workflow_id' => $workflow->id,
            'status_from_id' => null,
            'status_to_id'   => $initiated_status->id
        ]);

        $initiated_to_rejected = WorkflowModel::create([
            'workflow_id' => $workflow->id,
            'status_from_id' => $initiated_status->id,
            'status_to_id'   => $rejected_status->id
        ]);

        $initiated_to_approved = WorkflowModel::create([
            'workflow_id' => $workflow->id,
            'status_from_id' => $initiated_status->id,
            'status_to_id'   => $approved_status->id
        ]);

        // Create Workflow Permission
        $workflow_permission = WorkflowPermission::create([
           'role' => 'ProductSalesPermission',
            'workflow_id' => $workflow->id,
            'workflow_models' => [$initiated_to_approved->id, $initiated_to_rejected->id],
        ]);
        
        $this->command->info('Workflow Created');
    }
}
