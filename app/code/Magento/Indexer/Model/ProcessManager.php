<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
namespace Magento\Indexer\Model;

/**
 * Provide functionality for executing user functions in multi-thread mode.
 */
class ProcessManager
{
    /**
     * Threads count environment variable name
     */
    const THREADS_COUNT = 'MAGE_INDEXER_THREADS_COUNT';

    /** @var bool */
    private $failInChildProcess = false;

    /** @var \Magento\Framework\App\ResourceConnection */
    private $resource;

    /** @var \Magento\Framework\Registry */
    private $registry;

    /** @var int|null */
    private $threadsCount;

    /**
     * @param \Magento\Framework\App\ResourceConnection $resource
     * @param \Magento\Framework\Registry $registry
     * @param int|null $threadsCount
     */
    public function __construct(
        \Magento\Framework\App\ResourceConnection $resource,
        \Magento\Framework\Registry $registry = null,
        int $threadsCount = null
    ) {
        $this->resource = $resource;
        if (null === $registry) {
            $registry = \Magento\Framework\App\ObjectManager::getInstance()->get(
                \Magento\Framework\Registry::class
            );
        }
        $this->registry = $registry;
        $this->threadsCount = (int)$threadsCount;
    }

    /**
     * Execute user functions
     *
     * @param \Traversable $userFunctions
     */
    public function execute($userFunctions)
    {
        if ($this->threadsCount > 1 && $this->isCanBeParalleled() && !$this->isSetupMode() && PHP_SAPI == 'cli') {
            $this->multiThreadsExecute($userFunctions);
        } else {
            $this->simpleThreadExecute($userFunctions);
        }
    }

    /**
     * Execute user functions in singleThreads mode
     *
     * @param \Traversable $userFunctions
     */
    private function simpleThreadExecute($userFunctions)
    {
        foreach ($userFunctions as $userFunction) {
            call_user_func($userFunction);
        }
    }

    /**
     * Execute user functions in multiThreads mode
     *
     * @param \Traversable $userFunctions
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    private function multiThreadsExecute($userFunctions)
    {
        $this->resource->closeConnection(null);
        $threadNumber = 0;
        foreach ($userFunctions as $userFunction) {
            $pid = pcntl_fork();
            if ($pid == -1) {
                throw new \RuntimeException('Unable to fork a new process');
            } elseif ($pid) {
                $this->executeParentProcess($threadNumber);
            } else {
                $this->startChildProcess($userFunction);
            }
        }
        while (pcntl_waitpid(0, $status) != -1) {
            //Waiting for the completion of child processes
        }

        if ($this->failInChildProcess) {
            throw new \RuntimeException('Fail in child process');
        }
    }

    /**
     * Is process can be paralleled
     *
     * @return bool
     */
<<<<<<< HEAD
    private function isCanBeParalleled()
=======
    private function isCanBeParalleled(): bool
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    {
        return function_exists('pcntl_fork');
    }

    /**
     * Is setup mode
     *
     * @return bool
     */
<<<<<<< HEAD
    private function isSetupMode()
=======
    private function isSetupMode(): bool
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    {
        return $this->registry->registry('setup-mode-enabled') ?: false;
    }

    /**
     * Start child process
     *
     * @param callable $userFunction
     * @SuppressWarnings(PHPMD.ExitExpression)
     */
<<<<<<< HEAD
    private function startChildProcess($userFunction)
=======
    private function startChildProcess(callable $userFunction)
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    {
        $status = call_user_func($userFunction);
        $status = is_integer($status) ? $status : 0;
        exit($status);
    }

    /**
     * Execute parent process
     *
     * @param int $threadNumber
     */
<<<<<<< HEAD
    private function executeParentProcess(&$threadNumber)
=======
    private function executeParentProcess(int &$threadNumber)
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    {
        $threadNumber++;
        if ($threadNumber >= $this->threadsCount) {
            pcntl_wait($status);
            if (pcntl_wexitstatus($status) !== 0) {
                $this->failInChildProcess = true;
            }
            $threadNumber--;
        }
    }
}
