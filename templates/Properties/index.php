<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $properties
 * @var \App\Controller\UsersController $user

 */
use Cake\I18n\Time;


echo $this->Html->css('/css/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('js/demo/datatables-demo.js',['block'=>true]);
?>
<div class="users index content">
    <h3><?= __('Properties') ?></h3>
    <?php
    if ($this->request->getSession()->read('Auth.User.role') == 'Staff'){
        echo "<h3>" . $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'btn btn-outline-primary float-right']) . "</h3>";
    } ?>
    <div class="table-responsive">
        <table class="table" id="properties-table">
            <thead>
            <tr>
                <th><?= h('Client') ?></th>
                <th><?= h('Street') ?></th>
                <th><?= h('City') ?></th>
                <th><?= h('State') ?></th>
                <th><?= h('Postcode') ?></th>
                <th><?= h('Warranty Start') ?></th>
                <th><?= h('Warranty End') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($properties as $property): ?>
                <tr>
                    <td><?= $property->has('service_client') ? $this->Html->link($property->service_client->full_name, ['controller' => 'ServiceClients', 'action' => 'view',
                            $property->service_client->id]) : '' ?></td>
                    <td><?= h($property->street) ?></td>
                    <td><?= h($property->city) ?></td>
                    <td><?= h($property->state) ?></td>
                    <td><?= h($property->postcode) ?></td>
                    <td><?= h($property->warranty_start->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td><?= h($property->warranty_end->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?',
                            $property->full_addr)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!--//set the submit only can submit once-->
<script type="text/javascript">
    $('form').submit(function() {
        $(this).find("button[type='Submit']").prop('disabled',true);
        $(this).find("button[type='Delete']").prop('disabled',true);
    });
</script>

<script>
    $(document).ready( function () {
    $('#properties-table').DataTable();
} );

</script>

