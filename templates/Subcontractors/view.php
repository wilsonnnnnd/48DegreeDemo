<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subcontractor $subcontractor
 */
?>

<style>
    .table-Subcontractor {
        border: 2px black;
        margin: 20px;
        padding: 15px 32px;
        text-align: left;
        display: inline-block;
        font-size: 20px;
        white-space: -moz-pre-wrap;
    }
</style>
<div class="table-Subcontractor">

    <div class="column-responsive column-80">
        <div class="table">
            <table>
                <tr>
                    <th><?= __('Account ID') ?></th>
                    <td><?= $this->Number->format($subcontractor->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subcontractor ID') ?></th>
                    <td><?= $this->Number->format($subcontractor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($subcontractor->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($subcontractor->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Speciality') ?></th>
                    <td><?= h($subcontractor->speciality) ?></td>
                </tr>
                <tr>
                    <th><?= __('Business') ?></th>
                    <td><?= h($subcontractor->business) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone No') ?></th>
                    <td><?= h($subcontractor->phone_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($subcontractor->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($subcontractor->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($subcontractor->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcode') ?></th>
                    <td><?= h($subcontractor->postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notes') ?></th>
                    <td><?= $this->Text->autoParagraph(h($subcontractor->notes)); ?></td>
                </tr>
            </table>

            <?= $this->Form->button ('Go Back', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>

        </div>
    </div>
</div>
