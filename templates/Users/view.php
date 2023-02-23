<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<style>
    .table-user {
        border: 2px black;
        margin: 20px;
        padding: 15px 32px;
        text-align: left;
        display: inline-block;
        font-size: 20px;
        white-space: -moz-pre-wrap;
    }
</style>


<body>
    <div class="table-user">

        <div class="column-responsive column-80">
            <div class="users view content">
                <table class="table">
                    <tr>
                        <th><?= __('Account ID') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Role') ?></th>
                        <td><?= h($user->role) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($user->created->i18nFormat('dd-MM-yyyy')) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($user->modified->i18nFormat('dd-MM-yyyy')) ?></td>
                    </tr>
                </table>
                <?= $this->Form->button('Go Back', ['onclick' => 'history.back ()', 'type' => 'button', 'class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
    </div>
</body>
