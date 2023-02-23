<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div style="font-size: 25px;width: 100%" class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div>
