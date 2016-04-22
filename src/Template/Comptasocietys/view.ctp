<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Society'), ['action' => 'edit', $society->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Society'), ['action' => 'delete', $society->id], ['confirm' => __('Are you sure you want to delete # {0}?', $society->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Societys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Society'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="societys view large-9 medium-8 columns content">
    <h3><?= h($society->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($society->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact') ?></th>
            <td><?= h($society->contact) ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($society->adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Mail') ?></th>
            <td><?= h($society->mail) ?></td>
        </tr>
        <tr>
            <th><?= __('Tel') ?></th>
            <td><?= h($society->tel) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($society->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($society->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Passwordconfirm') ?></th>
            <td><?= h($society->passwordconfirm) ?></td>
        </tr>
        <tr>
            <th><?= __('Ville') ?></th>
            <td><?= h($society->ville) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($society->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cp') ?></th>
            <td><?= $this->Number->format($society->cp) ?></td>
        </tr>
        <tr>
            <th><?= __('Taux Comission') ?></th>
            <td><?= $this->Number->format($society->taux_comission) ?></td>
        </tr>
        <tr>
            <th><?= __('Tva') ?></th>
            <td><?= $this->Number->format($society->tva) ?></td>
        </tr>
        <tr>
            <th><?= __('Iban') ?></th>
            <td><?= $this->Number->format($society->iban) ?></td>
        </tr>
        <tr>
            <th><?= __('Siret') ?></th>
            <td><?= $this->Number->format($society->siret) ?></td>
        </tr>
        <tr>
            <th><?= __('Tva Ass') ?></th>
            <td><?= $society->tva_ass ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
