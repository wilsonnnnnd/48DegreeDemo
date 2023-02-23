<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
use Cake\I18n\Time;

echo $this->Html->css('/css/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('js/demo/datatables-demo.js',['block'=>true]);

?>



<div class="users index content">
    <h3><?= __('Inspector Reports') ?></h3>
    <?php
    if ($this->request->getSession()->read('Auth.User.role') == 'Staff' or 'Inspector'){
        echo "<h3>" . $this->Html->link(__('New Report'), ['action' => 'add'], ['class' => 'btn btn-outline-primary float-right']) . "</h3>";
    } ?>
    <div class="table-responsive" >
        <table class="table" id="reports-table">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('Report No.') ?></th>
                <th><?= $this->Paginator->sort('Job Name') ?></th>

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($reports as $report): ?>
                <tr>
                    <td><?= $this->Number->format($report->id) ?></td>
                    <td><?= $report->has('job') ? $this->Html->link("Address: ".$report->job->property->full_addr.". Inspector: ".$report->job->inspector->full_name, ['controller' => 'Jobs', 'action' => 'view', $report->job->id]) : '' ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $report->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $report->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->report_name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready( function () {
        $('#reports-table').DataTable();
    } );

</script>

