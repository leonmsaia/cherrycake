<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Http\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class MigrationsController extends AppController
{
    public function index()
    {
        if ($this->request->is('post')) {
            $tableName = $this->request->getData('table');
            $fields = $this->request->getData('fields');

            // Generar nombre de migración (ej. CreateUsersTable)
            $migrationName = 'Create' . ucfirst($tableName);

            // Armar el string de campos (ej. name:string email:string created modified)
            $fieldString = implode(' ', array_map(function ($f) {
                return "{$f['name']}:{$f['type']}";
            }, $fields));

            // Ejecutar bake migration
            $cmd = "php " . ROOT . DS . "bin" . DS . "cake bake migration {$migrationName} {$fieldString}";

            // exec($cmd, $output, $return);

            // if ($return !== 0) {
            //     throw new InternalErrorException("Error al generar la migración.");
            // }
            exec($cmd . ' 2>&1', $output, $return);
            if ($return !== 0) {
                $this->Flash->error("Error al generar la migración:<br><pre>" . implode("\n", $output) . "</pre>");
            } else {
                $this->Flash->success("Migración '$migrationName' creada correctamente.");
            }

            $this->Flash->success("Migración '$migrationName' creada. Ahora podés ejecutarla.");

            return $this->redirect(['action' => 'index']);
        }
    }

    public function run()
    {
        $cmd = "bin/cake migrations migrate";
        exec($cmd, $output, $return);

        if ($return !== 0) {
            throw new InternalErrorException("Error al ejecutar la migración.");
        }

        $this->Flash->success("Migraciones ejecutadas correctamente.");
        return $this->redirect(['action' => 'index']);
    }
}
