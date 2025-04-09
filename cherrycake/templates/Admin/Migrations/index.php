<h1>Crear Migración</h1>

<?= $this->Form->create(null) ?>

<?= $this->Form->control('table', ['label' => 'Nombre de la tabla']) ?>

<div id="fields-container">
    <div class="field-group">
        <?= $this->Form->control('fields.0.name', ['label' => 'Campo']) ?>
        <?= $this->Form->control('fields.0.type', [
            'type' => 'select',
            'options' => ['string' => 'string', 'text' => 'text', 'integer' => 'integer', 'datetime' => 'datetime'],
            'label' => 'Tipo'
        ]) ?>
    </div>
</div>

<button type="button" onclick="addField()">+ Agregar campo</button>

<?= $this->Form->button('Generar Migración') ?>
<?= $this->Form->end() ?>

<br>
<?= $this->Html->link('Ejecutar migraciones', ['action' => 'run'], ['class' => 'button']) ?>

<script>
let fieldIndex = 1;
function addField() {
    const container = document.getElementById('fields-container');
    const group = document.createElement('div');
    group.classList.add('field-group');
    group.innerHTML = `
        <input name="fields[${fieldIndex}][name]" placeholder="Campo" />
        <select name="fields[${fieldIndex}][type]">
            <option value="string">string</option>
            <option value="text">text</option>
            <option value="integer">integer</option>
            <option value="datetime">datetime</option>
        </select>
    `;
    container.appendChild(group);
    fieldIndex++;
}
</script>
