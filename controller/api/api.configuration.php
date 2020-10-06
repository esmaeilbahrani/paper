<?php

/**
 *      ****  *  *     *  ****  ****  *    *
 *      *  *  *  * *   *  *  *  *  *   *  *
 *      ****  *  *  *  *  *  *  *  *    *
 *      *     *  *   * *  *  *  *  *   *  *
 *      *     *  *    **  ****  ****  *    *
 * @author   Pinoox
 * @link https://www.pinoox.com/
 * @license  https://opensource.org/licenses/MIT MIT License
 */

namespace pinoox\app\com_pinoox_paper\controller\api;

use pinoox\component\HelperHeader;
use pinoox\component\interfaces\ControllerInterface;
use pinoox\component\Response;

class ApiConfiguration implements ControllerInterface
{
    public function __construct()
    {
        HelperHeader::addHeader('Access-Control-Allow-Methods', '*');
        HelperHeader::addHeader('Access-Control-Allow-Origin', '*');
    }


    public function _main()
    {
        $this->error();
    }

    public function _exception()
    {
        $this->error();
    }

    public function error()
    {
        Response::json('not found', 404);
    }
}