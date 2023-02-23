<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>

<style>
    .table-job {
        border: 2px black;
        margin: 20px;
        padding: 15px 32px;
        text-align: left;
        display: inline-block;
        font-size: 20px;
        white-space: -moz-pre-wrap;
    }
</style>

<div class="table-job">

    <div class="column-responsive column-80">
        <div class="users view content">
            <table class="table">
                <tr>
                    <th><?= __('Job ID') ?></th>
                    <td><?= $this->Number->format($job->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Address') ?></th>
                    <td><?= $job->has('property') ? $this->Html->link($job->property->street.", ".$job->property->city.", ".$job->property->state, ['controller' => 'Properties', 'action' => 'view', $job->property->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Inspector Name') ?></th>
                    <td><?= $job->has('inspector') ? $this->Html->link($job->inspector->first_name." ".$job->inspector->last_name, ['controller' => 'Inspectors', 'action' => 'view', $job->inspector->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td>

                        <?php
                        if($job->status==0){
                            echo "Pending";
                        }
                        else if($job->status==1){
                            echo "Ongoing";
                        }
                        else if($job->status==2){
                            echo "Complete";
                        }?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($job->description)); ?></td>
                </tr>

            </table>
            <?= $this->Form->button ('Go Back', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>

        </div>
    </div>
</div>

