<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

use Cake\I18n\Time;

echo $this->Html->css('/css/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/css/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
echo $this->Html->script('/css/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('js/demo/datatables-demo.js', ['block' => true]);


// $status =["Pending","Ongoing","Completed"]
?>
<div class="users index content">
    <h3><?= __('Inspector Jobs') ?></h3>
    <?php
    if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
        echo "<h3>" . $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'btn btn-outline-primary float-right']) . "</h3>";
    } ?>
    <div class="table-responsive">
        <table class="table" id="jobs-table">
            <thead>
            <tr>

                <th><?= h('Property') ?></th>
                <th><?= h('Inspector') ?></th>
                <th><?= h('Expected Completion Date') ?></th>
                <th><?= h('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($jobs as $job): ?>
                <tr>
                    <td><?= $job->has('property') ? $this->Html->link($job->property->full_addr, ['controller' => 'Properties', 'action' => 'view', $job->property->id]) : '' ?></td>
                    <td><?= $job->has('inspector') ? $this->Html->link($job->inspector->full_name, ['controller' => 'Inspectors', 'action' => 'view', $job->inspector->id]) : '' ?></td>
                    <td><?= ($job->expected_completion_date->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td>
                        <?php
                        if ($job->status == 0) {
                            echo '<label class="badge badge-danger">' . "Pending" . '</label>';
                        } else if ($job->status == 1) {
                            echo '<label class="badge badge-warning">' . "Ongoing" . '</label>';
                        } else if ($job->status == 2) {
                            echo '<label class="badge badge-success">' . "Complete" . '</label>';
                        } ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->full_name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('#jobs-table').DataTable();
    });
</script>

<!--//set the submit only can submit once-->
<script type="text/javascript">
    $('form').submit(function () {
        $(this).find("button[type='Submit']").prop('disabled', true);
        $(this).find("button[type='Delete']").prop('disabled', true);
    });
</script>



