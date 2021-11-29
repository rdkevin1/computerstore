<?php
require_once "../config/Database.php";
require '../../../vendor/autoload.php';

use Coderatio\SimpleBackup\SimpleBackup;

class BackupDatabaseController
{
    public function exportDb()
    {
        $db = new Database();
        // Set the database to backup
        $simpleBackup = SimpleBackup::setDatabase(['bdunad301127A_954', 'root', '', 'localhost'])
            ->downloadAfterExport('Backup');

    }
}

$backupDatabaseController = new BackupDatabaseController();
$backupDatabaseController->exportDb();
