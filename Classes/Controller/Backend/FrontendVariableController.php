<?php
declare(strict_types=1);

/*
 * This file is part of PSB Frontend Variables.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\FrontendVariables\Controller\Backend;

use Exception;
use PSBits\Foundation\Attribute\ModuleAction;
use PSBits\Foundation\Controller\Backend\AbstractModuleController;
use PSBits\Foundation\Service\GlobalVariableProviders\RequestParameterProvider;
use PSBits\Foundation\Service\GlobalVariableService;
use PSBits\FrontendVariables\Service\FrontendVariableService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use function is_int;

/**
 * Class FrontendVariableController
 *
 * @package PSBits\FrontendVariables\Controller\Backend
 */
class FrontendVariableController extends AbstractModuleController
{
    public function __construct(
        protected readonly FrontendVariableService $frontendVariableService,
        ModuleTemplateFactory                      $moduleTemplateFactory,
    ) {
        parent::__construct($moduleTemplateFactory);
    }

    /**
     * @return ResponseInterface
     * @throws Exception
     */
    #[ModuleAction]
    public function listAction(): ResponseInterface
    {
        // Get selected page from page tree
        $pid = GlobalVariableService::get(RequestParameterProvider::class . '.id', false);

        if (is_int($pid)) {
            $this->moduleTemplate->assign('variables', $this->frontendVariableService->getVariablesForRootline($pid));
        }

        return $this->htmlResponse();
    }
}
