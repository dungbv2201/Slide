<?php
/**
 * Created by PhpStorm.
 * User: vandung
 * Date: 24/02/2019
 * Time: 14:59
 */

namespace Dungbv\Slide\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /**
         * Create table 'slider_group'
         */
        try {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('slider_group')
            )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
                'Group ID'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Group Name'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Slide Group Creation Time'
            )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Slide Group Modification Time'
            )->setComment(
                'Slide Group Table'
            );
            $installer->getConnection()->createTable($table);
        } catch (\Zend_Db_Exception $e) {
        }

        /**
         * Create table 'slider'
         */
        try {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('slider')
            )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
                'Slide ID'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Slide Name'
            )->addColumn(
                'url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'URL Link'
            )->addColumn(
                'image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Slide Image'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false, 'default' => '1'],
                'Slide Status: Enabled is 1 and Disabled is 0'
            )->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Store Id'
            )->addColumn(
                'order',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => true],
                'Sort Order'
            )->addColumn(
                'group_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Group Id'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Slide Creation Time'
            )->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Slide Modification Time'
            )->addForeignKey(
                $installer->getFkName('slider', 'store_id', 'store', 'store_id'),
                'store_id',
                $installer->getTable('store'),
                'store_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_NO_ACTION
            )->addForeignKey(
                $installer->getFkName('slider', 'group_id', 'slider_group', 'id'),
                'group_id',
                $installer->getTable('slider_group'),
                'id',
                \Magento\Framework\DB\Ddl\Table::ACTION_NO_ACTION
            )->addIndex(
                $setup->getIdxName(
                    $installer->getTable('slider'),
                    ['name'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['name'],
                ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
            )->setComment(
                'Slides Slider Table'
            );
            $installer->getConnection()->createTable($table);
        } catch (\Zend_Db_Exception $e) {
        }

        $installer->endSetup();
    }

}