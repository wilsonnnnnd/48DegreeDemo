<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
use Cake\I18n\Time;

// echo $this->Html->css( '//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css' , ['block' => true]);

echo $this->Html->css('/css/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('js/demo/datatables-demo.js',['block'=>true]);

?>
<div class="users index content">
    <h3><?= __('Users') ?></h3>

    <div class="table-responsive">
        <table class="table" id="users-table">

            <thead>
            <br>
            <tr>
                <th><?= h('Role') ?></th>
                <th><?= h('Email') ?></th>
                <th><?= h('Created') ?></th>
                <th><?= h('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->role) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->created->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td><?= h($user->modified->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->role_email)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>


<script>
    $(document).ready(function () {
        $('#users-table').DataTable();
    });

</script>

