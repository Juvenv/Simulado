<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Alternative'), ['action' => 'edit', $alternative->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Alternative'), ['action' => 'delete', $alternative->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alternative->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Alternatives'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alternative'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="alternatives view large-9 medium-8 columns content">
    <h3><?= h($alternative->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $alternative->has('question') ? $this->Html->link($alternative->question->id, ['controller' => 'Questions', 'action' => 'view', $alternative->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($alternative->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gabarito') ?></th>
            <td><?= $alternative->gabarito ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= ($alternative->content); ?>
    </div>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $alternative->comment; ?>
    </div>
</div>
