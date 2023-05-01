<?php
/**
 * @brief HowtoBackendIcon, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugin
 *
 * @author Jean-Christian Denis
 *
 * @copyright Jean-Christian Denis
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\HowtoBackendIcon;

use dcNsProcess;
use dcPage;
use Dotclear\Helper\Html\Form\{
    Div,
    Para,
    Text
};

class Manage extends dcNsProcess
{
    public static function init(): bool
    {
        static::$init = defined('DC_CONTEXT_ADMIN');

        return static::$init;
    }

    public static function process(): bool
    {
        if (!static::$init) {
            return false;
        }

        return true;
    }

    public static function render(): void
    {
        if (!static::$init) {
            return;
        }

        // open our manage page
        dcPage::openModule(
            My::name()
        );

        // add page header
        echo
        dcPage::breadcrumb([
            __('Plugins') => '',
            My::name()    => '',
        ]) .
        // display dotclear notices
        dcPage::notices() .

        // display link to use dashboard favorites settings
        (new Div())
            ->items([
                (new Text('h3', My::name())),
                (new Para())
                    ->separator('</br />')
                    ->items([
                        (new Text(null, __('As we add a "settings => "pref" row to the _define.php.'))),
                        (new Text(null, __('You can see bellow a link to user dashboard favorites settings.'))),
                    ]),
            ])
            ->render();

        // close our module page
        dcPage::closeModule();
    }
}
