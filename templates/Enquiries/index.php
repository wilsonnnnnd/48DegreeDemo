<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry[]|\Cake\Collection\CollectionInterface $enquiries
 */
echo $this->Html->css('/css/vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
echo $this->Html->script('/css/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('js/demo/datatables-demo.js',['block'=>true]);
?>
<style>
    input[type='search'], select{
        width: auto;
        height: auto;
    }
    label{
        font-size: 1em;
    }
</style>   

<div class="enquiries index content">
      <div class="d-sm-flex align-items-lg-center justify-content-between mb-4">
        <h1 class="mr-auto p-2 h3 mb-0 text-gray-800"><?= __('Enquiries') ?></h1>
        </div>

<table id="enquiries-table" class="table table-bordered" width="100%" cellspacing="0">

            <thead>
                <tr>                   
                    <th><?= h('Full Name') ?></th>
                    <th><?= h('Email') ?></th>
                    <th><?= h('Subject') ?></th>
                    <th><?= h('Enquiry') ?></th>
                    <th><?= h('Replied?') ?></th>
                    <th><?= h('Created on') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquiries as $enquiry): ?>
                <tr>
                    <td><?= h($enquiry->full_name) ?></td>
                    <td><?= h($enquiry->email) ?></td>
                    <td><?= h($enquiry->subject) ?></td>
                    <td><?= h($enquiry->body) ?></td>
                    <td><?= h($enquiry->email_sent) ? __('Yes') : __('No') ?></td>
                    <td><?= h($enquiry->created) ?></td>
                    <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $enquiry->id]) ?>
                        <?= $this->Html->link(__('Mark as sent'), ['action' => 'mark', $enquiry->id]) ?>
                        <?= $this->Html->link(__('Email'), ['controller' => 'Emails', 'action' => 'emailenquiry', '?' => ['email' => $enquiry->email]]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <script>
    $(document).ready( function () {
        $('#enquiries-table').DataTable({
            select: true
        });
    });
</script>
