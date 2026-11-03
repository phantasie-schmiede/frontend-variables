<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Frontend Variables.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\FrontendVariables\Data;

use PSBits\Foundation\Data\AbstractExtensionInformation;
use PSBits\Foundation\Data\ModuleConfiguration;
use PSBits\FrontendVariables\Controller\Backend\FrontendVariableController;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class ExtensionInformation
 *
 * @package PSBits\FrontendVariables\Data
 */
class ExtensionInformation extends AbstractExtensionInformation
{
    public function __construct()
    {
        parent::__construct();
        $this->addModule(
            GeneralUtility::makeInstance(
                ModuleConfiguration::class,
                controllers        : [FrontendVariableController::class],
                key                : $this->buildModuleKeyPrefix() . 'frontendVariables',
                navigationComponent: '@typo3/backend/page-tree/page-tree-element',
                parentModule       : 'web',
            )
        );
    }
}
