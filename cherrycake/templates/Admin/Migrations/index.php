<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('title', 'Crear Migración');
?>

<h1>Crear Migración</h1>

<?= $this->Form->create(null, ['url' => ['prefix' => 'Admin', 'controller' => 'Migrations', 'action' => 'create']]) ?>
    <div>
        <?= $this->Form->control('migration_name', ['label' => 'Nombre de la migración (ej: productos)', 'required' => true]) ?>
    </div>

    <div id="fields-wrapper">
        <div class="field-group">
            <?= $this->Form->control('fields[]', ['label' => 'Campo', 'required' => true]) ?>
        </div>
    </div>

    <button type="button" onclick="addField()">+ Agregar Campo</button>

    <br><br>
    <?= $this->Form->button('Generar Migración') ?>
<?= $this->Form->end() ?>

<script>
function addField() {
    const wrapper = document.getElementById('fields-wrapper');
    const div = document.createElement('div');
    div.className = 'field-group';
    div.innerHTML = `<input type="text" name="fields[]" placeholder="Ej: title:string" required>`;
    wrapper.appendChild(div);
}
</script>
