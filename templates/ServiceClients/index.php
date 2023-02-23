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
    <h3><?= __('Clients') ?></h3>
    <?php
    if ($this->request->getSession()->read('Auth.User.role') == 'Staff'){
        echo "<h3>" . $this->Html->link(__('New Client'), ['controller' => 'users', 'action' => 'addClient'], ['class' => 'btn btn-outline-primary float-right']) . "</h3>";
    } ?>
    <div class="table-responsive">
        <table class="table" id="serviceClients-table">
            <thead>
            <tr>
                <th><?= h('First Name') ?></th>
                <th><?= h('Last Name') ?></th>
                <th><?= h('Email')?></th>
                <th><?= h('Phone No') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($serviceClients as $serviceClient): ?>
                <tr>
                    <td><?= h($serviceClient->first_name) ?></td>
                    <td><?= h($serviceClient->last_name) ?></td>
                    <td><?= h($serviceClient->user->email) ?></td>
                    <td><?= h($serviceClient->phone_no) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $serviceClient->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceClient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceClient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceClient->full_name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready( function () {
    $('#serviceClients-table').DataTable();
} );

</script>
