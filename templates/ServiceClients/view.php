<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceClient $serviceClient
 */
?>
<style>
    .table-Client{
        border: 2px black;
        margin: 20px;
        padding: 15px 32px;
        text-align: left;
        display: inline-block;
        font-size: 20px;
        white-space: -moz-pre-wrap;
    }
</style>

<div class="table-Client">

    <div class="column-responsive column-80">
        <div class="table">
            <table>
                <tr>
                    <th><?= __('Account ID') ?></th>
                    <td><?= $this->Number->format($serviceClient->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client ID') ?></th>
                    <td><?= $this->Number->format($serviceClient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($serviceClient->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($serviceClient->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone No') ?></th>
                    <td><?= h($serviceClient->phone_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notes') ?></th>
                    <td><?= $this->Text->autoParagraph(h($serviceClient->notes)); ?></td>
                </tr>
            </table>

            <?= $this->Form->button ('Go Back', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>

        </div>
    </div>
</div>

