<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="enquiries view content">
            <h3>Enquiry from <b><?= h($enquiry->full_name) ?></b></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($enquiry->email) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($enquiry->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Sent?') ?></th>
                    <td><?= $enquiry->email_sent ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= h($enquiry->subject) ?></td>
                </tr>
                <tr>
                    <th><?= __('Body') ?></th>
                    <td><?= h($enquiry->body) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>


