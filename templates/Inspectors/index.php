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
?>
<div class="users index content">
    <h3><?= __('Inspectors') ?></h3>
    <?php
    if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
        echo "<h3>" . $this->Html->link(__('New Inspector'), ['controller' => 'users', 'action' => 'addInspector'], ['class' => 'btn btn-outline-primary float-right']) . "</h3>";
    } ?>
    <div class="table-responsive">
        <table class="table"  id="inspectors-table">
            <thead>
            <tr>
                <th><?= h('Name') ?></th>
                <th><?= h('Email') ?></th>
                <th><?= h('Phone no') ?></th>
                <th><?= h('Address') ?></th>
                <th><?= h('Postcode') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($inspectors as $inspector): ?>
                <tr>
                    <td><?= h($inspector->first_name . " " . $inspector->last_name) ?></td>
                    <td><?= h($inspector->user->email) ?></td>
                    <td><?= h($inspector->phone_no) ?></td>
                    <td><?= h($inspector->ins_addr) ?></td>
                    <td><?= h($inspector->postcode) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $inspector->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inspector->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inspector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspector->full_name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php
echo $this->Html->script('//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js', ['block' => true]);
?>

<script>
    $(document).ready(function () {
        $('#inspectors-table').DataTable();
    });

</script>
