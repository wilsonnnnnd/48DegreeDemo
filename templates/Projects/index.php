<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
use Cake\I18n\Time;

echo $this->Html->css('/css/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('js/demo/datatables-demo.js',['block'=>true]);
?>
<div class="users index content">
    <h3><?= __('Subcontractor Projects') ?></h3>
    <?php
    if ($this->request->getSession()->read('Auth.User.role') == 'Staff'){
        echo "<h3>" . $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'btn btn-outline-primary float-right']) . "</h3>";
    } ?>
    <div class="table-responsive">
        <table class="table" id="projects-table">
            <thead>
            <tr>
                <th><?= h('Property') ?></th>
                <th><?= h('Subcontractor') ?></th>
                <th><?= h('Expected Completion Date') ?></th>
                <th><?= h('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project->has('property') ? $this->Html->link($project->property->full_addr, ['controller' => 'Properties', 'action' => 'view', $project->property->id]) : '' ?></td>
                    <td><?= $project->has('subcontractor') ? $this->Html->link($project->subcontractor->full_name, ['controller' => 'Inspectors', 'action' => 'view', $project->subcontractor->id]) : '' ?></td>
                    <td><?= ($project->expected_completion_date->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td>
                        <?php
                        if ($project->status == 0) {
                            echo '<label class="badge badge-danger">' . "Pending" . '</label>';
                        } else if ($project->status == 1) {
                            echo '<label class="badge badge-warning">' . "Ongoing" . '</label>';
                        } else if ($project->status == 2) {
                            echo '<label class="badge badge-success">' . "Complete" . '</label>';
                        } ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->full_pro)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready( function () {
    $('#projects-table').DataTable();
} );

</script>

