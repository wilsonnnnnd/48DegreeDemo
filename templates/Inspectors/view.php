<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inspector $inspector
 */
?>

<style>
    .table-project {
        border: 2px black;
        margin: 20px;
        padding: 15px 32px;
        text-align: left;
        display: inline-block;
        font-size: 20px;
    }
</style>


<div class="table-project">
    <div class="table">
        <div class="users view content" >
            <table>
                <tr>
                    <th><?= __('Account ID') ?></th>
                    <td><?= $this->Number->format($inspector->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inspector ID') ?></th>
                    <td><?= $this->Number->format($inspector->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($inspector->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($inspector->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone No') ?></th>
                    <td><?= h($inspector->phone_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($inspector->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($inspector->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($inspector->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcode') ?></th>
                    <td><?= h($inspector->postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notes') ?></th>
                    <td><?= $this->Text->autoParagraph(h($inspector->notes)); ?></td>
                </tr>
                <tr>
            </table>

        </div>
    </div>
</div>
<p align="left">
    <?= $this->Form->button ('Go Back', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>
</p>
