<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
use Cake\I18n\Time;
?>

<style>
    .table-Properties {
        border: 2px black;
        margin: 20px;
        padding: 15px 32px;
        text-align: left;
        display: inline-block;
        font-size: 20px;
        white-space: -moz-pre-wrap;
    }
</style>

<div class="table-Properties">
    <div class="column-responsive column-80">
        <div class="table" style="table-layout: fixed">
            <table>
                <tr>
                    <th><?= __('Property ID') ?></th>
                    <td><?= $this->Number->format($property->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Service Client Name') ?></th>
                    <td><?= $property->has('service_client') ? $this->Html->link($property->service_client->full_name, ['controller' => 'ServiceClients', 'action' => 'view', $property->service_client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($property->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($property->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($property->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcode') ?></th>
                    <td><?= h($property->postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Warrenty_start') ?></th>
                    <td><?= h($property->warranty_start->i18nFormat('dd-MM-yyyy HH:mm:ss')) ?></td>

                </tr>
                <tr>
                    <th><?= __('Warrenty_ends') ?></th>
                    <td><?= h($property->warranty_end->i18nFormat('dd-MM-yyyy HH:mm:ss')) ?></td>
                </tr>
                <tr>
                    <th style="white-space: -moz-pre-wrap"><?= __('Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($property->description)); ?></td>
                </tr>
            </table>


            <?= $this->Form->button ('Go Back', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>

        </div>
    </div>
</div>
