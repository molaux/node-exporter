<?php

/*
 * The MIT License
 *
 * Copyright (c) 2012 Allan Sun <sunajia@gmail.com>
 * Copyright (c) 2012-2020 Toha <tohenk@yahoo.com>
 * Copyright (c) 2013 WitteStier <development@wittestier.nl>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace MwbExporter\Formatter\Node\Sequelize6;

use MwbExporter\Formatter\Node\Formatter as BaseFormatter;
use MwbExporter\Model\Base;

class Formatter extends BaseFormatter
{
    const CFG_USE_SEMICOLONS                        = 'useSemicolons';
    const CFG_GENERATE_ASSOCIATION_METHOD           = 'generateAssociationMethod';
    const CFG_GENERATE_FOREIGN_KEYS_FIELDS          = 'generateForeignKeysFields';
    const CFG_USE_TIMESTAMPS                        = 'useTimestamps';
    /**
     * (non-PHPdoc)
     * @see \MwbExporter\Formatter\Formatter::init()
     */
    protected function init()
    {
        parent::init();
        $this->addConfigurations(array(
            static::CFG_INDENTATION                   => 4,
            static::CFG_USE_SEMICOLONS                => true,
            static::CFG_GENERATE_ASSOCIATION_METHOD   => false,
            static::CFG_GENERATE_FOREIGN_KEYS_FIELDS  => true,
            static::CFG_USE_TIMESTAMPS                => false
        ));
    }

    /**
     * (non-PHPdoc)
     * @see \MwbExporter\Formatter\Formatter::createDatatypeConverter()
     */
    protected function createDatatypeConverter()
    {
        return new DatatypeConverter();
    }

    /**
     * (non-PHPdoc)
     * @see \MwbExporter\Formatter\Formatter::createTable()
     */
    public function createTable(Base $parent, $node)
    {
        return new Model\Table($parent, $node);
    }

    /**
     * (non-PHPdoc)
     * @see \MwbExporter\Formatter\Formatter::getTitle()
     */
    public function getTitle()
    {
        return 'Node Sequelize Model (v6)';
    }
}