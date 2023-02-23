<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>

<style xmlns:width="http://www.w3.org/1999/xhtml">
    .table-project {
        border: 2px black;
        margin: 20px;
        padding: 15px 32px;
        text-align: left;
        display: inline-block;
        font-size: 20px;
        white-space: -moz-pre-wrap;
    }
</style>


<div class="table-project">

    <div class="column-responsive column-80">
        <div class="users view content">
            <table class="table">
                <tr>
                    <th><?= __('Project ID') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Address') ?></th>
                    <td><?= $project->has('property') ? $this->Html->link($project->property->full_addr, ['controller' => 'Properties', 'action' => 'view', $project->property->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subcontractor Name') ?></th>
                    <td><?= $project->has('subcontractor') ? $this->Html->link($project->subcontractor->full_name, ['controller' => 'Subcontractors', 'action' => 'view', $project->subcontractor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td>

                        <?php
                        if ($project->status == 0) {
                            echo "Pending";
                        } else if ($project->status == 1) {
                            echo "Ongoing";
                        } else if ($project->status == 2) {
                            echo "Complete";
                        } ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($project->description)); ?></td>
                </tr>
            </table>

            <?= $this->Form->button ('Go Back', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>

        </div>
    </div>
</div>

