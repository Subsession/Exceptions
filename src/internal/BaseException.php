<?php
/**
 * PHP Version 7
 *
 * LICENSE:
 * Copyright 2019 - present Comertis
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge,
 * publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
 * USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category Exceptions
 * @package  Comertis\Exceptions
 * @author   Cristian Moraru <cristian@comertis.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @version  GIT: &Id&
 * @link     https://github.com/Comertis/Exceptions
 */

namespace Comertis\Exceptions\Internal;

use Comertis\Exceptions\Internal\ExceptionInterface;
use Exception;

/**
 * Base exception
 *
 * @category Exceptions
 * @package  Comertis\Exceptions
 * @author   Cristian Moraru <cristian@comertis.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0.0
 * @link     https://github.com/Comertis/Exceptions
 */
abstract class BaseException extends Exception implements ExceptionInterface
{
    /**
     * Exception message
     *
     * @access protected
     * @var    string
     */
    protected $message = "Unknown exception";

    /**
     * User-defined exception code
     *
     * @access protected
     * @var    int
     */
    protected $code = 0;

    /**
     * Source filename of exception
     *
     * @access protected
     * @var    string
     */
    protected $file;

    /**
     * Source line of exception
     *
     * @access protected
     * @var    int
     */
    protected $line;

    /**
     * Constructor
     *
     * @param string    $message  Exception message
     * @param int       $code     Exception code
     * @param Exception $previous Previous exception
     */
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        if (!$message) {
            throw new $this("Unknown " . get_class($this));
        }

        parent::__construct($message, $code, $previous);
    }

    /**
     * Override __toString()
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        return get_class($this) . "
            '{$this->message}' in {$this->file}({$this->line})\n"
            . "{$this->getTraceAsString()}";
    }
}
