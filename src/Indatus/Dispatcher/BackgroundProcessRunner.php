<?php

/**
 * This file is part of Dispatcher
 *
 * (c) Ben Kuhl <bkuhl@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Indatus\Dispatcher;

use App;
use Indatus\Dispatcher\Services\CommandService;

class BackgroundProcessRunner
{

    /**
     * @var \Indatus\Dispatcher\Services\CommandService
     */
    private $commandService;

    public function __construct(CommandService $commandService)
    {
        $this->commandService = $commandService;
    }

    /**
     * Run a scheduled command
     *
     * @param ScheduledCommand $scheduledCommand
     * @return bool
     */
    public function run(ScheduledCommand $scheduledCommand)
    {
        exec($this->commandService->getRunCommand($scheduledCommand));

        return true;
    }
} 