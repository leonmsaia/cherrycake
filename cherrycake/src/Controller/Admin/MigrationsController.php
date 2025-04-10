<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Http\Exception\InternalErrorException;

class MigrationsController extends AppController
{
    public function index()
    {
        // Renderiza la vista con el formulario
    }

    public function create()
    {
        $this->request->allowMethod(['post']);

        $migrationName = $this->request->getData('migration_name');
        $fields = $this->request->getData('fields');

        if (empty($migrationName) || empty($fields)) {
            $this->Flash->error("El nombre de la migración y los campos son obligatorios.");
            return $this->redirect(['action' => 'index']);
        }

        // Formatea el nombre de la migración con prefijo obligatorio
        $migrationName = 'Create' . ucfirst(preg_replace('/[^a-zA-Z0-9_]/', '', $migrationName));

        // Une los campos en un solo string para pasar a bake
        $fieldString = implode(' ', array_map('escapeshellarg', $fields));

        $cmd = "php " . ROOT . "/bin/cake.php bake migration {$migrationName} {$fieldString}";
        exec($cmd, $output, $return);

        if ($return !== 0) {
            throw new InternalErrorException("Error al generar la migración:<br><pre>" . implode("\n", $output) . "</pre>", 500);
        }

        $this->Flash->success("Migración '{$migrationName}' creada.");
        return $this->redirect(['action' => 'index']);
    }
}
