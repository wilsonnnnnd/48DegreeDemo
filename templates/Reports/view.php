<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
?>

<style>
    .table-report {
        border: 2px black;
        margin: 20px;
        padding: 15px 32px;
        text-align: left;
        display: inline-block;
        font-size: 20px;
        width: 60%;
        white-space: -moz-pre-wrap;
    }

</style>


<div class="table-report">

    <div class="column-responsive column-50" >
        <div class="table" >
            <table>
                <tr>
                    <th ><?= __('Report ID') ?></th>
                    <td><?= $this->Number->format($report->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Job Name') ?></th>
                    <td><?= $report->has('job') ? $this->Html->link($report->job->full_name, ['controller' => 'Jobs', 'action' => 'view', $report->job->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Body') ?></th>
                    <td><?= $this->Text->autoParagraph(h($report->body)); ?></td>
                </tr>

            </table>

            <?= $this->Form->button ('Go Back', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>

        </div>
    </div>
</div>
