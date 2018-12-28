<?php

/**
 *
 * Flextype Entries API Plugin
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Flextype\Component\Event\Event;
use Flextype\Component\Http\Http;
use Flextype\Component\Registry\Registry;
use Flextype\Component\Arr\Arr;

Event::addListener('onCurrentEntryBeforeDisplayed', function () {
    function _returnDataInJsonFormat($data)
    {
        Http::setResponseStatus(200);
        Http::setRequestHeaders('Content-Type: application/json; charset='.Registry::get('settings.charset'));
        echo Arr::toJson($data, JSON_UNESCAPED_UNICODE);
        Http::requestShutdown();
    }

    $_to_json   = Http::get('to-json');
    $_get_page  = Http::get('get-entry');
    $_get_pages = Http::get('get-entries');

    if (isset($_to_json)) {
        $raw = Http::get('raw');
        _returnDataInJsonFormat([Entries::getEntry(Http::getUriString(), (($raw == 'true') ? true : false))]);
    }

    if (isset($_get_entry)) {
        $raw = Http::get('raw');
        _returnDataInJsonFormat([Entry::getEntry($_get_page, (($raw == 'true') ? true : false))]);
    }

    if (isset($_get_entries)) {
        $raw        = Http::get('raw');
        $order_by   = Http::get('order-by');
        $order_type = Http::get('order-type');
        $offset     = Http::get('offset');
        $length     = Http::get('length');

        _returnDataInJsonFormat([Entries::getEntries(
            $_get_entries,
                          (($order_by != '') ? $order_by : 'date'),
                          (($order_type != 'desc') ? 'DESC' : 'ASC'),
                          (($offset != '') ? $offset : null),
                          (($length != '') ? $length : null),
                          (($raw == 'true') ? true : false)
        )]);
    }
});
