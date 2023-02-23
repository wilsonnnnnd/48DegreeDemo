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
    <h3><?= __('Subcontractor') ?></h3>
    <?php
    if ($this->request->getSession()->read('Auth.User.role') == 'Staff'){
        echo "<h3>" . $this->Html->link(__('New Subcontractor'), ['controller' => 'users', 'action' => 'addSubcontractor'], ['class' => 'btn btn-outline-primary float-right']) . "</h3>";
    } ?>




    <div class="table-responsive">
        <table class="table" , id="subcontractors-table">
            <thead>
            <tr>
                <th><?= h('Name') ?></th>
                <th><?= h('Email')?></th>
                <th><?= h('Business') ?></th>
                <th><?= h('Speciality') ?></th>
                <th><?= h('Phone No') ?></th>
                <th><?= h('Address')?></th>
                <th><?= h('Postcode') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($subcontractors as $subcontractor): ?>
                <tr>
                    <td><?= h($subcontractor->first_name." ".$subcontractor->last_name) ?></td>
                    <td><?= h($subcontractor->user->email) ?></td>
                    <td><?= h($subcontractor->business) ?></td>
                    <td><?= h($subcontractor->speciality) ?></td>
                    <td><?= h($subcontractor->phone_no) ?></td>
                    <td><?= h($subcontractor->street.", ".$subcontractor->city.", ".$subcontractor->state) ?></td>
                    <td><?= h($subcontractor->postcode) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $subcontractor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subcontractor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subcontractor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subcontractor->full_name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!--echo $this->Html->script( '//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js' , ['block' => true]);-->
<!--?>-->

<script>
    $(document).ready( function () {
    $('#subcontractors-table').DataTable();
} );

</script>
