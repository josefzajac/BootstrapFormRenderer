<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Kdyby\BootstrapFormRenderer\DI;

/**
 * @author Filip Procházka <filip@prochazka.su>
 * @author Martin Procházka <juniwalk@outlook.cz>
 */
final class RendererExtension extends \Nette\DI\CompilerExtension
{
    /**
     * Register extension into DI container.
     */
    public function loadConfiguration()
    {
        // Register renderer into DI container
        $this->getContainerBuilder()->addDefinition($this->prefix('renderer'))
            ->setClass('Kdyby\BootstrapFormRenderer\BootstrapRenderer');

        // Register custom macros for the Latte engine
		$this->getContainerBuilder()->getDefinition('nette.latte')
            ->addSetup('Kdyby\BootstrapFormRenderer\Latte\FormMacros::install(?->getCompiler())', ['@self']);
    }
}
