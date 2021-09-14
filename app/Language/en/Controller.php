<?php

/**
 * Controller language strings.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT  MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
 *
 * @codeCoverageIgnore
 */

return [
    // Controller Runner
   'missingTable'      => 'Controller table must be set.',
   'disabled'          => 'Controller have been loaded but are disabled or setup incorrectly.',
   'notFound'          => 'Controller file not found: ',
   'batchNotFound'     => 'Target batch not found: ',
   'empty'             => 'No Controller files found',
   'gap'               => 'There is a gap in the Controller sequence near version number: ',
   'classNotFound'     => 'The Controller class "%s" could not be found.',
   'missingMethod'     => 'The Controller class is missing an "%s" method.',

    // Controller Command
   'migHelpLatest'     => "\t\tMigrates database to latest available Controller.",
   'migHelpCurrent'    => "\t\tMigrates database to version set as 'current' in configuration.",
   'migHelpVersion'    => "\tMigrates database to version {v}.",
   'migHelpRollback'   => "\tRuns all Controller 'down' to version 0.",
   'migHelpRefresh'    => "\t\tUninstalls and re-runs all Controller to freshen database.",
   'migHelpSeed'       => "\tRuns the seeder named [name].",
   'migCreate'         => "\tCreates a new controller named [name]",
   'nameController'     => 'Name the controller file',
   'badCreateName'     => 'You must provide a controller file name.',
   'writeError'        => 'Error trying to create {0} file, check if the directory is writable.',
   'migNumberError'    => 'Controller number must be three digits, and there must not be any gaps in the sequence.',
   'rollBackConfirm'   => 'Are you sure you want to rollback?',
   'refreshConfirm'    => 'Are you sure you want to refresh?',

   'latest'            => 'Running all new Controller...',
   'generalFault'      => 'Controller failed!',
   'migInvalidVersion' => 'Invalid version number provided.',
   'toVersionPH'       => 'Migrating to version %s...',
   'toVersion'         => 'Migrating to current version...',
   'rollingBack'       => 'Rolling back Controller to batch: ',
   'noneFound'         => 'No Controller were found.',
   'on'                => 'Migrated On: ',
   'migSeeder'         => 'Seeder name',
   'migMissingSeeder'  => 'You must provide a seeder name.',
   'removed'           => 'Rolling back: ',
   'added'             => 'Running: ',

   'version'           => 'Version',
   'filename'          => 'Filename',
];
