<?php
namespace IchHabRecht\MaskExport\Tests\Functional\Controller\MaskConfiguration;

/*
 * This file is part of the TYPO3 extension mask_export.
 *
 * (c) 2017 Nicole Cordes <typo3@cordes.co>, CPS-IT GmbH
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

require_once __DIR__ . '/../AbstractExportControllerTestCase.php';

use IchHabRecht\MaskExport\Tests\Functional\Controller\AbstractExportControllerTestCase;

class EmptyMaskConfigurationTest extends AbstractExportControllerTestCase
{
    protected function setUp()
    {
        if (!defined('ORIGINAL_ROOT')) {
            $this->markTestSkipped('Functional tests must be called through phpunit on CLI');
        }
    }

    /**
     * @test
     */
    public function basicExtensionFilesExistsWithoutMaskConfiguration()
    {
        $this->setUpWithExtensionConfiguration(
            [
                'mask' => [
                    'json' => 'typo3conf/mask.json',
                ],
            ]
        );

        $this->assertArrayHasKey('ext_emconf.php', $this->files);
        $this->assertArrayHasKey('ext_icon.png', $this->files);
        $this->assertArrayHasKey('Resources/Public/Icons/Extension.png', $this->files);
    }
}
