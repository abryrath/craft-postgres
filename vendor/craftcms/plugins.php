<?php

$vendorDir = dirname(__DIR__);
$rootDir = dirname(dirname(__DIR__));

return array (
  'unionco/craft-sync-db' => 
  array (
    'class' => 'unionco\\craftsyncdb\\SyncDbPlugin',
    'basePath' => $vendorDir . '/unionco/craft-sync-db/src',
    'handle' => 'sync-db',
    'aliases' => 
    array (
      '@unionco/craftsyncdb' => $vendorDir . '/unionco/craft-sync-db/src',
    ),
    'name' => 'SyncDb',
    'version' => 'v0.6.2',
    'description' => 'Craft 3 plugin to sync database across environments',
    'developer' => 'Abry Rath<abryrath@gmail.com>',
    'developerUrl' => 'https://github.com/unionco',
    'changelogUrl' => '???',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
      'sync' => 'unionco\\craftsyncdb\\services\\Sync',
    ),
  ),
  'unionco/components' => 
  array (
    'class' => 'unionco\\components\\Components',
    'basePath' => $vendorDir . '/unionco/components/src',
    'handle' => 'components',
    'aliases' => 
    array (
      '@unionco/components' => $vendorDir . '/unionco/components/src',
    ),
    'name' => 'Components',
    'version' => '0.0.1',
    'description' => 'A component library for Craft cms.',
    'developer' => 'Union',
    'developerUrl' => 'https://github.com/unionco',
    'documentationUrl' => 'https://github.com/unionco/components/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/unionco/components/master/CHANGELOG.md',
  ),
);
