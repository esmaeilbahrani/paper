<?php
/**
 *      ****  *  *     *  ****  ****  *    *
 *      *  *  *  * *   *  *  *  *  *   *  *
 *      ****  *  *  *  *  *  *  *  *    *
 *      *     *  *   * *  *  *  *  *   *  *
 *      *     *  *    **  ****  ****  *    *
 * @author   Pinoox
 * @license  https://opensource.org/licenses/MIT MIT License
 */

namespace pinoox\app\com_pinoox_paper\controller\panel;

use pinoox\app\com_pinoox_manager\model\LangModel;
use pinoox\component\app\AppProvider;
use pinoox\component\Dir;
use pinoox\component\HelperString;
use pinoox\component\interfaces\ControllerInterface;
use pinoox\component\Lang;
use pinoox\component\Request;
use pinoox\component\Response;
use pinoox\component\Router;
use pinoox\component\Template;
use pinoox\component\User;

class MasterConfiguration implements ControllerInterface
{
    /**
     * @var Template
     */
    protected static $template;

    public function __construct()
    {
        //$this->checkLogin();
        $this->initTemplate();
        $this->getAssets();
    }

    private function checkLogin()
    {
        if (!User::isLoggedIn() && Router::simpleController() != 'account') {
            Response::redirect(url());
        }
    }

    private function initTemplate()
    {
        self::$template = new Template(null, AppProvider::get('theme-panel'));
        self::$template->addToAfterHeader('toolbar');
        self::$template->addToAfterHeader('sidebar');
        $app = url('panel/');
        self::$template->set('_site', url('~'));
        self::$template->set('_app', $app);
        self::$template->set('_direction', rlang('paper.direction'));
        $this->setLang();
    }

    public function _main()
    {
        self::$template->show('index');
    }

    public function _exception()
    {
        self::error404();
    }

    public function error404()
    {
        if (Request::isAjax()) exit(rlang('panel.invalid_request'));
        self::$template->show('error404');
        exit;
    }

    private function setLang()
    {
        $lang = Lang::get('panel');
        self::$template->set('_lang', HelperString::encodeJson($lang, true));
    }

    private function getAssets()
    {
        $vendor_css = 'vendor.css';
        $vendor_js = 'vendor.js';
        $main_css = 'main.css';
        $main_js = 'main.js';
        $path = Dir::theme('dist/manifest.json');
        if (is_file($path)) {
            $manifest = file_get_contents($path);
            $manifest = HelperString::decodeJson($manifest);

            $this->changeScalarToArray($manifest, 'main');
            foreach ($manifest['main'] as $item) {
                if (HelperString::has($item, 'main.js'))
                    $main_js = $item;
                else if (HelperString::has($item, 'main.css'))
                    $main_css = $item;
            }
            $this->changeScalarToArray($manifest, 'vendor');
            foreach ($manifest['vendor'] as $item) {
                if (HelperString::has($item, 'vendor.js'))
                    $vendor_js = $item;
                else if (HelperString::has($item, 'vendor.css'))
                    $vendor_css = $item;
            }
        }

        self::$template->assets = [
            'vendor_css' => $vendor_css,
            'vendor_js' => $vendor_js,
            'main_css' => $main_css,
            'main_js' => $main_js,
        ];
    }

    private function changeScalarToArray(&$array, $key)
    {
        if (!isset($array[$key])) return;

        $copy = $array[$key];
        if (!is_array($copy)) {
            unset($array[$key]);
            $array[$key][] = $copy;
        }
    }
}