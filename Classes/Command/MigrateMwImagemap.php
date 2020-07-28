<?php
declare(strict_types=1);

namespace MikelMade\Mmimagemap\Command;

/*
 *  (c) 2020 punkt.de GmbH - Karlsruhe, Germany - https://punkt.de
 *  All rights reserved.
 */

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class MigrateMwImagemap extends Command
{

    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @var ConnectionPool
     */
    protected $connectionPool;

    /**
     * @var ObjectManager
     */
    protected $objectManager;



    protected function configure()
    {
        $this
            ->setName('imagemap:migratemwimagemap')
            ->setDescription('Migrates mw_imagemap tables and content to mm_imagemap');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->initialize($input, $output);

        $this->output->writeln('Start migration of mw_imagemap to mm_imagemap');
        $this->output->writeln('#############################################');

        $this->migrateMaps();
        $this->migratePoints();
        $this->migrateAreas();
        $this->migrateBcolors();
        $this->migrateContentpopup();
        $this->migrateOverlayFiles();
        $this->migratePlugins();

        $this->output->writeln('Migration of mw_imagemap to mm_imagemap finished!');

        return 0;
    }



    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output) : void
    {
        $this->input = $input;
        $this->output = $output;

        $this->connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
    }



    protected function migrateMaps() : void
    {
        $this->output->writeln('Start migration of maps table.');

        $mmMapBuilder = $this->connectionPool->getQueryBuilderForTable('tx_mmimagemap_domain_model_map');
        $mwMapData = $this->getAllRowsFromTable('tx_mwimagemap_map');

        $migrationCount = 0;

        foreach ($mwMapData as $item) {
            $mmMapBuilder->insert('tx_mmimagemap_domain_model_map')
            ->values(
                [
                    'uid' => (int)$item['id'],
                    'name' => $item['name'],
                    'imgfile' => $item['file'],
                    'altfile' => $item['alt_file'],
                    'folder' => str_replace('fileadmin/','',$item['folder'])
                ])
            ->execute();

            $migrationCount++;
        }

        $this->output->writeln('Finished migration of maps table. ' . $migrationCount . ' items migrated.');
        $this->output->writeln('----------------------------------------------------------');
    }



    protected function migratePoints() : void
    {
        $this->output->writeln('Start migration of point table.');

        $mmPointBuilder = $this->connectionPool->getQueryBuilderForTable('tx_mmimagemap_domain_model_point');
        $mwPointData = $this->getAllRowsFromTable('tx_mwimagemap_point');

        $migrationCount = 0;

        foreach ($mwPointData as $item) {
            $mmPointBuilder->insert('tx_mmimagemap_domain_model_point')
                ->values(
                    [
                        'uid' => (int)$item['id'],
                        'areaid' => (int)$item['aid'],
                        'num' => (int)$item['num'],
                        'x' => (int)$item['x'],
                        'y' => (int)$item['y']
                    ])
                ->execute();

            $migrationCount++;
        }

        $this->output->writeln('Finished migration of point table. ' . $migrationCount . ' items migrated.');
        $this->output->writeln('----------------------------------------------------------');
    }



    protected function migrateAreas() : void
    {
        $this->output->writeln('Start migration of area table.');

        $mmAreaBuilder = $this->connectionPool->getQueryBuilderForTable('tx_mmimagemap_domain_model_area');
        $mwAreaData = $this->getAllRowsFromTable('tx_mwimagemap_area');

        $migrationCount = 0;

        foreach ($mwAreaData as $item) {
            $mmAreaBuilder->insert('tx_mmimagemap_domain_model_area')
                ->values(
                    [
                        'uid' => (int)$item['id'],
                        'mapid' => (int)$item['mid'],
                        'areatype' => (int)$item['type'],
                        'arealink' => $item['link'],
                        'description' => $item['description'],
                        'color' => str_replace('#', '', $item['color']),
                        'param' => $item['param'],
                        'febordercolor' => str_replace('#', '', $item['fe_bordercolor']),
                        'fevisible' => (int)$item['fe_visible'],
                        'feborderthickness' => (int)$item['fe_borderthickness'],
                        'fealtfile' => $item['fe_altfile']
                    ])
                ->execute();

            $migrationCount++;
        }

        $this->output->writeln('Finished migration of area table. ' . $migrationCount . ' items migrated.');
        $this->output->writeln('----------------------------------------------------------');
    }



    protected function migrateBcolors() : void
    {
        $this->output->writeln('Start migration of bcolors table.');

        $mmBcolorBuilder = $this->connectionPool->getQueryBuilderForTable('tx_mmimagemap_domain_model_bcolors');
        $mwBcolorData = $this->getAllRowsFromTable('tx_mwimagemap_bcolors');

        $migrationCount = 0;

        foreach ($mwBcolorData as $item) {
            $mmBcolorBuilder->insert('tx_mmimagemap_domain_model_bcolors')
                ->values(
                    [
                        'uid' => (int)$item['id'],
                        'mapid' => (int)$item['mid'],
                        'colorname' => $item['colorname'],
                        'color' => str_replace('#', '', $item['color'])
                    ])
                ->execute();

            $migrationCount++;
        }

        $this->output->writeln('Finished migration of bcolors table. ' . $migrationCount . ' items migrated.');
        $this->output->writeln('----------------------------------------------------------');
    }



    protected function migrateContentpopup() : void
    {
        $this->output->writeln('Start migration of contentpopup table.');

        $mmContentpopupBuilder = $this->connectionPool->getQueryBuilderForTable('tx_mmimagemap_domain_model_contentpopup');
        $mwContentpopupData = $this->getAllRowsFromTable('tx_mwimagemap_contentpopup');

        $migrationCount = 0;

        foreach ($mwContentpopupData as $item) {
            $mmContentpopupBuilder->insert('tx_mmimagemap_domain_model_contentpopup')
                ->values(
                    [
                        'uid' => (int)$item['id'],
                        'areaid' => (int)$item['aid'],
                        'contentid' => (int)$item['content_id'],
                        'popupwidth' => (int)$item['popup_width'],
                        'popupheight' => (int)$item['popup_height'],
                        'popupx' => (int)$item['popup_x'],
                        'popupy' => (int)$item['popup_y'],
                        'popupbordercolor' => str_replace('#', '', $item['popup_bordercolor']),
                        'popupbackgroundcolor' => str_replace('#', '', $item['popup_backgroundcolor']),
                        'popupborderwidth' => (int)$item['popup_borderwidth'],
                        'active' => (int)$item['active']
                    ])
                ->execute();

            $migrationCount++;
        }

        $this->output->writeln('Finished migration of contentpopup table. ' . $migrationCount . ' items migrated.');
        $this->output->writeln('----------------------------------------------------------');
    }



    protected function migrateOverlayFiles() : void
    {
        $this->output->writeln('Start migration of files in uploads/tx_mwimagemap.');

        $abspath = explode('typo3conf', __FILE__);
        $oldpath = $abspath[0].'uploads/tx_mwimagemap';
        $newpath = $abspath[0].'uploads/tx_mmimagemap';

        if (is_dir($oldpath)) {
            $dh = opendir($oldpath);
            $migrationCount = 0;

            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..') {
                    copy($oldpath.'/'.$file, $newpath.'/'.$file);
                    $migrationCount++;
                }
            }
            closedir($dh);
        }

        $this->output->writeln('Finished migration of files. ' . $migrationCount . ' files migrated.');
        $this->output->writeln('----------------------------------------------------------');
    }



    protected function migratePlugins() : void
    {
        $this->output->writeln('Start migration of mwimagemap plugins.');

        $queryBuilder = $this->connectionPool->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll();
        $contentElements= $queryBuilder
            ->select('uid','pi_flexform')
            ->from('tt_content')
            ->where('deleted = 0 AND list_type = "mwimagemap_pi1"')
            ->execute()
            ->fetchAll();

        $migrationCount = 0;

        foreach($contentElements as $plugin) {
            $queryBuilder->update( 'tt_content')
                ->set('list_type', 'mmimagemap_pi1')
                ->set('pi_flexform', str_replace('imagemap','settings.map', $plugin['pi_flexform']))
                ->where('uid = ' . $plugin['uid'])
                ->execute();
            $migrationCount++;
        }

        $this->output->writeln('Finished migration of mwimagemap plugins. ' . $migrationCount . ' plugins migrated.');
        $this->output->writeln('----------------------------------------------------------');
    }



    /**
     * @param $table
     * @return array
     * @throws \Exception
     */
    protected function getAllRowsFromTable($table): array
    {
        if (!$table) {
            throw new \Exception("Required parameterr 'table' not set or empty");
        }

        $queryBuilder = $this->connectionPool->getQueryBuilderForTable($table);

        return $queryBuilder
            ->select('*')
            ->from($table)
            ->execute()
            ->fetchAll();
    }

}
